@props([
    'id',
    'options' => [],
    'value' => '',
    'name' => null,
    'class' => '',
])

@php
    $radioName = $name ?? $id;
@endphp

<x-ui.radio-group 
    :name="$radioName" 
    :options="$options" 
    :value="$value" 
    :class="$class"
/>

