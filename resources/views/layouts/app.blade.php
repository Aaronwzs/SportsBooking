<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            let timeoutDuration = {{ config('session.lifetime') * 60 * 1000 }}; // Convert to milliseconds
            let warningDuration = 5 * 60 * 1000; // 5 minutes warning

           // Check if the warning has already been shown
    let warningShown = localStorage.getItem('warningShown') === 'true';

let sessionTimeout = setTimeout(() => {
    if (!warningShown) {
        alert('Your session is about to expire due to inactivity.');
        localStorage.setItem('warningShown', 'true');
        // Optionally redirect to login page or refresh token
    }
}, timeoutDuration - warningDuration);


            let resetTimeout = () => {
                clearTimeout(sessionTimeout);
                sessionTimeout = setTimeout(() => {
                    alert('Your session is about to expire due to inactivity.');
                    // Optionally redirect to login page or refresh token
                }, timeoutDuration - warningDuration);
            };

            document.addEventListener('mousemove', resetTimeout);
            document.addEventListener('keypress', resetTimeout);
        });
    </script>
    </head>
    <body class="font-sans antialiased">
        <div class="">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
