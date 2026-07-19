@extends('layouts.app')

@section('content')

@php
    $gallery = [
        'photo_garand101_5.jpg',
        'photo_garand101_6.jpg',
        'photo_garand101_7.jpg',
        'photo_garand101_8.jpg',
        'photo_garand101_10.jpg',
        'photo_garand101_11.jpg',
        'photo_garand101_12_2.jpg',
        'field-use.jpg',
    ];
    $advantages = [
        'Innovative magnetic field measurement technology',
        'Fully digital device — improved noise stability during operation',
        'User-friendly visualization system and interface for easy object detection',
        'Reliable and robust design',
        'Expanded detection area due to optimized design solutions',
        'Plug-and-play operation',
        'Affordable price',
    ];
    $targetAreas = [
        ['beaker', 'Archaeological research'],
        ['globe', 'Environmental monitoring'],
        ['shield', 'Forensic investigations'],
        ['bolt', 'Geological studies'],
        ['cog', 'Civil engineering'],
        ['magnet', 'Peace-time military applications'],
    ];
@endphp

{{-- Hero --}}
<section class="relative overflow-hidden bg-slate-900 text-white">
    <div class="absolute inset-0 bg-grid opacity-50" aria-hidden="true"></div>
    <div class="container-page relative grid items-center gap-12 py-16 lg:grid-cols-2 lg:py-20">
        <div>
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.15em] text-brand-200">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>
                Product
            </span>
            <h1 class="mt-5 text-4xl font-bold tracking-tight sm:text-5xl">Garand 101</h1>
            <p class="mt-3 text-lg font-medium text-brand-200">
                A high-resolution fluxgate magnetometer-gradiometer.
            </p>
            <p class="mt-2 text-base italic text-slate-400">
                “Magnetic detection can be easy and convenient!”
            </p>
            <p class="mt-6 max-w-xl text-slate-300">
                Garand 101 is designed to measure disruptions in the Earth's magnetic field
                caused by ferromagnetic objects. It provides reliable detection of metals such
                as iron, steel, and nickel — in a lightweight, user-friendly, reliable and low-cost
                device built for one-person operation.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ asset('downloads/garand-101-product-presentation.pdf') }}" class="btn-primary" download>
                    <x-icon name="document" class="h-4 w-4" />
                    Download presentation (PDF)
                </a>
                <a href="http://www.gradiometr.com" target="_blank" rel="noopener" class="btn-secondary border-white/20 bg-white/5 text-white hover:bg-white/10">
                    Visit gradiometr.com
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>
        </div>
        <div class="relative">
            <div class="absolute -inset-4 -z-10 rounded-3xl bg-gradient-to-tr from-brand-500/30 to-accent-500/20 blur-3xl" aria-hidden="true"></div>
            <img
                src="{{ asset('images/products/garand-101/main.jpg') }}"
                alt="Garand 101 magnetometer-gradiometer"
                class="aspect-[4/3] w-full rounded-2xl border border-white/10 object-cover shadow-2xl"
            >
        </div>
    </div>
</section>

{{-- Target areas --}}
<section class="section">
    <div class="container-page">
        <x-section-heading
            eyebrow="Where it's used"
            title="Target areas"
            subtitle="A versatile instrument for professionals across many disciplines."
            align="center"
        />
        <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3">
            @foreach ($targetAreas as $area)
                <div class="card card-hover flex flex-col items-center gap-3 p-6 text-center">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-600">
                        <x-icon :name="$area[0]" class="h-6 w-6" />
                    </div>
                    <span class="text-sm font-medium text-slate-700">{{ $area[1] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Key technology --}}
