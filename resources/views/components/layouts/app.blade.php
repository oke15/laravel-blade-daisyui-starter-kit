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
    <script>
        // terapkan tema sebelum render untuk menghindari flash
        (function () {
            const storedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.documentElement.setAttribute('data-theme', storedTheme || (prefersDark ? 'dark' : 'light'));
        })();
    </script>
</head>
<body class="font-sans antialiased">
    <div class="bg-base-200 text-base-content min-h-screen">
        <div class="drawer lg:drawer-open">
            <input id="my-drawer-4" type="checkbox" class="drawer-toggle inline" checked />
            <div class="drawer-content">
                <!-- Navbar -->
                <nav class="navbar bg-base-100 border-base-300 w-full border-b">
                    <label for="my-drawer-4" aria-label="open sidebar" class="btn btn-square btn-ghost drawer-button">
                        <!-- Sidebar toggle icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="my-1.5 inline-block size-4">
                            <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                            <path d="M9 4v16"></path>
                            <path d="M14 10l2 2l-2 2"></path>
                        </svg>
                    </label>
                    <div class="px-4">{{ config('app.name', 'Laravel') }}</div>
                    <label class="swap swap-rotate btn btn-ghost btn-circle ml-auto" aria-label="Toggle dark mode">
                        <input id="theme-toggle" type="checkbox" value="dark" />
                        <!-- Sun (light) -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="swap-off size-5">
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                        </svg>
                        <!-- Moon (dark) -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="swap-on size-5">
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                        </svg>
                    </label>
                </nav>
                <!-- Page content here -->
                <main class="p-4">{{ $slot }}</main>
            </div>

            <div class="drawer-side is-drawer-close:overflow-visible">
                <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
                <div class="bg-base-100 border-base-300 is-drawer-close:w-14 is-drawer-open:w-64 flex min-h-full flex-col items-start border-r">
                    <!-- Sidebar content here -->

                    <div class="flex h-20 w-full items-center justify-center">
                        <a href="/">
                            <x-application-logo class="text-base-content/60 h-12 w-12 fill-current" />
                        </a>
                    </div>

                    <ul class="menu w-full grow space-y-2">
                        <li>
                            <x-nav-link href="{{ route('dashboard') }}" route="dashboard" tooltip="Homepage">
                                <x-slot:icon>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="my-1.5 inline-block size-4">
                                        <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path>
                                        <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    </svg>
                                </x-slot:icon>
                                Homepage
                            </x-nav-link>
                        </li>
                    </ul>

                    <div class="w-full p-2">
                        <div class="card card-border bg-base-200 is-drawer-close:border-0 is-drawer-close:bg-transparent">
                            <div class="card-body is-drawer-close:p-0 items-center gap-2 p-3">
                                <div
                                    class="is-drawer-close:tooltip is-drawer-close:tooltip-right w-full"
                                    data-tip="{{ auth()->user()?->name }}"
                                >
                                    <div class="flex w-full items-center gap-3">
                                        <div class="avatar avatar-placeholder shrink-0">
                                            <div class="bg-primary text-primary-content size-10 rounded-full">
                                                <span class="text-sm font-semibold">
                                                    {{ str(auth()->user()?->name)->substr(0, 1)->upper() }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="is-drawer-close:hidden min-w-0 flex-1">
                                            <p class="truncate text-sm font-semibold">{{ auth()->user()?->name }}</p>
                                            <p class="text-base-content/60 truncate text-xs">
                                                {{ auth()->user()?->email }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="is-drawer-close:justify-center flex w-full">
                                    <button
                                        type="button"
                                        onclick="document.getElementById('logout-modal').showModal()"
                                        class="btn btn-soft btn-error btn-sm btn-block is-drawer-close:hidden"
                                    >
                                        Logout
                                    </button>
                                    <div
                                        class="is-drawer-open:hidden is-drawer-close:tooltip is-drawer-close:tooltip-right"
                                        data-tip="Logout"
                                    >
                                        <button
                                            type="button"
                                            onclick="document.getElementById('logout-modal').showModal()"
                                            class="btn btn-square btn-sm btn-ghost"
                                            aria-label="Logout"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="size-4">
                                                <path d="M9 21H5a2 2 0 0 1 -2 -2V5a2 2 0 0 1 2 -2h4"></path>
                                                <path d="M16 17l5 -5l-5 -5"></path>
                                                <path d="M21 12H9"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <dialog id="logout-modal" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Konfirmasi Logout</h3>
            <p class="py-4">Apakah Anda yakin ingin keluar dari aplikasi?</p>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-ghost">Batal</button>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-error">Logout</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <script>
        // untuk tonggle drawer di desktop
        const drawerToggle = document.getElementById('my-drawer-4');

        if (drawerToggle) {
            const desktop = window.matchMedia('(min-width: 1024px)');

            const syncDrawerState = () => {
                drawerToggle.checked = desktop.matches;
            };

            syncDrawerState();
            desktop.addEventListener('change', syncDrawerState);
        }

        // untuk tonggle darkmode
        const themeToggle = document.getElementById('theme-toggle');

        if (themeToggle) {
            themeToggle.checked = document.documentElement.getAttribute('data-theme') === 'dark';

            themeToggle.addEventListener('change', () => {
                const theme = themeToggle.checked ? 'dark' : 'light';
                document.documentElement.setAttribute('data-theme', theme);
                localStorage.setItem('theme', theme);
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
