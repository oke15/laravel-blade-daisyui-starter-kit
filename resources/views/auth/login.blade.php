<x-layouts.guest>
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="label">Email</label>
            <input
                id="email"
                class="input input-primary validator mt-1 block w-full"
                type="email"
                name="email"
                value="{{ old('email') }}"
                autofocus
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="label">Password</label>

            <x-password-input id="password" name="password" autocomplete="current-password" required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 block">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember"
                />
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div class="mt-4 flex items-center justify-end">
            @if (Route::has('password.request'))
                <a
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}"
                >
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <button class="btn btn-soft btn-primary ms-3">Login</button>
        </div>
    </form>
</x-layouts.guest>
