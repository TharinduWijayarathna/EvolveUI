<x-layout.auth title="Forgot Password" description="Enter your email to receive a password reset link">
    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <div class="space-y-2">
            <x-ui.label for="email">Email</x-ui.label>
            <x-ui.input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-ui.input-error :message="$errors->first('email')" />
        </div>

        @if (session('status'))
            <div class="rounded-md bg-green-50 p-4 dark:bg-green-900/20">
                <p class="text-sm text-green-800 dark:text-green-200">{{ session('status') }}</p>
            </div>
        @endif

        <x-ui.button type="submit" class="w-full">
            Send Reset Link
        </x-ui.button>
    </form>
</x-layout.auth>

