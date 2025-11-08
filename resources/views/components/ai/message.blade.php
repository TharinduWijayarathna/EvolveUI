@props([
    'from' => 'assistant', // 'user' or 'assistant'
    'class' => '',
])

@php
    $isUser = $from === 'user';
    $baseClasses = 'group flex w-full items-end justify-end gap-2 py-4 [&>div]:max-w-[80%]';
    $fromClasses = $isUser ? 'is-user' : 'is-assistant flex-row-reverse justify-end';
@endphp

<div {{ $attributes->merge(['class' => cn($baseClasses, $fromClasses, $class)]) }}>
    {{ $slot }}
</div>

