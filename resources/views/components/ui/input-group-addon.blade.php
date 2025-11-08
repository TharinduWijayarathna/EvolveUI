<div role="group" data-slot="input-group-addon" data-align="{{ $align }}"
    {{ $attributes->merge(['class' => $addonClasses()]) }}>
    {{ $slot }}
</div>
