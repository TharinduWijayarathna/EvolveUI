<x-layout.app title="Profile" :breadcrumbs="[['label' => 'Profile', 'href' => route('profile.edit')]]">
    <div class="space-y-6">
        {{-- Page Header --}}
        <div>
            <h1 class="text-3xl font-bold tracking-tight">Profile</h1>
            <p class="text-muted-foreground">Manage your account settings and preferences.</p>
        </div>

        <div class="grid gap-6">
            {{-- Profile Information --}}
            <x-ui.card>
                <x-ui.card-header>
                    <x-ui.card-title>Profile Information</x-ui.card-title>
                    <x-ui.card-description>Update your account's profile information and email address.</x-ui.card-description>
                </x-ui.card-header>
                <x-ui.card-content>
                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                        @csrf
                        @method('patch')

                        <div class="space-y-2">
                            <x-ui.label for="name">Name</x-ui.label>
                            <x-ui.input id="name" name="name" type="text" :value="old('name', Auth::user()->name)" required autofocus autocomplete="name" />
                            <x-ui.input-error :message="$errors->get('name')" />
                        </div>

                        <div class="space-y-2">
                            <x-ui.label for="email">Email</x-ui.label>
                            <x-ui.input id="email" name="email" type="email" :value="old('email', Auth::user()->email)" required autocomplete="username" />
                            <x-ui.input-error :message="$errors->get('email')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-ui.button type="submit">Save Changes</x-ui.button>
                            @if (session('status') === 'profile-updated')
                                <p class="text-sm text-green-600 dark:text-green-400">Saved.</p>
                            @endif
                        </div>
                    </form>
                </x-ui.card-content>
            </x-ui.card>

            {{-- Update Password --}}
            <x-ui.card>
                <x-ui.card-header>
                    <x-ui.card-title>Update Password</x-ui.card-title>
                    <x-ui.card-description>Ensure your account is using a long, random password to stay secure.</x-ui.card-description>
                </x-ui.card-header>
                <x-ui.card-content>
                    <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                        @csrf
                        @method('put')

                        <div class="space-y-2">
                            <x-ui.label for="current_password">Current Password</x-ui.label>
                            <x-ui.input id="current_password" name="current_password" type="password" autocomplete="current-password" />
                            <x-ui.input-error :message="$errors->updatePassword->get('current_password')" />
                        </div>

                        <div class="space-y-2">
                            <x-ui.label for="password">New Password</x-ui.label>
                            <x-ui.input id="password" name="password" type="password" autocomplete="new-password" />
                            <x-ui.input-error :message="$errors->updatePassword->get('password')" />
                        </div>

                        <div class="space-y-2">
                            <x-ui.label for="password_confirmation">Confirm Password</x-ui.label>
                            <x-ui.input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
                            <x-ui.input-error :message="$errors->updatePassword->get('password_confirmation')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-ui.button type="submit">Update Password</x-ui.button>
                            @if (session('status') === 'password-updated')
                                <p class="text-sm text-green-600 dark:text-green-400">Saved.</p>
                            @endif
                        </div>
                    </form>
                </x-ui.card-content>
            </x-ui.card>

            {{-- Delete Account --}}
            <x-ui.card>
                <x-ui.card-header>
                    <x-ui.card-title>Delete Account</x-ui.card-title>
                    <x-ui.card-description>Once your account is deleted, all of its resources and data will be permanently deleted.</x-ui.card-description>
                </x-ui.card-header>
                <x-ui.card-content>
                    <x-ui.dialog>
                        <x-ui.dialog-trigger>
                            <x-ui.button variant="destructive">Delete Account</x-ui.button>
                        </x-ui.dialog-trigger>
                        <x-ui.dialog-overlay />
                        <x-ui.dialog-content>
                            <x-ui.dialog-header>
                                <x-ui.dialog-title>Are you absolutely sure?</x-ui.dialog-title>
                                <x-ui.dialog-description>
                                    This action cannot be undone. This will permanently delete your account and remove your data from our servers.
                                </x-ui.dialog-description>
                            </x-ui.dialog-header>
                            <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-4">
                                @csrf
                                @method('delete')

                                <div class="space-y-2">
                                    <x-ui.label for="password_delete">Password</x-ui.label>
                                    <x-ui.input id="password_delete" name="password" type="password" placeholder="Enter your password" required />
                                    <x-ui.input-error :message="$errors->userDeletion->get('password')" />
                                </div>

                                <x-ui.dialog-footer>
                                    <x-ui.dialog-close>
                                        <x-ui.button variant="outline" type="button">Cancel</x-ui.button>
                                    </x-ui.dialog-close>
                                    <x-ui.button variant="destructive" type="submit">Delete Account</x-ui.button>
                                </x-ui.dialog-footer>
                            </form>
                        </x-ui.dialog-content>
                    </x-ui.dialog>
                </x-ui.card-content>
            </x-ui.card>
        </div>
    </div>
</x-layout.app>

