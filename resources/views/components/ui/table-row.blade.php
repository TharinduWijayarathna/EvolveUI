@props(['class' => ''])

<tr {{ $attributes->merge(['class' => cn('border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted', $class)]) }}>
    {{ $slot }}
</tr>

