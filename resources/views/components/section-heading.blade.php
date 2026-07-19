@props([
    'eyebrow' => null,
    'title' => null,
    'subtitle' => null,
    'align' => 'left',   // left | center
])

<div @class([
    'max-w-2xl',
    'mx-auto text-center' => $align === 'center',
])>
    @if ($eyebrow)
        <span class="eyebrow">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
            {{ $eyebrow }}
        </span>
    @endif

    @if ($title)
        <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
            {{ $title }}
        </h2>
    @endif

    @if ($subtitle)
        <p class="mt-4 text-base leading-relaxed text-slate-600 sm:text-lg">
            {{ $subtitle }}
        </p>
    @endif
</div>
