@extends('layouts.base') <!-- Extend the base layout -->

@section('title', 'Admin Dashboard') <!-- Set the page title -->

@section('header-title')
    {{ __('Admin Dashboard') }} <!-- Admin-specific header title -->
@endsection

@section('navigation')
    <!-- Admin-specific navigation links -->
   
    <x-nav-link :href="route('admin.users')" :active="request()->routeIs('admin.users')">
        {{ __('Manage Users') }}
    </x-nav-link>
    <x-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')">
        {{ __('Reports') }}
    </x-nav-link>
    <x-nav-link :href="route('admin.booking')" :active="request()->routeIs('admin.booking')">
        {{ __('Booking List') }}
    </x-nav-link>
@endsection

@section('content')
    <div>
        {{ __("You're logged in as Admin!") }} <!-- Admin-specific content -->
    </div>
@endsection
