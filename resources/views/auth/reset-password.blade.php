<x-layouts.guest>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}" />

        <!-- Email Address -->
        <div>
            <label for="email" class="label">Email</label>
            <input
                id="email"
                class="input input-primary mt-1 block w-full"
                type="email"
                name="email"
                value="{{ old('email', $request->email) }}"
                autofocus
                autocomplete="username"
                required
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="label">Password</label>
            <x-password-input id="password" name="password" autocomplete="new-password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="label">{{ __('Confirm Password') }}</label>
            <x-password-input
                id="password_confirmation"
                name="password_confirmation"
                autocomplete="new-password"
                required
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <button class="btn btn-soft btn-primary">{{ __('Reset Password') }}</button>
        </div>
    </form>
</x-layouts.guest>
