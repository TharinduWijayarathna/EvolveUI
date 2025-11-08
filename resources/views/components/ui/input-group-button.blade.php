<x-ui.button type="{{ $type }}" variant="{{ $variant }}" data-size="{{ $size }}"
    {{ $attributes->merge(['class' => $buttonClasses()]) }}>
    {{ $slot }}
</x-ui.button>
