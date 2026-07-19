<?php

namespace App\Providers;

use App\Services\TurnstileService;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TurnstileService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Expose the Turnstile sitekey to every view (empty when disabled).
        View::share('turnstileSitekey', config('services.turnstile.sitekey'));

        // Per-IP rate limit for the contact form (max 5 submissions / minute).
        RateLimiter::for('contact', fn (Request $request) => [
            Limit::perMinute(5)->by($request->ip()),
        ]);

        // Custom validation rule: verifies the Turnstile token server-side.
        Validator::extend('turnstile', function (string $attribute, mixed $value): bool {
            return app(TurnstileService::class)->verify($value, request()->ip());
        }, 'Please complete the bot-protection challenge.');
    }
}
