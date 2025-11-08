<div data-slot="empty-icon" data-variant="{{ $variant }}"
    {{ $attributes->merge(['class' => $emptyMediaClasses()]) }}>
    {{ $slot }}
</div>
