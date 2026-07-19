<footer class="border-t border-slate-800 bg-slate-900 text-slate-300">
    <div class="container-page py-14">
        <div class="grid gap-10 md:grid-cols-4">
            {{-- Brand --}}
            <div class="md:col-span-2">
                <div class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 ring-1 ring-white/15">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="h-7 w-auto opacity-90 invert">
                    </span>
                    <span class="text-lg font-semibold text-white">Dimgent Technologies</span>
                </div>
                <p class="mt-4 max-w-md text-sm leading-relaxed text-slate-400">
                    Custom electronic device development — from concept to finished product.
                    Circuits, software, PCB design and prototyping by a team with 20+ years of experience.
                </p>
                <p class="mt-4 text-sm text-slate-500">
                    Development center — Minsk, Belarus.
                </p>
            </div>

            {{-- Sitemap --}}
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-200">Site map</h3>
                <ul class="mt-4 space-y-2.5 text-sm">
                    @foreach (['home' => 'Home', 'services' => 'Services', 'projects' => 'Projects'] as $route => $label)
                        <li>
                            <a href="{{ route($route) }}" class="text-slate-400 transition-colors hover:text-white">{{ $label }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- More --}}
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-200">Company</h3>
                <ul class="mt-4 space-y-2.5 text-sm">
                    <li><a href="{{ route('products') }}" class="text-slate-400 transition-colors hover:text-white">Products</a></li>
                    <li><a href="{{ route('about') }}" class="text-slate-400 transition-colors hover:text-white">About</a></li>
                    <li><a href="{{ route('contacts') }}" class="text-slate-400 transition-colors hover:text-white">Contacts</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col items-center justify-between gap-3 border-t border-white/10 pt-6 text-xs text-slate-500 sm:flex-row">
            <p>&copy; {{ date('Y') }} Dimgent Technologies. All rights reserved.</p>
            <p>Electronics development · Minsk, Belarus</p>
        </div>
    </div>
</footer>
