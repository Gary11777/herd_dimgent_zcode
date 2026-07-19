@extends('layouts.app')

@section('content')

@php
    $expertise = [
        'Devices and embedded systems using microcontrollers and microprocessors.',
        'Analog electronic devices.',
        'Digital electronic devices — logical systems, programmable logical matrices, embedded systems.',
        'Telemechanics (telemetry and remote controls) using infra-red and radio channels (Wi-Fi, Bluetooth, GSM and non-standard protocols).',
        'Systems to digitize analog and speech signals.',
        'Software for various microcontrollers.',
        'Designs for printed circuit boards.',
        'Signal monitors for three-phase power circuits.',
        'Magnetic ferroprobe gauges (gradiometers) and electronic soil probes.',
        'Robotics.',
        'Automated systems to measure microchips and hardware devices.',
    ];
@endphp

{{-- Hero --}}
<section class="relative overflow-hidden bg-slate-900 text-white">
    <div class="absolute inset-0 bg-grid opacity-50" aria-hidden="true"></div>
    <div class="container-page relative py-16 sm:py-20">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.15em] text-brand-200">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-500"></span>
                About us
            </span>
            <h1 class="mt-5 text-4xl font-bold tracking-tight sm:text-5xl">
                Specialists in electronic device development
            </h1>
            <p class="mt-5 text-lg text-slate-300">
                «Dimgent Technologies» is a group of specialists working in the sector of electronic
                device development. Our development center is based in Minsk, Belarus.
            </p>
        </div>
    </div>
</section>

{{-- Intro --}}
<section class="section">
    <div class="container-page">
        <div class="grid gap-12 lg:grid-cols-3">
            <div class="lg:col-span-2">
                <p class="text-lg leading-relaxed text-slate-700">
                    We develop customized electronic devices. Our company includes engineers,
                    designers and programmers — and our specialists have been creating electronic
                    devices for more than twenty years. Over that time we have developed and taken
                    part in the development of more than 50 projects.
                </p>
                <p class="mt-4 text-slate-600">
                    Dimgent Technologies offers a comprehensive approach to every project. We can
                    offer both full-cycle electronic device development (from concept to finished
                    product) or carry out separate phases — developing electric circuits, software,
                    printed circuit board drawings and more.
                </p>

                <div class="mt-10 rounded-2xl border border-brand-100 bg-brand-50 p-7">
                    <span class="eyebrow">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                        Our aim
                    </span>
                    <ul class="mt-5 space-y-3">
                        @foreach ([
                            'We want our clients to be fully satisfied with the results of our work.',
                            'We work with our clients until the product is exactly the one they want it to be.',
                            'We offer ideas for changes and improvements to make the product even better.',
                        ] as $aim)
                            <li class="flex items-start gap-3 text-slate-700">
                                <x-icon name="check" class="mt-0.5 h-5 w-5 shrink-0 text-brand-600" />
                                <span>{{ $aim }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <aside>
                <div class="card sticky top-24 p-7">
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-500">At a glance</h3>
                    <dl class="mt-4 space-y-4 text-sm">
                        <div>
                            <dt class="text-slate-500">Development center</dt>
                            <dd class="mt-0.5 font-medium text-slate-900">Minsk, Belarus</dd>
                        </div>
                        <div>
                            <dt class="text-slate-500">Founded expertise</dt>
                            <dd class="mt-0.5 font-medium text-slate-900">20+ years</dd>
                        </div>
                        <div>
                            <dt class="text-slate-500">Projects delivered</dt>
                            <dd class="mt-0.5 font-medium text-slate-900">50+</dd>
                        </div>
                        <div>
                            <dt class="text-slate-500">Team</dt>
                            <dd class="mt-0.5 font-medium text-slate-900">Engineers, designers, programmers</dd>
                        </div>
                    </dl>
                </div>
            </aside>
        </div>
    </div>
</section>

{{-- Stats band --}}
<x-stat-band :stats="[
    ['value' => '20+', 'label' => 'Years of experience'],
    ['value' => '50+', 'label' => 'Projects completed'],
    ['value' => '100%', 'label' => 'Design success rate'],
    ['value' => '1:1', 'label' => 'Dedicated attention'],
]" />

{{-- Expertise --}}
<section class="section bg-white">
    <div class="container-page">
        <x-section-heading
            eyebrow="Experience"
            title="Areas of expertise"
            subtitle="From microcontrollers to robotics — the domains we've built in."
        />
        <div class="mt-12 grid gap-4 sm:grid-cols-2">
            @foreach ($expertise as $item)
                <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-slate-50 p-5">
                    <x-icon name="chip" class="mt-0.5 h-5 w-5 shrink-0 text-brand-600" />
                    <span class="text-sm text-slate-700">{{ $item }}</span>
                </div>
            @endforeach
        </div>

        <div class="mt-8 rounded-xl bg-slate-100 px-5 py-4 text-sm text-slate-600">
            We are happy to work on both large and small projects, for big or small enterprises.
            We strive to ensure the lowest cost of the products we develop by careful selection of
            components — maintaining the balance between cost and quality.
        </div>
    </div>
</section>

{{-- Provide + reasons grid --}}
<section class="section">
    <div class="container-page">
        <div class="grid gap-10 lg:grid-cols-2">
            <div class="card p-7">
                <h3 class="text-xl font-semibold text-slate-900">We can provide</h3>
                <ul class="mt-5 space-y-3">
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
            <div class="card p-7">
                <h3 class="text-xl font-semibold text-slate-900">Reasons to choose us</h3>
                <ul class="mt-5 space-y-3">
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
        <div class="relative overflow-hidden rounded-3xl bg-slate-900 px-8 py-14 text-center text-white sm:px-16">
            <div class="absolute inset-0 bg-grid opacity-50" aria-hidden="true"></div>
            <div class="relative mx-auto max-w-2xl">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Let's build something reliable.</h2>
                <p class="mt-4 text-slate-300">
                    Cost-effectiveness, quick turn-around times and high quality — the reasons our clients come back.
                </p>
                <a href="{{ route('contacts') }}" class="btn-primary mt-8">
                    Get in touch
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
