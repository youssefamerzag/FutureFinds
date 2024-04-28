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
    <link href="{{ asset('css/dashboard/products.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<div>
    <div class="header">
        <p>Products</p>
        <a style="text-decoration: none;color: white" href="{{ route('dashboard.createProduct')}}"><button>Create Product</button></a>
    </div>

    <div>
        <div class="products">
            @foreach ($products as $product)
                <div class="product">
                    <img src="{{ asset('imgs/' . $product->image)}}" alt="{{ $product->title }}">
                    <p class="productTitle">{{ $product->title }}</p>
                    <div>
                        <p>{{ $product->price }}</p>
                        <p style="color: gray">Price</p>
                    </div>
                    <div>
                        <p>#{{ $product->id }}</p>
                        <p style="color: gray">id</p>
                    </div>
                    <div>
                        <p>{{ $product->category->name}}</p>
                        <p style="color: gray">Category</p>
                    </div>
                    <div>
                        <p>{{ $product->user->name}}</p>
                        <p style="color: gray">Created By</p>
                    </div>
                    <p class="detailsLink">Details</p>
                    <a class="detailsLink" href="{{ route('dashboard.productsEdit', $product->id)}}" >Details</a>
                </div>
            @endforeach
        </div>
    
    </div>

</div>

@endsection