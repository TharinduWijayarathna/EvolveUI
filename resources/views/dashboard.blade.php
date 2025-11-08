<x-layout.app title="Dashboard" :breadcrumbs="[['label' => 'Dashboard', 'href' => route('dashboard')]]">
    <div class="space-y-8">
        {{-- Page Header --}}
        <div>
            <h1 class="text-3xl font-bold tracking-tight">Dashboard</h1>
            <p class="text-muted-foreground">Welcome back! Here's what's happening with your account today.</p>
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
                    <p class="text-xs text-muted-foreground">
                        <span class="text-green-600 dark:text-green-400">+20.1%</span> from last month
                    </p>
                </x-ui.card-content>
            </x-ui.card>

            <x-ui.card>
                <x-ui.card-header class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <x-ui.card-title class="text-sm font-medium">Subscriptions</x-ui.card-title>
                    <x-icons.users class="h-4 w-4 text-muted-foreground" />
                </x-ui.card-header>
                <x-ui.card-content>
                    <div class="text-2xl font-bold">+2,350</div>
                    <p class="text-xs text-muted-foreground">
                        <span class="text-green-600 dark:text-green-400">+180.1%</span> from last month
                    </p>
                </x-ui.card-content>
            </x-ui.card>

            <x-ui.card>
                <x-ui.card-header class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <x-ui.card-title class="text-sm font-medium">Sales</x-ui.card-title>
                    <x-icons.trending-up class="h-4 w-4 text-muted-foreground" />
                </x-ui.card-header>
                <x-ui.card-content>
                    <div class="text-2xl font-bold">+12,234</div>
                    <p class="text-xs text-muted-foreground">
                        <span class="text-green-600 dark:text-green-400">+19%</span> from last month
                    </p>
                </x-ui.card-content>
            </x-ui.card>

            <x-ui.card>
                <x-ui.card-header class="flex flex-row items-center justify-between space-y-0 pb-2">
                    <x-ui.card-title class="text-sm font-medium">Active Now</x-ui.card-title>
                    <x-icons.analytics-up class="h-4 w-4 text-muted-foreground" />
                </x-ui.card-header>
                <x-ui.card-content>
                    <div class="text-2xl font-bold">+573</div>
                    <p class="text-xs text-muted-foreground">
                        <span class="text-green-600 dark:text-green-400">+201</span> since last hour
                    </p>
                </x-ui.card-content>
            </x-ui.card>
        </div>

        {{-- Recent Sales --}}
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-7">
            <x-ui.card class="col-span-4">
                <x-ui.card-header>
                    <x-ui.card-title>Recent Sales</x-ui.card-title>
                    <x-ui.card-description>You made 265 sales this month.</x-ui.card-description>
                </x-ui.card-header>
                <x-ui.card-content>
                    <x-ui.table>
                        <x-ui.table-header>
                            <x-ui.table-row>
                                <x-ui.table-head>Customer</x-ui.table-head>
                                <x-ui.table-head class="text-right">Amount</x-ui.table-head>
                            </x-ui.table-row>
                        </x-ui.table-header>
                        <x-ui.table-body>
                            <x-ui.table-row>
                                <x-ui.table-cell class="font-medium">
                                    <div class="flex items-center gap-2">
                                        <x-ui.avatar class="h-8 w-8">
                                            <x-ui.avatar-fallback name="OM" />
                                        </x-ui.avatar>
                                        <div>
                                            <div class="font-medium">Olivia Martin</div>
                                            <div class="text-xs text-muted-foreground">olivia.martin@email.com</div>
                                        </div>
                                    </div>
                                </x-ui.table-cell>
                                <x-ui.table-cell class="text-right">$1,999.00</x-ui.table-cell>
                            </x-ui.table-row>
                            <x-ui.table-row>
                                <x-ui.table-cell class="font-medium">
                                    <div class="flex items-center gap-2">
                                        <x-ui.avatar class="h-8 w-8">
                                            <x-ui.avatar-fallback name="JL" />
                                        </x-ui.avatar>
                                        <div>
                                            <div class="font-medium">Jackson Lee</div>
                                            <div class="text-xs text-muted-foreground">jackson.lee@email.com</div>
                                        </div>
                                    </div>
                                </x-ui.table-cell>
                                <x-ui.table-cell class="text-right">$39.00</x-ui.table-cell>
                            </x-ui.table-row>
                            <x-ui.table-row>
                                <x-ui.table-cell class="font-medium">
                                    <div class="flex items-center gap-2">
                                        <x-ui.avatar class="h-8 w-8">
                                            <x-ui.avatar-fallback name="IN" />
                                        </x-ui.avatar>
                                        <div>
                                            <div class="font-medium">Isabella Nguyen</div>
                                            <div class="text-xs text-muted-foreground">isabella.nguyen@email.com</div>
                                        </div>
                                    </div>
                                </x-ui.table-cell>
                                <x-ui.table-cell class="text-right">$299.00</x-ui.table-cell>
                            </x-ui.table-row>
                        </x-ui.table-body>
                    </x-ui.table>
                </x-ui.card-content>
            </x-ui.card>

            <x-ui.card class="col-span-3">
                <x-ui.card-header>
                    <x-ui.card-title>Recent Activity</x-ui.card-title>
                    <x-ui.card-description>Your recent transactions and updates</x-ui.card-description>
                </x-ui.card-header>
                <x-ui.card-content>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <x-ui.avatar class="h-9 w-9">
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
                            <div class="flex items-center gap-3">
                                <x-ui.avatar class="h-9 w-9">
                                    <x-ui.avatar-fallback name="AB" />
                                </x-ui.avatar>
                                <div>
                                    <p class="text-sm font-medium">New subscription</p>
                                    <p class="text-xs text-muted-foreground">5 hours ago</p>
                                </div>
                            </div>
                            <x-ui.badge variant="secondary">Active</x-ui.badge>
                        </div>
                        <x-ui.separator />
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <x-ui.avatar class="h-9 w-9">
                                    <x-ui.avatar-fallback name="SM" />
                                </x-ui.avatar>
                                <div>
                                    <p class="text-sm font-medium">Invoice sent</p>
                                    <p class="text-xs text-muted-foreground">1 day ago</p>
                                </div>
                            </div>
                            <x-ui.badge variant="outline">Pending</x-ui.badge>
                        </div>
                    </div>
                </x-ui.card-content>
            </x-ui.card>
        </div>
    </div>
</x-layout.app>

