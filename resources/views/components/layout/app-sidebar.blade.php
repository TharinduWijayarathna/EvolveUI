{{-- Sidebar Overlay (Mobile) --}}
<div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-black/50 lg:hidden"
    x-cloak></div>

{{-- Sidebar --}}
<aside
    class="fixed inset-y-0 left-0 z-50 w-64 flex flex-col bg-sidebar p-2 transition-transform duration-300 md:translate-x-0 md:flex"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" x-cloak>
    @if (Route::has('dashboard'))
        <x-ui.button tag="a" variant="ghost" :href="route('dashboard')" class="h-8 w-full justify-start">
            <x-icons.app-logo class="!size-5" />
            <span class="text-base font-semibold">{{ config('app.name', 'App') }}</span>
        </x-ui.button>
    @else
        <div class="h-8 w-full flex items-center justify-start px-2">
            <x-icons.app-logo class="!size-5" />
            <span class="text-base font-semibold">{{ config('app.name', 'App') }}</span>
        </div>
    @endif

    {{-- Nav Links --}}
    <div class="flex flex-1 flex-col gap-4 overflow-auto mt-4">
        <ul class="flex flex-col gap-1">
            {{-- Search Input --}}
            <li>
                <x-ui.input-group class="!ring-0">
                    <x-ui.input-group-input id="search" type="text" name="search" required autocomplete="off"
                        autocorrect="off" autocapitalize="off" spellcheck="false" placeholder="Search..."
                        value="{{ old('search') }}" />

                    <x-ui.input-group-addon>
                        <x-icons.search />
                    </x-ui.input-group-addon>
                </x-ui.input-group>
            </li>
        </ul>
        <ul class="flex flex-col gap-1">
            <li>
                <span
                    class="text-sidebar-foreground/70 ring-sidebar-ring flex h-8 shrink-0 items-center rounded-md px-2 text-xs font-medium outline-hidden transition-[margin,opacity] duration-200 ease-linear focus-visible:ring-2 [&>svg]:size-4 [&>svg]:shrink-0">
                    Platform
                </span>
            </li>
            @php
                $sidebarLinks = [
                    [
                        'route' => 'dashboard',
                        'icon' => 'layout-grid',
                        'label' => 'Dashboard',
                    ],
                    [
                        'route' => 'generator',
                        'icon' => 'sparkles',
                        'label' => 'Generator',
                    ],
                    [
                        'route' => 'approvals',
                        'icon' => 'file-check',
                        'label' => 'Approvals',
                    ],
                    [
                        'route' => 'connect.index',
                        'icon' => 'link',
                        'label' => 'Connect',
                    ],
                    [
                        'route' => 'scheduler',
                        'icon' => 'calendar-clock',
                        'label' => 'Scheduler',
                    ],
                ];
            @endphp

            @foreach ($sidebarLinks as $link)
                @if (Route::has($link['route']))
                    <li>
                        <x-ui.button tag="a" variant="ghost" :href="route($link['route'])"
                            class="h-8 w-full justify-start cursor-default {{ request()->routeIs($link['route']) ? 'bg-accent/50' : '' }}">
                            <x-dynamic-component :component="'icons.' . $link['icon']" />
                            {{ $link['label'] }}
                        </x-ui.button>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    {{-- Footer Nav Links --}}
    @if (Route::has('profile.edit'))
        <div class="mt-auto">
            <x-ui.button tag="a" variant="ghost" :href="route('profile.edit')"
                class="h-8 w-full justify-start cursor-default {{ request()->routeIs('profile.edit') ? 'bg-accent/50' : '' }}">
                <x-icons.message-circle-more />
                Support
            </x-ui.button>
        </div>
    @endif
</aside>
