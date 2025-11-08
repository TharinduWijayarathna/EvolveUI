@if ($src)
    <img src="{{ $src }}" alt="{{ $alt }}" {{ $attributes->merge(['class' => $imageClasses()]) }}>
@endif
