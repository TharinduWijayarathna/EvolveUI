<x-layout.auth title="Welcome back" description="Sign in to your account to continue" :showSignUpPrompt="true">
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div class="space-y-2">
            <x-ui.label for="email">Email</x-ui.label>
            <x-ui.input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-ui.input-error :message="$errors->first('email')" />
        </div>

        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <x-ui.label for="password">Password</x-ui.label>
                <x-ui.text-link :href="route('password.request')" class="text-xs">
                    Forgot password?
                </x-ui.text-link>
            </div>
            <x-ui.input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-ui.input-error :message="$errors->first('password')" />
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" id="remember" name="remember" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" />
            <x-ui.label for="remember" class="text-sm font-normal">
                Remember me
            </x-ui.label>
        </div>

        <x-ui.button type="submit" class="w-full">
            Sign in
        </x-ui.button>
    </form>
</x-layout.auth>

