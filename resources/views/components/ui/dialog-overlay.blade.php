<div x-show="open" x-transition.opacity {{ $attributes->merge(['class' => $overlayClasses()]) }} @click="open = false">
</div>
