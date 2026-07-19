@extends('layouts.app')

@section('content')

@php
    $categories = [
        [
            'shield',
            'Systems',
            'Control rooms using public telephone networks, GSM and radio channels up to 900 MHz — for elevators, communal services (hydraulic lifting, engineering communications) and water intake systems. Automated microelectronic circuit testers and electronic boards testing.',
        ],
        [
            'beaker',
            'Tools',
            'Testers for microelectronic circuits and electronic boards testing. Tools for archaeological and geological use — gradiometers and electronic probes. Remote-reading gauges to collect information from sensors.',
        ],
        [
            'cog',
            'Everyday technology',
            'Wireless headphones for the hard of hearing and older persons. Dimmers and remote controls for lighting. Radio extenders for electronic sensors, garage gates, blinds and more.',
        ],
        [
            'heart-pulse',
            'Medical devices',
            'Pressure and pulse meters — precision measurement instruments for everyday health monitoring.',
        ],
    ];
@endphp

{{-- Hero --}}
<section class="relative overflow-hidden bg-slate-900 text-white">
    <div class="absolute inset-0 bg-grid opacity-50" aria-hidden="true"></div>
    <div class="container-page relative py-16 sm:py-20">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.15em] text-brand-200">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>
                Projects
            </span>
            <h1 class="mt-5 text-4xl font-bold tracking-tight sm:text-5xl">
                Two decades of built devices
            </h1>
            <p class="mt-5 text-lg text-slate-300">
                A selection of the kinds of systems and devices we've developed — across control
                systems, measurement tools, everyday technology and medical devices.
            </p>
        </div>
    </div>
</section>

{{-- Categories grid --}}
<section class="section">
    <div class="container-page">
        <x-section-heading
            eyebrow="What we build"
            title="Project categories"
            align="center"
        />
        <div class="mt-12 grid gap-6 md:grid-cols-2">
            @foreach ($categories as $cat)
                <div class="card card-hover p-7">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600">
                            <x-icon :name="$cat[0]" class="h-6 w-6" />
                        </div>
                        <h3 class="text-xl font-semibold text-slate-900">{{ $cat[1] }}</h3>
                    </div>
                    <p class="mt-4 text-sm leading-relaxed text-slate-600">{{ $cat[2] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Stats band --}}
<x-stat-band :stats="[
    ['value' => '20+', 'label' => 'Years of experience'],
    ['value' => '50+', 'label' => 'Projects completed'],
    ['value' => '100%', 'label' => 'Design success rate'],
    ['value' => '4', 'label' => 'Core domains'],
]" />

{{-- What we provide --}}
<section class="section">
    <div class="container-page">
        <div class="grid gap-10 lg:grid-cols-2">
            <div>
                <span class="eyebrow">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                    We can provide
                </span>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-900">
                    Flexible engagement models
                </h2>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'The full cycle of electronic device development (from concept to finished product).',
                        'Provision of individual phases of development.',
                        'Completion of uncompleted projects which have already been started.',
                    ] as $point)
                        <li class="flex items-start gap-3 text-slate-700">
                            <x-icon name="check" class="mt-0.5 h-5 w-5 shrink-0 text-brand-600" />
                            <span>{{ $point }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-7">
                <span class="eyebrow">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                    Dimgent Technologies is
                </span>
                <ul class="mt-6 space-y-3">
                    @foreach ([
                        'More than 20 years of experience.',
                        'More than 50 successfully completed projects.',
                        'Experienced specialists.',
                        'Guaranteed quality.',
                        'Short turn-around times.',
                        'Cost effective.',
                    ] as $point)
                        <li class="flex items-start gap-3 text-slate-700">
                            <x-icon name="bolt" class="mt-0.5 h-5 w-5 shrink-0 text-accent-600" />
                            <span>{{ $point }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="section pt-0">
    <div class="container-page">
        <div class="card flex flex-col items-center justify-between gap-6 bg-brand-50 p-8 sm:flex-row sm:p-10">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Have a project in mind?</h2>
                <p class="mt-2 text-slate-600">Big or small — tell us what you're building and we'll tell you how we can help.</p>
            </div>
            <a href="{{ route('contacts') }}" class="btn-primary shrink-0">
                Tell us about it
                <x-icon name="arrow-right" class="h-4 w-4" />
            </a>
        </div>
    </div>
</section>

@endsection
