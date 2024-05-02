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
            @foreach ($orders as $order)
                <div class="product">
                    <div>
                        <p>{{ $order['order']->id }}</p>
                        <p style="color: gray">ID</p>
                    </div>
                    <div>
                        <p>{{ $order['order']->status }}</p>
                        <p style="color: gray">Status</p>
                    </div>
                    <div>
                        <p>{{ $order['order']->created_at }}</p>
                        <p style="color: gray">Created By</p>
                    </div>
                    <div>
                        <p>{{ $order['user']->name}}</p>
                        <p style="color: gray">Customer</p> 
                    </div>  
                    <div>
                        <p>{{ $order['orderTotal']}}</p>
                        <p style="color: gray">Total</p> 
                    </div> 
                </div>
            @endforeach
        </div>
    
    </div>

</div>

@endsection