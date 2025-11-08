@props([
    'action' => '',
    'method' => 'POST',
    'class' => '',
])

<form 
    action="{{ $action }}" 
    method="{{ $method }}"
    {{ $attributes->merge(['class' => cn('w-full divide-y overflow-hidden rounded-xl border bg-background shadow-sm', $class)]) }}
>
    @csrf
    {{ $slot }}
</form>

