@props(['class' => ''])

<thead {{ $attributes->merge(['class' => cn('[&_tr]:border-b', $class)]) }}>
    {{ $slot }}
</thead>

