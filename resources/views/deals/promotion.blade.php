@extends('layouts.base') <!-- Extend the base layout -->

@section('title', 'Deals') <!-- Set the page title -->

@section('header-title')
    {{ __('Deals') }} <!-- User-specific header title -->
@endsection

@section('navigation')

    <x-nav-link :href="route('booking.product')" :active="request()->routeIs('booking.product')">
        {{ __('Product') }}
    </x-nav-link>
    <x-nav-link :href="route('deals.promotion')" :active="request()->routeIs('deals.promotion')">
        {{ __('Deals') }}
    </x-nav-link>
@endsection

@section('content')
    <!-- Content specific to user profile -->
    <div>
        {{ __("Welcome to Promotion page!") }}
    </div>
@endsection