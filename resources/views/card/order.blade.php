@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>
    <link href="{{ asset('css/order.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<div class="order-container">
    <h1>Your Order</h1>
    <table class="order-table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cardProducts as $cardProduct)
            <tr>
                <td>{{ $cardProduct['product']->id }}</td>
                <td>{{ $cardProduct['product']->title }}</td>
                <td>{{ $cardProduct['product']->price }}</td>
                <td>{{ $cardProduct['card_item']->quantity }}</td>
                <td>{{ $cardProduct['product']->price * $cardProduct['card_item']->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total-price">
        <p style="font-size: 25px">Total Price: MAD{{ $totalPrice }}</p>
        <p>Shipping: 0</p>
    </div>
    <button class="pay-button">Pay Now</button>
</div>
@endsection
