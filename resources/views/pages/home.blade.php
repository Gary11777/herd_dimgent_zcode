@extends('layouts.app')

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden bg-slate-900 text-white">
    <div class="absolute inset-0 bg-grid opacity-60" aria-hidden="true"></div>
    <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-brand-600/30 blur-3xl" aria-hidden="true"></div>
    <div class="absolute -bottom-40 -left-24 h-96 w-96 rounded-full bg-accent-500/20 blur-3xl" aria-hidden="true"></div>

    <div class="container-page relative py-20 sm:py-28">
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.15em] text-brand-200 backdrop-blur">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>
                Electronics Development
            </span>
            <h1 class="mt-6 text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl">
                Custom electronic devices,<br class="hidden sm:block">
                <span class="text-gradient">built from concept to product.</span>
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-slate-300">
                Dimgent Technologies is a team of engineers, designers and programmers with more
                than 20 years of experience developing electronic devices — from specifications
                and circuit design to software, PCB layout and finished prototypes.
            </p>
            <div class="mt-9 flex flex-col items-center justify-center gap-3 sm:flex-row">
                <a href="{{ route('contacts') }}" class="btn-primary">
                    Start a project
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
                <a href="{{ route('services') }}" class="btn-secondary border-white/20 bg-white/5 text-white hover:bg-white/10">
                    Explore services
                </a>
            </div>
        </div>
    </div>
</section>

{{-- What we do --}}
<section class="section">
    <div class="container-page">
        <x-section-heading
            eyebrow="What we do"
            title="Two ways to work together"
            subtitle="We can take your idea all the way to a finished product — or step in for just the phases you need."
        />

        <div class="mt-14 grid gap-6 md:grid-cols-2">
            <div class="card card-hover p-8">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-600">
                    <x-icon name="rocket" class="h-6 w-6" />
                </div>
                <h3 class="mt-5 text-xl font-semibold text-slate-900">Full-cycle development</h3>
                <p class="mt-3 text-slate-600">
                    From concept to finished product — specifications, circuit design, software,
                    PCB layout, housing design, prototyping and certification, all handled by our team.
                </p>
            </div>

            <div class="card card-hover p-8">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-accent-500/10 text-accent-600">
                    <x-icon name="circuit" class="h-6 w-6" />
                </div>
                <h3 class="mt-5 text-xl font-semibold text-slate-900">Individual phases</h3>
                <p class="mt-3 text-slate-600">
                    Need only part of the cycle? We can deliver circuit development, software,
                    PCB drawings or prototyping — and complete projects others have already started.
                </p>
            </div>
        </div>

        {{-- Capabilities strip --}}
        <div class="mt-10 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">
            @foreach ([
                ['chip', 'Specifications'],
                ['circuit', 'Electric circuits'],
                ['code', 'Software'],
                ['cube', 'PCB layouts'],
                ['cog', 'Housing design'],
                ['beaker', 'Prototyping'],
            ] as $capability)
                <div class="flex flex-col items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-5 text-center">
                    <x-icon :name="$capability[0]" class="h-6 w-6 text-brand-600" />
                    <span class="text-sm font-medium text-slate-700">{{ $capability[1] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Product showcase (Garand 101) --}}
<section class="section bg-white">
    <div class="container-page">
        <div class="grid items-center gap-12 lg:grid-cols-2">
            <div class="relative order-2 lg:order-1">
                <div class="absolute -inset-4 -z-10 rounded-3xl bg-gradient-to-tr from-brand-100 to-accent-500/10 blur-2xl" aria-hidden="true"></div>
                <img
                    src="{{ asset('images/products/garand-101/main.jpg') }}"
                    alt="Garand 101 magnetometer-gradiometer"
                    class="aspect-[4/3] w-full rounded-2xl border border-slate-200 object-cover shadow-xl"
                    loading="lazy"
                >
            </div>
            <div class="order-1 lg:order-2">
                <span class="eyebrow">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                    Featured product
                </span>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    Garand 101
                </h2>
                <p class="mt-2 text-lg font-medium text-slate-500">
                    A high-resolution fluxgate magnetometer-gradiometer.
                </p>
                <p class="mt-5 text-slate-600">
                    Designed to measure disruptions in the Earth's magnetic field caused by
                    ferromagnetic objects, Garand 101 reliably detects iron, steel and nickel —
                    in a lightweight, fully digital, plug-and-play device built for one-person operation.
                </p>
                <ul class="mt-6 space-y-2.5">
                    @foreach (['Innovative magnetic field measurement technology', 'Fully digital — improved noise stability', 'Expanded detection area, affordable price'] as $point)
                        <li class="flex items-start gap-3 text-slate-700">
                            <x-icon name="check" class="mt-0.5 h-5 w-5 shrink-0 text-brand-600" />
                            <span>{{ $point }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-8">
                    <a href="{{ route('products') }}" class="btn-primary">
                        View product details
                        <x-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Stats band --}}
<x-stat-band :stats="[
    ['value' => '20+', 'label' => 'Years of experience'],
    ['value' => '50+', 'label' => 'Projects completed'],
    ['value' => '100%', 'label' => 'Design success rate'],
    ['value' => 'Minsk', 'label' => 'Development center'],
]" />

{{-- Why choose us --}}
<section class="section">
    <div class="container-page">
        <x-section-heading
            eyebrow="Why Dimgent"
            title="Cost-effective, fast, reliable"
            subtitle="The main reasons clients choose us — and stay with us."
            align="center"
        />

        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['currency', 'Cost-effective', 'Careful component selection keeps the balance between cost and quality — every time.'],
                ['clock', 'Short turn-around', 'We take only the projects we can fully concentrate on, so your timeline stays tight.'],
                ['shield', 'Guaranteed quality', 'Every product is assembled and tested in our laboratory before delivery.'],
                ['bolt', 'Standard design elements', 'Reusable building blocks help keep costs down without cutting corners.'],
                ['heart-pulse', 'Ongoing support', 'All of our projects get continued support from the team that built them.'],
                ['globe', 'Distance is no problem', 'We keep you updated with photos and video — wherever you are in the world.'],
            ] as $card)
                <div class="card card-hover p-6">
                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
                        <x-icon :name="$card[0]" class="h-5 w-5" />
                    </div>
                    <h3 class="mt-4 text-base font-semibold text-slate-900">{{ $card[1] }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $card[2] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA band --}}
<section class="section pt-0">
    <div class="container-page">
        <div class="relative overflow-hidden rounded-3xl bg-slate-900 px-8 py-14 text-center text-white sm:px-16">
            <div class="absolute inset-0 bg-grid opacity-50" aria-hidden="true"></div>
            <div class="relative mx-auto max-w-2xl">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">
                    Have an idea for an electronic device?
                </h2>
                <p class="mt-4 text-lg text-slate-300">
                    Tell us what you're building. We'll get back to you with how we can help —
                    full cycle or just the phases you need.
                </p>
                <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
                    <a href="{{ route('contacts') }}" class="btn-primary">
                        Get in touch
                        <x-icon name="mail" class="h-4 w-4" />
                    </a>
                    <a href="{{ route('products') }}" class="btn-secondary border-white/20 bg-white/5 text-white hover:bg-white/10">
                        See our products
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
