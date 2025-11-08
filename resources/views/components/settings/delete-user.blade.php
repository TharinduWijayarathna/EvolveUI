<div class="space-y-6">
    <x-ui.heading-small title="Delete account" description="Delete your account and all of its resources" />
    <x-ui.dialog>
        <form action="{{ route('profile.destroy') }}" method="POST" class="space-y-6">
            <x-ui.dialog-trigger>
                <div
                    class="space-y-4 rounded-lg border border-red-100 bg-red-50 p-4 dark:border-red-200/10 dark:bg-red-700/10">
                    <div class="relative space-y-0.5 text-red-600 dark:text-red-100">
                        <p class="font-medium">Warning</p>
                        <p class="text-sm">Please proceed with caution, this cannot be undone.</p>
                    </div>

                    <x-ui.button variant="destructive" id="deleteAccountBtn">Delete account</x-ui.button>
                </div>
            </x-ui.dialog-trigger>
            <x-ui.dialog-overlay />
            <x-ui.dialog-content>
                <x-ui.dialog-header>
                    <x-ui.dialog-title>Are you sure you want to delete your account?</x-ui.dialog-title>
                    <x-ui.dialog-description>Deleting your account will permanently remove all data. Please enter your
                        password to confirm.</x-ui.dialog-description>
                </x-ui.dialog-header>
                @csrf
                @method('DELETE')
                <div class="grid gap-4">
                    <div class="grid gap-3">
                        <x-ui.label for="password">Password</x-ui.label>
                        <x-ui.input id="password" type="password" name="password" placeholder="Password"
                            autocomplete="current-password" required />
                        <x-ui.input-error message="{{ $errors->first('password') }}" />
                    </div>
                </div>
                <x-ui.dialog-footer class="gap-2">
                    <x-ui.dialog-close>
                        <x-ui.button variant="outline" type="button" class="w-full">
                            Cancel
                        </x-ui.button>
                    </x-ui.dialog-close>
                    <x-ui.button variant="destructive" type="submit">Delete account</x-ui.button>
                </x-ui.dialog-footer>
            </x-ui.dialog-content>
        </form>
    </x-ui.dialog>
</div>
