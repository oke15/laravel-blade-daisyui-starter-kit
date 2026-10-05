<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    @fonts
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
    <div class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0 dark:bg-gray-900">
        <div>
            <a href="/" class="inline-block">
                <x-application-logo class="h-24 w-24 drop-shadow-md" />
            </a>
        </div>

        <div class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg dark:bg-gray-800">
            {{ $slot }}
        </div>
    </div>

    <script>
        function togglePasswordVisibility(button) {
            const input = button.parentElement.querySelector('input');
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';
            button.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Tampilkan password');
            button.querySelectorAll('svg').forEach((icon) => icon.classList.toggle('hidden'));
        }
    </script>
</body>
</html>
