@props(['class' => ''])

<th {{ $attributes->merge(['class' => cn('h-12 px-4 text-left align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0', $class)]) }}>
    {{ $slot }}
</th>

