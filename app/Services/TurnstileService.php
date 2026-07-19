<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Lightweight Cloudflare Turnstile integration.
 *
 * Verification is performed server-side against Cloudflare's siteverify
 * endpoint. When no secret key is configured, verification is bypassed so the
 * contact form keeps working in local development without keys.
 */
class TurnstileService
{
    /**
     * Whether the Turnstile challenge is enabled (both keys configured).
     */
    public function enabled(): bool
    {
        return (bool) config('services.turnstile.sitekey')
            && (bool) config('services.turnstile.secret');
    }

    /**
     * Validate a Turnstile token returned by the client widget.
     *
     * @param  string|null  $token  Token submitted with the form.
     * @param  string|null  $ip  Client IP (forwarded as a hint to Cloudflare).
     */
    public function verify(?string $token, ?string $ip = null): bool
    {
        // Graceful fallback: no secret configured → skip verification.
        if (! $this->enabled()) {
            return true;
        }

        // A token must always be present when Turnstile is enabled.
        if (filled($token)) {
            try {
                $response = Http::asForm()
                    ->timeout(10)
                    ->post(config('services.turnstile.verify_url'), [
                        'secret' => config('services.turnstile.secret'),
                        'response' => $token,
                        'remoteip' => $ip,
                    ]);

                return $response->ok() && ($response->json('success') === true);
            } catch (\Throwable $e) {
                Log::warning('Turnstile verification failed: '.$e->getMessage());

                // Fail closed on transport errors only when explicitly enabled.
                return false;
            }
        }

        return false;
    }
}
