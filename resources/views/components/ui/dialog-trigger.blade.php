<div {{ $attributes->merge(['class' => $triggerClasses()]) }} @click="open = true">
    {{ $slot }}
</div>
