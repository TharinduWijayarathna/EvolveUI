<div x-data="{ open: false }" x-transition @keydown.escape.window="open = false" @click.self="open = false" role="dialog"
    aria-modal="true" {{ $attributes }}>
    {{ $slot }}
</div>
