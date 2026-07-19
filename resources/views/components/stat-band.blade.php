{{--
    Stats band — reusable highlight strip with 2–4 figures.
    Usage:
    <x-stat-band :stats="[['value' => '20+', 'label' => 'Years of experience'], ...]" />
--}}
@props(['stats' => []])

<section class="bg-brand-700 text-white">
    <div class="container-page py-12">
        <dl class="grid grid-cols-2 gap-8 lg:grid-cols-4">
            @foreach ($stats as $stat)
                <div class="text-center sm:text-left">
                    <dt class="text-sm font-medium uppercase tracking-wider text-brand-100">
                        {{ $stat['label'] }}
                    </dt>
                    <dd class="mt-1 text-3xl font-bold tracking-tight text-white sm:text-4xl">
                        {{ $stat['value'] }}
                    </dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>
