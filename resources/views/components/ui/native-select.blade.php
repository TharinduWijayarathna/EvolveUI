<div class="group/native-select relative w-fit has-[select:disabled]:opacity-50">
    <select {{ $attributes->merge(['class' => $nativeSelectClasses()]) }}>
        {{ $slot }}
    </select>
    <x-icons.chevron-down />
</div>