<section class="section bg-white">
    <div class="container-page">
        <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
            <div>
                <span class="eyebrow">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                    Key technology
                </span>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    A new approach to magnetic field measurement
                </h2>
                <p class="mt-4 text-slate-600">
                    Garand 101 implements a new magnetic field measurement technology that re-thinks
                    how the device is built and powered — with clear benefits for the operator.
                </p>
                <ul class="mt-8 space-y-4">
                    @foreach ([
                        ['bolt', 'Lower energy consumption', 'Longer operating time in the field on a single charge.'],
                        ['rocket', 'Reduced device weight', 'Lighter to carry, easier to handle for one-person operation.'],
                        ['cog', 'Simpler construction & maintenance', 'Fewer moving parts, easier servicing and lower upkeep cost.'],
                    ] as $item)
                        <li class="flex gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
                                <x-icon :name="$item[0]" class="h-5 w-5" />
                            </div>
                            <div>
                                <h3 class="text-base font-semibold text-slate-900">{{ $item[1] }}</h3>
                                <p class="mt-1 text-sm text-slate-600">{{ $item[2] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="relative">
                <img
                    src="{{ asset('images/products/garand-101/field-use.jpg') }}"
                    alt="Garand 101 in field use"
                    class="aspect-[4/3] w-full rounded-2xl border border-slate-200 object-cover shadow-lg"
                    loading="lazy"
                >
            </div>
        </div>
    </div>
</section>

{{-- Advantages --}}
<section class="section">
    <div class="container-page">
        <x-section-heading
            eyebrow="Advantages"
            title="Why Garand 101 stands apart"
            subtitle="Engineered advantages over conventional magnetometers."
            align="center"
        />
        <div class="mx-auto mt-12 max-w-3xl">
            <ol class="space-y-3">
                @foreach ($advantages as $i => $advantage)
                    <li class="flex items-start gap-4 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-600 text-sm font-bold text-white">
                            {{ $i + 1 }}
                        </span>
                        <span class="pt-1 text-slate-700">{{ $advantage }}</span>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>

{{-- Gallery with Alpine lightbox --}}
<section class="section bg-white" x-data="{ active: null }">
    <div class="container-page">
        <x-section-heading
            eyebrow="Gallery"
            title="Garand 101 in detail"
            align="center"
        />
        <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
            @foreach ($gallery as $image)
                <button
                    type="button"
                    @click="active = '{{ asset('images/products/garand-101/' . $image) }}'"
                    class="group relative aspect-square overflow-hidden rounded-xl border border-slate-200 bg-slate-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2"
                >
                    <img
                        src="{{ asset('images/products/garand-101/' . $image) }}"
                        alt="Garand 101"
                        class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                        loading="lazy"
                    >
                    <span class="absolute inset-0 flex items-center justify-center bg-slate-900/0 opacity-0 transition group-hover:bg-slate-900/30 group-hover:opacity-100">
                        <span class="rounded-lg bg-white/90 px-3 py-1.5 text-xs font-semibold text-slate-800">View</span>
                    </span>
                </button>
            @endforeach
        </div>
    </div>

    {{-- Lightbox --}}
    <template x-teleport="body">
        <div
            x-show="active"
            x-cloak
            @keydown.escape.window="active = null"
            class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-900/80 p-4 backdrop-blur-sm"
            @click="active = null"
        >
            <img :src="active" alt="Garand 101 enlarged" class="max-h-[90vh] max-w-[90vw] rounded-xl border border-white/20 shadow-2xl" @click.stop>
            <button type="button" class="absolute right-5 top-5 rounded-full bg-white/10 p-2 text-white hover:bg-white/20" @click="active = null" aria-label="Close">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </template>
</section>

{{-- CTA --}}
<section class="section pt-0">
    <div class="container-page">
        <div class="card flex flex-col items-center justify-between gap-6 bg-brand-50 p-8 sm:flex-row sm:p-10">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Interested in Garand 101?</h2>
                <p class="mt-2 text-slate-600">Get pricing, availability and specifications — get in touch with our team.</p>
            </div>
            <a href="{{ route('contacts') }}" class="btn-primary shrink-0">
                Contact us
                <x-icon name="arrow-right" class="h-4 w-4" />
            </a>
        </div>
    </div>
</section>

@endsection
