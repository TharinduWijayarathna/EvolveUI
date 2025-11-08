@props([
    'class' => '',
])

<div {{ $attributes->merge(['class' => cn('relative flex-1 overflow-y-auto min-h-0', $class)]) }} role="log">
    {{ $slot }}
</div>

