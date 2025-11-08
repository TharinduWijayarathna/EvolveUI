@props([
    'liked' => false,
    'class' => '',
])

@php
    $onclick = $attributes->get('onclick', '');
    $attributes = $attributes->except('onclick');
@endphp

<button
    onclick="event.stopPropagation(); {{ $onclick }}"
    {{ $attributes->merge(['class' => cn(
        'relative inline-flex h-9 cursor-pointer items-center justify-center gap-2 whitespace-nowrap rounded-md px-3 text-xs font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0',
        $liked
            ? 'bg-[linear-gradient(122.13deg,#69BFF9_0.4%,#B96AF3_30.35%,#E9685E_71.13%,#F2AC3E_100.4%)] text-white opacity-100 shadow-md'
            : 'bg-neutral-100 text-neutral-600 opacity-0 group-hover:opacity-100 hover:bg-neutral-100/90 dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-900/90',
        $class
    )]) }}
>
    <x-icons.heart class="{{ cn($liked ? 'fill-white' : 'fill-neutral-600') }}" />
    {{ $slot ?? ($liked ? 'Liked' : 'Like') }}
</button>

