<div x-data="{ openSub: false }" class="relative">
    <div @mouseenter="openSub = true" @mouseleave="openSub = false">
        {{ $trigger ?? '' }}
        <div x-show="openSub" x-transition x-cloak
            class="absolute left-full top-0 ml-1 min-w-[8rem] rounded-md border bg-popover p-1 text-popover-foreground shadow-md">
            {{ $slot }}
        </div>
    </div>
</div>
