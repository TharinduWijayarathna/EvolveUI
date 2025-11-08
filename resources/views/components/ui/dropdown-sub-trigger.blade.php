<div {{ $attributes->merge(['class' => $dropdownSubTriggerClasses()]) }}>
    {{ $slot }}
    <x-icons.chevron-right class="ml-auto" />
</div>
