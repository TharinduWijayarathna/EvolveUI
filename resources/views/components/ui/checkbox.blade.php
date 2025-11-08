@props([
    'checked' => false,
])

<input type="checkbox" {{ $checked ? 'checked' : '' }}
    {{ $attributes->merge(['class' => 'h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-offset-gray-900']) }} />

