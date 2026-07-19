@extends('layouts.app')

@section('content')

@php
    $phases = [
        'Preparation and approval of technical specifications for the electronic device you need.',
        'Selection of electronic components, mechanical parts and bundles for the device.',
        'Development of technical documentation.',
        'Development of electric circuits for the device.',
        'Software development.',
        'Development of printed circuit board drawings.',
        'Structural plans and design of product casing.',
        'Making mock-ups of individual assemblies needed to complete the intended task.',
        'Developing the final versions of technical and user documentation, software, and designing the man–machine interface.',
        'Production of test models (assembly, fitting, programming and debugging) and subsequent testing.',
        'Preparation for certification.',
        'Technical support.',
    ];
    $advantages = [
        ['currency', 'Cost', 'Cost-effective, high-quality services — that is the reason to choose us.'],
        ['clock', 'Speed', 'We take projects only up to our handling capacity, so we can concentrate on each one.'],
        ['cube', 'Efficiency', 'A library of standard design elements used across products keeps costs down.'],
        ['heart-pulse', 'Support', 'All of our projects get ongoing support from the team of developers.'],
        ['shield', 'Reliability', 'Products are assembled and tested in our laboratory before delivery.'],
        ['gauge', 'Experience', 'Our specialists have been creating electronic devices for more than twenty years.'],
        ['bolt', 'Guaranteed success', 'Thanks to extensive experience, a 100% success rate in product design.'],
    ];
@endphp

{{-- Hero --}}
<section class="relative overflow-hidden bg-slate-900 text-white">
    <div class="absolute inset-0 bg-grid opacity-50" aria-hidden="true"></div>
    <div class="absolute -right-32 top-0 h-80 w-80 rounded-full bg-brand-600/30 blur-3xl" aria-hidden="true"></div>
    <div class="container-page relative py-16 sm:py-20">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.15em] text-brand-200">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>
                Services
            </span>
            <h1 class="mt-5 text-4xl font-bold tracking-tight sm:text-5xl">
                Customized development of electronic devices
            </h1>
            <p class="mt-5 text-lg text-slate-300">
                We offer a full cycle of electronic device development — from mock-up to finished
                product — or, if required, can complete just the individual phases you need.
            </p>
        </div>
    </div>
</section>

{{-- Development phases --}}
<section class="section">
    <div class="container-page">
        <x-section-heading
            eyebrow="Full cycle"
            title="Development phases"
            subtitle="Some phases may be skipped or added as required — we shape the engagement around your project."
        />

        <div class="mt-12 grid gap-4 sm:grid-cols-2">
            @foreach ($phases as $i => $phase)
                <div class="flex items-start gap-4 rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-brand-600 text-sm font-bold text-white">
                        {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                    </span>
                    <p class="pt-1 text-slate-700">{{ $phase }}</p>
                </div>
            @endforeach
        </div>

        <p class="mt-6 rounded-lg bg-slate-100 px-4 py-3 text-sm text-slate-600">
            <x-icon name="check" class="mr-1 inline h-4 w-4 text-brand-600" />
            <strong class="text-slate-800">Also offered:</strong> industrial controllers and microcontrollers programming.
        </p>
    </div>
</section>

{{-- Advantages --}}
<section class="section bg-white">
    <div class="container-page">
        <x-section-heading
            eyebrow="Advantages"
            title="What you get working with us"
            align="center"
        />
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($advantages as $adv)
                <div class="card card-hover p-6">
                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
                        <x-icon :name="$adv[0]" class="h-5 w-5" />
                    </div>
                    <h3 class="mt-4 text-base font-semibold text-slate-900">{{ $adv[1] }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $adv[2] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Our aim --}}
<section class="section">
    <div class="container-page">
        <div class="mx-auto max-w-3xl rounded-2xl border border-brand-100 bg-brand-50 p-8 sm:p-10">
            <span class="eyebrow">
                <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                Our aim
            </span>
            <h2 class="mt-3 text-2xl font-bold text-slate-900 sm:text-3xl">Your full satisfaction</h2>
            <ul class="mt-6 space-y-3">
                @foreach ([
                    'We want our clients to be fully satisfied with the results of our work.',
                    'We work with our clients until the product is exactly the one they want it to be.',
                    'We also offer ideas for changes and improvements to make the product even better.',
                ] as $aim)
                    <li class="flex items-start gap-3 text-slate-700">
                        <x-icon name="check" class="mt-0.5 h-5 w-5 shrink-0 text-brand-600" />
                        <span>{{ $aim }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

{{-- Distance reassurance --}}
<section class="section bg-slate-900 text-white">
    <div class="container-page">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
            <div>
                <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.15em] text-brand-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>
                    Remote collaboration
                </span>
                <h2 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">
                    Is distance a problem? No, of course not.
                </h2>
                <p class="mt-5 text-slate-300">
                    The majority of our international clients outsource device development to keep
                    costs down. Some were concerned the work was happening far away — but once they
                    received the finished product and evaluated its quality, they often ordered more.
                </p>
                <p class="mt-4 text-slate-300">
                    Distance is not a problem — the Internet brings us nearer than ever before, and
                    we keep you updated on progress with photos and video if you wish.
                </p>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                @foreach ([
                    ['20+', 'Years of experience'],
                    ['50+', 'Projects completed'],
                    ['100%', 'Design success rate'],
                    ['∞', 'Distance — not a problem'],
                ] as $stat)
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                        <div class="text-3xl font-bold text-white">{{ $stat[0] }}</div>
                        <div class="mt-1 text-sm text-slate-400">{{ $stat[1] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="section">
    <div class="container-page">
        <div class="card flex flex-col items-center justify-between gap-6 p-8 sm:flex-row sm:p-10">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Let's scope your project.</h2>
                <p class="mt-2 text-slate-600">Full cycle, individual phases, or finishing a project someone else started.</p>
            </div>
            <a href="{{ route('contacts') }}" class="btn-primary shrink-0">
                Start a conversation
                <x-icon name="arrow-right" class="h-4 w-4" />
            </a>
        </div>
    </div>
</section>

@endsection
