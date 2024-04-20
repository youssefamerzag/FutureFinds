@extends('layouts.app')

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
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="product-container">
        <div class="product">
            <div class="img">
                <img src="{{ asset('images/product-image.jpg') }}" alt="Product Image">
            </div>
            <form class="content" action="{{ route('card.add', $product->id)}}" method="POST">
                @csrf
                <input value="{{ $product->id }}" hidden name="productId">
                <h1 class="product-title">{{ $product->title }}</h1>
                <p class="product-description">{{ $product->description }}</p>
                <p class="product-price">MAD {{ $product->price }}</p>
                <div class="quantity">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1">
                </div>
                <div class="btns">
                    <button type="submit" value="add to card" class="buy-now-btn">Buy Now</button>
                </div>
                <div class="btns">
                    <button type="submit" value="add to card" class="add-to-cart-btn">Add to Cart</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
@endsection
