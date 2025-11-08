@props([
    'value' => 0,
    'class' => '',
])

<div {{ $attributes->merge(['class' => cn('relative h-4 w-full overflow-hidden rounded-full bg-secondary', $class)]) }}>
    <div
        class="h-full w-full flex-1 bg-primary transition-all"
        style="transform: translateX(-{{ 100 - ($value ?? 0) }}%)"
    ></div>
</div>

