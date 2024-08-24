


    <div class="flex items-center justify-between p-4">
    <!-- Flex container for header and navigation links -->
    <div class="flex items-center space-x-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="padding: 20px 100px 10px 20px;">
            {{ __('Admin Dashboard') }}
        </h2>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Homepage') }}
            </x-nav-link>
        </div>
    </div>




    <!-- Move x-app-layout div to the most right of the screen -->
    <div class="ml-auto">
        <x-app-layout>
        </x-app-layout>
    </div>
</div>


<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in as Admin!") }}
                </div>
            </div>
        </div>
    </div>
