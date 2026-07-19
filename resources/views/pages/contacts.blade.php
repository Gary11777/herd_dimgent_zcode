@extends('layouts.app')

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden bg-slate-900 text-white">
    <div class="absolute inset-0 bg-grid opacity-50" aria-hidden="true"></div>
    <div class="container-page relative py-16 sm:py-20">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.15em] text-brand-200">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>
                Contacts
            </span>
            <h1 class="mt-5 text-4xl font-bold tracking-tight sm:text-5xl">Let's talk about your project</h1>
            <p class="mt-5 text-lg text-slate-300">
                For more information, email us or use the form below. Tell us what you're building
                and we'll get back to you with how we can help.
            </p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container-page">
        <div class="grid gap-10 lg:grid-cols-5">

            {{-- Contact info --}}
            <div class="lg:col-span-2">
                <h2 class="text-2xl font-bold text-slate-900">Contact details</h2>
                <p class="mt-3 text-slate-600">
                    We're based in Minsk, Belarus, and work with clients worldwide.
                </p>

                <div class="mt-8 space-y-4">
                    <a href="mailto:{{ config('mail.contact_recipient') }}" class="card card-hover flex items-center gap-4 p-5">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
                            <x-icon name="mail" class="h-5 w-5" />
                        </div>
                        <div>
                            <div class="text-sm font-medium text-slate-500">Email</div>
                            <div class="font-semibold text-slate-900">{{ config('mail.contact_recipient') }}</div>
                        </div>
                    </a>

                    <div class="card flex items-center gap-4 p-5">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
                            <x-icon name="pin" class="h-5 w-5" />
                        </div>
                        <div>
                            <div class="text-sm font-medium text-slate-500">Location</div>
                            <div class="font-semibold text-slate-900">Minsk, Belarus</div>
                            <div class="text-sm text-slate-500">Development center</div>
                        </div>
                    </div>

                    <div class="card flex items-center gap-4 p-5">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
                            <x-icon name="clock" class="h-5 w-5" />
                        </div>
                        <div>
                            <div class="text-sm font-medium text-slate-500">Response time</div>
                            <div class="font-semibold text-slate-900">Within 1–2 business days</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form --}}
            <div class="lg:col-span-3">
                <div class="card p-6 sm:p-8" x-data="{ sending: false }">
                    <h2 class="text-2xl font-bold text-slate-900">Send us a message</h2>
                    <p class="mt-2 text-sm text-slate-600">
                        Fields marked with <span class="text-red-500">*</span> are required.
                    </p>

                    {{-- Success --}}
                    @if (session('contact_success'))
                        <div class="mt-6 flex items-start gap-3 rounded-lg border border-green-200 bg-green-50 p-4">
                            <x-icon name="check" class="mt-0.5 h-5 w-5 shrink-0 text-green-600" />
                            <div>
                                <p class="font-semibold text-green-900">Thank you — your message has been sent.</p>
                                <p class="mt-0.5 text-sm text-green-700">We'll get back to you shortly.</p>
                            </div>
                        </div>
                    @endif

                    {{-- Error (mail transport failure) --}}
                    @if (session('contact_error'))
                        <div class="mt-6 flex items-start gap-3 rounded-lg border border-red-200 bg-red-50 p-4">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                            <div>
                                <p class="font-semibold text-red-900">Sorry, something went wrong.</p>
                                <p class="mt-0.5 text-sm text-red-700">Your message could not be delivered. Please try again or email us directly.</p>
                            </div>
                        </div>
                    @endif

                    <form
                        method="POST"
                        action="{{ route('contacts.store') }}"
                        class="mt-6 space-y-5"
                        @submit="sending = true"
                    >
                        @csrf

                        {{-- Honeypot — hidden from humans, attractive to bots --}}
                        <div class="hidden" aria-hidden="true">
                            <label for="company_website">Website (leave empty)</label>
                            <input
                                type="text"
                                id="company_website"
                                name="company_website"
                                tabindex="-1"
                                autocomplete="off"
                                value="{{ old('company_website') }}"
                            >
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="name" class="label">Name <span class="text-red-500">*</span></label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="input"
                                    value="{{ old('name') }}"
                                    required
                                    maxlength="100"
                                    autocomplete="name"
                                >
                                @error('name') <p class="field-error">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="email" class="label">Email <span class="text-red-500">*</span></label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="input"
                                    value="{{ old('email') }}"
                                    required
                                    maxlength="150"
                                    autocomplete="email"
                                >
                                @error('email') <p class="field-error">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="phone" class="label">Phone <span class="text-slate-400">(optional)</span></label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    class="input"
                                    value="{{ old('phone') }}"
                                    maxlength="50"
                                    autocomplete="tel"
                                >
                                @error('phone') <p class="field-error">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="subject" class="label">Subject <span class="text-slate-400">(optional)</span></label>
                                <input
                                    type="text"
                                    id="subject"
                                    name="subject"
                                    class="input"
                                    value="{{ old('subject') }}"
                                    maxlength="150"
                                >
                                @error('subject') <p class="field-error">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="message" class="label">Message <span class="text-red-500">*</span></label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                class="input resize-y"
                                required
                                minlength="10"
                                maxlength="5000"
                            >{{ old('message') }}</textarea>
                            @error('message') <p class="field-error">{{ $message }}</p> @enderror
                        </div>

                        {{-- Turnstile (rendered only when configured) --}}
                        <div>
                            @include('partials.turnstile')
                            @error('cf-turnstile-response') <p class="field-error">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center justify-between gap-4 pt-1">
                            <p class="text-xs text-slate-500">
                                Protected against spam. We never share your details.
                            </p>
                            <button type="submit" class="btn-primary" :disabled="sending">
                                <span x-show="!sending">Send message</span>
                                <span x-show="sending" x-cloak class="flex items-center gap-2">
                                    <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                    </svg>
                                    Sending…
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
