@props([
    'class' => '',
])

<div {{ $attributes->merge(['class' => cn('size-full prose prose-sm dark:prose-invert [&>*:first-child]:mt-0 [&>*:last-child]:mb-0', $class)]) }}>
    {{ $slot }}
</div>

