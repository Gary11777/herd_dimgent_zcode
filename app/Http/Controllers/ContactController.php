<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageReceived;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle a contact form submission.
     *
     * Layered security:
     *   1. CSRF   — verified by VerifyCsrfToken middleware (web group).
     *   2. Honeypot — hidden "company_website" field must stay empty.
     *   3. Rate limit — `contact` limiter (5 / min / IP) on the route.
     *   4. Turnstile — server-side token verification (when configured).
     *   5. Server validation — strict rules + sanitization.
     */
    public function store(Request $request): RedirectResponse
    {
        // 2. Honeypot trip — checked FIRST and silently. A bot fills the hidden
        //    field; we pretend the submission succeeded without doing anything.
        if (filled($request->input('company_website'))) {
            return back()
                ->with('contact_success', true)
                ->onlyInput('name', 'subject');
        }

        // 4 + 5 combined: validate everything in one pass.
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:150'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],

            // Turnstile — validated server-side via TurnstileService.
            'cf-turnstile-response' => ['string', 'turnstile'],
        ]);

        // Sanitize free-text fields: strip control characters.
        $clean = array_map(
            static fn ($v) => is_string($v) ? preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $v) : $v,
            $request->only(['name', 'email', 'phone', 'subject', 'message']),
        );

        try {
            Mail::to(config('mail.contact_recipient'))
                ->send(new ContactMessageReceived(
                    name: $clean['name'],
                    email: $clean['email'],
                    phone: $clean['phone'] ?? '',
                    subject: $clean['subject'] ?? '',
                    body: $clean['message'],
                ));
        } catch (\Throwable $e) {
            report($e);

            return back()
                ->with('contact_error', true)
                ->onlyInput('name', 'email', 'phone', 'subject', 'message');
        }

        return back()
            ->with('contact_success', true)
            ->onlyInput('name', 'subject');
    }
}
