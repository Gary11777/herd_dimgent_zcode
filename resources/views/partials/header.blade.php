<header
    x-data="{ open: false, scrolled: false }"
    @scroll.window="scrolled = window.scrollY > 8"
    :class="scrolled ? 'border-slate-200 bg-white/90 shadow-sm' : 'border-transparent bg-white/70'"
    class="sticky top-0 z-50 border-b backdrop-blur-md transition-colors duration-200"
>
    <nav class="container-page flex h-16 items-center justify-between gap-4">
        {{-- Logo chip --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 rounded-xl bg-white px-2.5 py-1.5 ring-1 ring-slate-200 transition hover:ring-brand-300">
            <img src="{{ asset('images/logo.png') }}" alt="Dimgent Technologies" class="h-8 w-auto">
        </a>

        {{-- Desktop nav --}}
        <div class="hidden items-center gap-1 md:flex">
            @php
                $nav = [
                    'home'     => 'Home',
                    'products' => 'Products',
                    'services' => 'Services',
                    'projects' => 'Projects',
                    'about'    => 'About',
                    'contacts' => 'Contacts',
                ];
            @endphp
            @foreach ($nav as $route => $label)
                <a
                    href="{{ route($route) }}"
                    @class([
                        'rounded-lg px-3.5 py-2 text-sm font-medium transition-colors',
                        'text-brand-700' => request()->routeIs($route) || ($route === 'home' && request()->routeIs('home')),
                        'text-slate-600 hover:bg-slate-100 hover:text-slate-900' => ! request()->routeIs($route),
                    ])
                    aria-current="{{ request()->routeIs($route) ? 'page' : 'false' }}"
                >
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <div class="hidden md:block">
            <a href="{{ route('contacts') }}" class="btn-primary">
                Get in touch
            </a>
        </div>

        {{-- Mobile menu button --}}
        <button
            type="button"
            class="inline-flex items-center justify-center rounded-lg p-2 text-slate-700 hover:bg-slate-100 md:hidden"
            @click="open = !open"
            :aria-expanded="open"
            aria-controls="mobile-menu"
            aria-label="Toggle menu"
        >
            <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
            </svg>
            <svg x-show="open" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
            </svg>
        </button>
    </nav>

    {{-- Mobile menu panel --}}
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        id="mobile-menu"
        class="border-t border-slate-200 bg-white md:hidden"
    >
        <div class="container-page space-y-1 py-4">
            @foreach ([
                'home' => 'Home',
                'products' => 'Products',
                'services' => 'Services',
                'projects' => 'Projects',
                'about' => 'About',
                'contacts' => 'Contacts',
            ] as $route => $label)
                <a
                    href="{{ route($route) }}"
                    @click="open = false"
                    @class([
                        'block rounded-lg px-3 py-2.5 text-base font-medium transition-colors',
                        'bg-brand-50 text-brand-700' => request()->routeIs($route),
                        'text-slate-700 hover:bg-slate-100' => ! request()->routeIs($route),
                    ])
                >
                    {{ $label }}
                </a>
            @endforeach
            <a href="{{ route('contacts') }}" @click="open = false" class="btn-primary mt-3 w-full">
                Get in touch
            </a>
        </div>
    </div>
</header>

<style>[x-cloak]{display:none!important}</style>
