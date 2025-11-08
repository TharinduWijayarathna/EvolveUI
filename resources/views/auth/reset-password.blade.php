<x-layout.auth title="Reset Password" description="Enter your new password">
    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="space-y-2">
            <x-ui.label for="email">Email</x-ui.label>
            <x-ui.input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
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
            <x-ui.input-error :message="$errors->first('password_confirmation')" />
        </div>

        <x-ui.button type="submit" class="w-full">
            Reset Password
        </x-ui.button>
    </form>
</x-layout.auth>

