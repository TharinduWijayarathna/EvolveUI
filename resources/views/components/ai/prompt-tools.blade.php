@props([
    'class' => '',
])

<div {{ $attributes->merge(['class' => cn('flex items-center gap-1 [&_button:first-child]:rounded-bl-xl', $class)]) }}>
    {{ $slot }}
</div>

