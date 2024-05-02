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
            <div>
                <p class="statistic_title">PROFITS</p>
                <p class="statistic_value">600.00</p>
            </div>
            <div>
                <img width="50" height="50" src="https://img.icons8.com/dotty/80/FFFFFF/money.png" alt="money"/>
            </div>
        </div>
        <div class="statistic" style="background-color: #3ab795">
            <div>
                <p class="statistic_title">Orders</p>
                <p class="statistic_value">{{ $ordersTotal }}</p>
            </div>
            <div>
                <img width="50" height="50" src="https://img.icons8.com/external-kmg-design-glyph-kmg-design/64/FFFFFF/external-logistics-shipping-delivery-kmg-design-glyph-kmg-design-2.png" alt="external-logistics-shipping-delivery-kmg-design-glyph-kmg-design-2"/>
            </div>
        </div>
        <a href="{{ route('dashboard.users')}}" class="statistic" style="background-color: #8ecae6">
            <div>
                <p class="statistic_title">Clients</p>
                <p class="statistic_value">{{ $clients }}</p>
            </div>
            <div>
                <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/conference-foreground-selected.png" alt="conference-foreground-selected"/>
            </div>
        </a>
        <div class="statistic" style="background-color: #7f7f7f">
            <div>
                <p class="statistic_title">Products</p>
                <p class="statistic_value">{{ $Products }}</p>
            </div>
            <div>
                <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/fast-moving-consumer-goods.png" alt="fast-moving-consumer-goods"/>
            </div>
        </div>
        <div class="statistic" style="background-color: #525174">
            <div>
                <p class="statistic_title">In Card</p>
                <p class="statistic_value">{{ $productsInCard}}</p>
            </div>
            <div>
                <img width="50" height="50" src="https://img.icons8.com/ios-glyphs/60/FFFFFF/shopping-cart--v1.png" alt="shopping-cart--v1"/>
            </div>
        </div>
    </div>

    <p style="margin: 10px ; font-size: 25px; margin-top: 30px">Last Ordered Products</p>
    <div class="orders">
        @foreach ($orders as $order)
            @foreach($order['products'] as $product)
                <div class="order">
                    <img src="{{ asset('imgs/' . $product['image'] )}}">
                    <p class="orderTitle">{{ $product['title']}}</p>
                    <div>
                        <p>{{ $product['quantity']}}</p>
                        <p style="color: gray">Quantity</p>
                    </div>
                    <div>
                        <p>{{ $product['price']}} MAD</p>
                        <p style="color: gray">Sold amount</p>
                    </div>
                    <div>
                        <p>#{{ $order['order_id'] }}</p>
                        <p style="color: gray">Order id</p>
                    </div>
                    <div>
                        <p>{{ $order['user']->name }}</p>
                        <p style="color: gray">Client</p>
                    </div>
                    <p class="detailsLink">Details</p>
                </div>
            @endforeach
        @endforeach
    </div>

</div>
@endsection