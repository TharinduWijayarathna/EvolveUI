<div {{ $attributes->merge(['class' => $itemClasses()]) }} data-slot="item" data-variant="{{ $variant }}"
    data-size="{{ $size }}">
    {{ $slot }}
</div>
