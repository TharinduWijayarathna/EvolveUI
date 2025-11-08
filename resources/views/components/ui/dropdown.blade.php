<div x-data="{ open: false }" class="relative inline-block text-left">
    <div @click="open = !open">
        {{ $trigger ?? '' }}
    </div>

    <div x-show="open" @click.outside="open = false" x-transition x-cloak
        class="absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-md border border-input bg-popover text-popover-foreground shadow-md">
        {{ $slot }}
    </div>
</div>
