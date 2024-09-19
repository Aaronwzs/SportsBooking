<!-- layouts/base.blade.php -->

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">
    <head>
        @include('home.css')  <!-- Include common CSS files -->
        <title>@yield('title')</title> <!-- Page title is dynamic -->
    </head>
    <body class="u-body u-xl-mode" data-lang="en">
        <!-- Header -->
        <div class="flex items-center justify-between p-4">
            <div class="flex items-center space-x-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="padding: 20px 100px 10px 20px;">
                    @yield('header-title') <!-- Dynamic header title -->
                </h2>

                <!-- Navigation Links (Dynamic for each page) -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @yield('navigation') <!-- Dynamic navigation links -->
                </div>
            </div>

            <div class="ml-auto">
                <x-app-layout></x-app-layout> <!-- Move layout to the right -->
            </div>
        </div>

        <!-- Main Content -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @yield('content') <!-- Content specific to each page -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('home.footer') <!-- Common footer -->
    </body>
</html>
