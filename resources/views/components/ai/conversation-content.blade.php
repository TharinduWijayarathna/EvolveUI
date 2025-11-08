@props([
    'class' => '',
])

<div {{ $attributes->merge(['class' => cn('p-4 w-full', $class)]) }}>
    {{ $slot }}
</div>

