@props([
    'class' => '',
])

<div {{ $attributes->merge(['class' => cn(
    'flex flex-col gap-2 overflow-hidden rounded-lg px-4 py-3 text-foreground text-sm',
    'group-[.is-user]:bg-primary group-[.is-user]:text-primary-foreground',
    'group-[.is-assistant]:bg-secondary group-[.is-assistant]:text-foreground',
    $class
)]) }}>
    {{ $slot }}
</div>

