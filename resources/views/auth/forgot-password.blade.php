<x-layouts.guest>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success mb-4" role="alert">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="label">Email</label>
            <input
                id="email"
                class="input input-primary mt-1 block w-full"
                type="email"
                name="email"
                value="{{ old('email') }}"
                autofocus
                autocomplete="username"
                required
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <a
                class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}"
            >
                {{ __('Back to login') }}
            </a>
            <button class="btn btn-soft btn-primary ms-3">{{ __('Email Password Reset Link') }}</button>
        </div>
    </form>
</x-layouts.guest>
