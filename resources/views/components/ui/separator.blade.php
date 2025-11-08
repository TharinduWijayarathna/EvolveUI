@props([
    'orientation' => 'horizontal',
    'decorative' => true,
])

<div {{ $attributes->merge(['class' => $separatorClasses()]) }} role="{{ $decorative ? 'separator' : null }}"></div>
