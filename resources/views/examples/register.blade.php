<x-layout.auth title="Create an account" description="Enter your information to get started" :showSignInPrompt="true">
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div class="space-y-2">
            <x-ui.label for="name">Name</x-ui.label>
            <x-ui.input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-ui.input-error :message="$errors->first('name')" />
        </div>

        <div class="space-y-2">
            <x-ui.label for="email">Email</x-ui.label>
            <x-ui.input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-ui.input-error :message="$errors->first('email')" />
        </div>

        <div class="space-y-2">
            <x-ui.label for="password">Password</x-ui.label>
            <x-ui.input id="password" type="password" name="password" required autocomplete="new-password" />
            <x-ui.input-error :message="$errors->first('password')" />
        </div>

        <div class="space-y-2">
            <x-ui.label for="password_confirmation">Confirm Password</x-ui.label>
            <x-ui.input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="flex items-start space-x-2">
            <input type="checkbox" id="terms" name="terms" required class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary mt-0.5" />
            <x-ui.label for="terms" class="text-sm font-normal">
                I agree to the <x-ui.text-link :href="route('terms')" class="underline">Terms of Service</x-ui.text-link> and <x-ui.text-link :href="route('privacy')" class="underline">Privacy Policy</x-ui.text-link>
            </x-ui.label>
        </div>

        <x-ui.button type="submit" class="w-full">
            Create account
        </x-ui.button>
    </form>

    <div class="relative">
        <div class="absolute inset-0 flex items-center">
            <span class="w-full border-t"></span>
        </div>
        <div class="relative flex justify-center text-xs uppercase">
            <span class="bg-background px-2 text-muted-foreground">Or continue with</span>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <x-ui.button variant="outline" type="button" class="w-full" tag="a" :href="route('auth.google')">
            <x-icons.google-logo class="size-4" />
            Google
        </x-ui.button>
        <x-ui.button variant="outline" type="button" class="w-full" tag="a" :href="route('auth.apple')">
            <x-icons.apple-logo class="size-4" />
            Apple
        </x-ui.button>
    </div>
</x-layout.auth>

