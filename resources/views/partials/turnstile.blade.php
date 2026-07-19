{{--
    Cloudflare Turnstile widget (invisible bot detection, privacy-friendly).
    Renders only when a site key is configured. When empty, nothing is emitted
    and verification is bypassed server-side — so local dev works without keys.
--}}
@if (! empty($turnstileSitekey))
    <div
        class="cf-turnstile"
        data-sitekey="{{ $turnstileSitekey }}"
        data-theme="light"
        data-size="flexible"
    ></div>

    @push('scripts')
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    @endpush
@endif
