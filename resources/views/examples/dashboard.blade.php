<x-layout.app title="Dashboard" :breadcrumbs="[['label' => 'Dashboard', 'href' => route('dashboard')]]">
    <div class="space-y-6">
        {{-- Welcome Section --}}
        <div>
            <h1 class="text-2xl font-semibold">Welcome back, {{ Auth::user()->name }}!</h1>
            <p class="text-muted-foreground">Here's what's happening with your account today.</p>
        </div>

        {{-- Stats Grid --}}
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            <x-ui.card>
                <x-ui.card-header class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <x-ui.card-title class="text-sm font-medium">Total Revenue</x-ui.card-title>
                    <x-icons.trending-up class="h-4 w-4 text-muted-foreground" />
                </x-ui.card-header>
                <x-ui.card-content>
                    <div class="text-2xl font-bold">$45,231.89</div>
                    <p class="text-xs text-muted-foreground">+20.1% from last month</p>
                </x-ui.card-content>
            </x-ui.card>

            <x-ui.card>
                <x-ui.card-header class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <x-ui.card-title class="text-sm font-medium">Subscriptions</x-ui.card-title>
                    <x-icons.users class="h-4 w-4 text-muted-foreground" />
                </x-ui.card-header>
                <x-ui.card-content>
                    <div class="text-2xl font-bold">+2350</div>
                    <p class="text-xs text-muted-foreground">+180.1% from last month</p>
                </x-ui.card-content>
            </x-ui.card>

            <x-ui.card>
                <x-ui.card-header class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <x-ui.card-title class="text-sm font-medium">Sales</x-ui.card-title>
                    <x-icons.trending-up class="h-4 w-4 text-muted-foreground" />
                </x-ui.card-header>
                <x-ui.card-content>
                    <div class="text-2xl font-bold">+12,234</div>
                    <p class="text-xs text-muted-foreground">+19% from last month</p>
                </x-ui.card-content>
            </x-ui.card>

            <x-ui.card>
                <x-ui.card-header class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <x-ui.card-title class="text-sm font-medium">Active Now</x-ui.card-title>
                    <x-icons.analytics-up class="h-4 w-4 text-muted-foreground" />
                </x-ui.card-header>
                <x-ui.card-content>
                    <div class="text-2xl font-bold">+573</div>
                    <p class="text-xs text-muted-foreground">+201 since last hour</p>
                </x-ui.card-content>
            </x-ui.card>
        </div>

        {{-- Recent Activity --}}
        <x-ui.card>
            <x-ui.card-header>
                <x-ui.card-title>Recent Activity</x-ui.card-title>
                <x-ui.card-description>Your recent transactions and updates</x-ui.card-description>
            </x-ui.card-header>
            <x-ui.card-content>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <x-ui.avatar>
                                <x-ui.avatar-fallback name="JD" />
                            </x-ui.avatar>
                            <div>
                                <p class="text-sm font-medium">Payment received</p>
                                <p class="text-xs text-muted-foreground">2 hours ago</p>
                            </div>
                        </div>
                        <x-ui.badge variant="default">+$250.00</x-ui.badge>
                    </div>
                    <x-ui.separator />
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <x-ui.avatar>
                                <x-ui.avatar-fallback name="AB" />
                            </x-ui.avatar>
                            <div>
                                <p class="text-sm font-medium">New subscription</p>
                                <p class="text-xs text-muted-foreground">5 hours ago</p>
                            </div>
                        </div>
                        <x-ui.badge variant="secondary">Active</x-ui.badge>
                    </div>
                </div>
            </x-ui.card-content>
        </x-ui.card>
    </div>
</x-layout.app>

