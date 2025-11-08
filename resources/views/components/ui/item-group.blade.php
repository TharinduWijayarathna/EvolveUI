<div {{ $attributes->merge(['class' => $groupClasses(), 'role' => 'list', 'data-slot' => 'item-group']) }}>
    {{ $slot }}
</div>
