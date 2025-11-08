<header class="flex h-14 shrink-0 items-center gap-2 border-b transition-[width,height] ease-linear">
    <div class="flex w-full items-center gap-1 px-4 lg:gap-2 lg:px-6">
        <x-ui.button variant="ghost" size="icon" @click="sidebarOpen = !sidebarOpen" class="inline-flex lg:hidden">
            <x-icons.panel-left />
            <span class="sr-only">Toggle sidebar</span>
        </x-ui.button>
        <div class="block lg:hidden bg-border shrink-0 w-px mx-2 h-4"></div>

        {{-- Breadcrumb --}}
        <x-ui.breadcrumb :breadcrumbs="$breadcrumbs" />

        <div class="ml-auto flex items-center gap-2">
            {{-- User Avatar --}}
            <x-ui.dropdown>
                <x-slot:trigger>
                    <x-ui.avatar class="size-8 overflow-hidden rounded-full">
                        {{-- <x-ui.avatar-image src="" :alt="Auth::user()->name" /> --}}
                        <x-ui.avatar-fallback :name="Auth::user()->name"
                            class="rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white" />
                    </x-ui.avatar>
                </x-slot:trigger>

                <x-ui.dropdown-content>
                    <x-ui.dropdown-label>
                        <p class="text-sm leading-none font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-muted-foreground text-xs leading-none">{{ Auth::user()->email }}</p>
                    </x-ui.dropdown-label>
                    <x-ui.dropdown-separator />
                    <x-ui.dropdown-item :href="route('profile.edit')">Profile</x-ui.dropdown-item>
                    <x-ui.dropdown-item href="#">Settings</x-ui.dropdown-item>

                    <x-ui.dropdown-separator />

                    <x-ui.dropdown-item :href="route('logout')" method="post">Logout</x-ui.dropdown-item>
                </x-ui.dropdown-content>
            </x-ui.dropdown>
        </div>
    </div>
</header>
