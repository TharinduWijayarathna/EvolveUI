@props([
    'placeholder' => 'What would you like to create?',
    'name' => 'message',
    'value' => '',
    'class' => '',
])

<textarea 
    name="{{ $name }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => cn(
        'w-full resize-none rounded-none border-none p-3 shadow-none outline-none ring-0',
        'field-sizing-content max-h-[6lh] bg-transparent dark:bg-transparent',
        'focus-visible:ring-0',
        $class
    )]) }}
    rows="1"
>{{ $value }}</textarea>

