@props(['class' => ''])

<td {{ $attributes->merge(['class' => cn('p-4 align-middle [&:has([role=checkbox])]:pr-0', $class)]) }}>
    {{ $slot }}
</td>

