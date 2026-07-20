<?php

namespace Tests\Feature;

use App\Mail\ContactMessageReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    /** Valid payload used as the base for every test. */
    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Jane Engineer',
            'email' => 'jane@example.com',
            'phone' => '+375 17 000 0000',
            'subject' => 'Project enquiry',
            'message' => 'We would like to develop a custom sensor board for environmental monitoring.',
        ], $overrides);
    }

    public function test_all_pages_render_successfully(): void
    {
        foreach (['/', '/products', '/services', '/projects', '/about', '/contacts'] as $uri) {
            $this->get($uri)->assertOk()->assertSee('Dimgent Technologies');
        }
    }

    public function test_contacts_page_shows_the_form(): void
    {
        $this->get('/contacts')
            ->assertOk()
            ->assertSee('Send us a message')
            // Raw substring (escape=false) so the literal attribute survives.
            ->assertSee('name="message"', false)
            ->assertSee('name="email"', false)
            ->assertSee('name="company_website"', false);
    }

    public function test_valid_submission_sends_an_email_and_redirects_with_success(): void
    {
        Mail::fake();

        $response = $this->from('/contacts')->post('/contacts', $this->validPayload());

        $response->assertRedirect('/contacts')
            ->assertSessionHas('contact_success');

        Mail::assertSent(ContactMessageReceived::class, function ($mail) {
            return $mail->name === 'Jane Engineer'
                && $mail->email === 'jane@example.com'
                && $mail->inquirySubject === 'Project enquiry'
                && $mail->envelope()->subject === '[Contact] Project enquiry';
        });
    }

    public function test_contact_route_is_protected_by_csrf_middleware(): void
    {
        // The POST route runs inside the `web` middleware group, which
        // includes VerifyCsrfToken. (The test harness auto-injects a token,
        // so rather than forcing a 419 we assert the middleware is wired up.)
        $route = collect(Route::getRoutes()->get('POST'))
            ->first(fn ($r) => $r->getName() === 'contacts.store');

        $this->assertNotNull($route);
        $this->assertTrue(
            in_array('Illuminate\Foundation\Http\Middleware\VerifyCsrfToken', $route->gatherMiddleware())
            || in_array('Illuminate\Session\Middleware\VerifyCsrfToken', $route->gatherMiddleware())
            || collect($route->gatherMiddleware())->contains(fn ($m) => str_contains($m, 'VerifyCsrfToken')),
            'contacts.store runs under CSRF verification.'
        );
    }

    public function test_honeypot_filled_is_silently_dropped(): void
    {
        Mail::fake();

        $this->from('/contacts')
            ->post('/contacts', $this->validPayload(['company_website' => 'https://spam.example']))
            ->assertRedirect('/contacts')
            ->assertSessionHas('contact_success');

        Mail::assertNothingSent();
    }

    public function test_validation_requires_name_email_and_message(): void
    {
        $this->from('/contacts')
            ->post('/contacts', [
                'name' => '',
                'email' => 'not-an-email',
                'message' => 'short',
            ])
            ->assertSessionHasErrors(['name', 'email', 'message']);
    }

    public function test_contact_route_is_protected_by_the_contact_rate_limiter(): void
    {
        // The route carries the `throttle:contact` middleware, backed by the
        // named limiter registered in AppServiceProvider (5 / min / IP).
        $route = collect(Route::getRoutes()->get('POST'))
            ->first(fn ($r) => $r->getName() === 'contacts.store');

        $this->assertNotNull($route, 'contacts.store route exists');
        $this->assertContains('throttle:contact', $route->gatherMiddleware(),
            'contacts.store is rate limited via the "contact" limiter.');
    }

    public function test_turnstile_is_bypassed_when_no_secret_is_configured(): void
    {
        // With TURNSTILE_SECRET empty (the default in testing), verification
        // is bypassed and a valid submission succeeds without a token.
        Mail::fake();

        $this->post('/contacts', $this->validPayload())
            ->assertSessionHas('contact_success');
    }
}
