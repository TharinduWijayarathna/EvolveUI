<div x-show="open" x-transition x-trap.noscroll="open" @keydown.escape.window="open = false"
    {{ $attributes->merge(['class' => $contentClasses()]) }} role="dialog" aria-modal="true">
    {{ $slot }}
    <button type="button" @click="open = false"
        class="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2">
        <x-icons.x class="h-4 w-4" />
        <span class="sr-only">Close</span>
    </button>
</div>
