
@extends('layouts.base') <!-- Extend the base layout -->

@section('title', 'User Homepage') <!-- Set the page title -->

@section('header-title')
    {{ __('User Homepage') }} <!-- User-specific header title -->
@endsection

@section('navigation')


<x-nav-link :href="route('booking.book')" :active="request()->routeIs('booking.book')">
    {{ __('Product') }}
</x-nav-link>
<x-nav-link :href="route('deals.promotion')" :active="request()->routeIs('deals.promotion')">
    {{ __('Deals') }}
</x-nav-link>
 
@endsection
        
@section('content')


       

        @include('home.mainscreen')
    
        @include ('home.product')

        @include ('home.promotion')

        @include ('home.addition_details')
  
       
  
        @endsection