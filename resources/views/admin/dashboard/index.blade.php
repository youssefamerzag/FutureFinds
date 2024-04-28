@extends('layouts.dashboard')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product Page</title>
    <!-- Styles -->
    <link href="{{ asset('css/dashboard/index.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<div>
    <div class="statistics">
        <div class="statistic" style="background-color: #4ece3a">
            <p class="statistic_title">PROFITS</p>
            <p class="statistic_value">600 MAD</p>
        </div>
        <div class="statistic" style="background-color: #3ab795">
            <p class="statistic_title">Orders</p>
            <p class="statistic_value">4</p>
        </div>
        <a href="{{ route('dashboard.users')}}" class="statistic" style="background-color: #8ecae6">
            <p class="statistic_title">Clients</p>
            <p class="statistic_value">{{ $clients }}</p>
        </a>
        <div class="statistic" style="background-color: #7f7f7f">
            <p class="statistic_title">Products</p>
            <p class="statistic_value">{{ $Products }}</p>
        </div>
        <div class="statistic" style="background-color: #525174">
            <p class="statistic_title">Products In Card</p>
            <p class="statistic_value">{{ $productsInCard}}</p>
        </div>
    </div>

    <p style="margin: 10px ; font-size: 25px; margin-top: 30px">Last Orders:</p>
    <div class="orders">
        <div class="order">
            <img>
            <p class="orderTitle">iPhone 14</p>
            <div>
                <p>2</p>
                <p style="color: gray">Quantity</p>
            </div>
            <div>
                <p>8000 MAD</p>
                <p style="color: gray">Sold amount</p>
            </div>
            <div>
                <p>#1229</p>
                <p style="color: gray">Order id</p>
            </div>
            <div>
                <p>youssef amerzag</p>
                <p style="color: gray">Client</p>
            </div>
            <p class="detailsLink">Details</p>
        </div>
        <div class="order">
            <img>
            <p class="orderTitle">iPhone 14</p>
            <div>
                <p>2</p>
                <p style="color: gray">Quantity</p>
            </div>
            <div>
                <p>8000 MAD</p>
                <p style="color: gray">Sold amount</p>
            </div>
            <div>
                <p>#1229</p>
                <p style="color: gray">Order id</p>
            </div>
            <div>
                <p>youssef amerzag</p>
                <p style="color: gray">Client</p>
            </div>
            <p class="detailsLink">Details</p>
        </div>
    </div>

</div>
@endsection