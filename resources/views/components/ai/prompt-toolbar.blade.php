@props([
    'class' => '',
])

<div {{ $attributes->merge(['class' => cn('flex items-center justify-between p-1', $class)]) }}>
    {{ $slot }}
</div>

