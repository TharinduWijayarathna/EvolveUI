<button type="button" {{ $attributes->merge(['class' => $dropdownTriggerClasses()]) }}>
    {{ $slot }}
</button>
