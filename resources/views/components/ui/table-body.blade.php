@props(['class' => ''])

<tbody {{ $attributes->merge(['class' => cn('[&_tr:last-child]:border-0', $class)]) }}>
    {{ $slot }}
</tbody>

