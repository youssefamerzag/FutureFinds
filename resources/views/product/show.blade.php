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
                <img src="{{ asset('imgs/' .$product->image) }}" alt="{{ $product->title }}">
            </div>
            <div class="content" >
                <input value="{{ $product->id }}" hidden name="productId">
                <h1 class="product-title">{{ $product->title }}</h1>
                <p class="product-description">{{ $product->description }}</p>
                <p class="product-price">MAD {{ $product->price }}</p>
                <div class="quantity">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1">
                </div>
                <form class="btns" action="{{ route('card.buy', $product->id)}}" method="POST">
                    @csrf
                    <button type="submit" value="add to card" class="buy-now-btn">Buy Now</button>
                </form>
                <form class="btns" action="{{ route('card.add', $product->id)}}" method="POST">
                    @csrf
                    <button type="submit" value="add to card" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.buy-now-btn, .add-to-cart-btn').click(function() {
            // Get the quantity value
            var quantity = $('#quantity').val();

            // Add the quantity value to the form data
            $(this).closest('form').append('<input type="hidden" name="quantity" value="' + quantity + '">');
        });
    });
</script>


@endsection
