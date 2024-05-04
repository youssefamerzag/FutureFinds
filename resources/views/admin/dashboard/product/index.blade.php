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
        <a style="text-decoration: none;color: white" href="{{ route('dashboard.createProduct')}}"><button class="bg-gray-500">Create Product</button></a>
    </div>

    <div class="w-full flex  justify-center bg-blue-100 rounded-md shadow-[rgba(50,_50,_105,_0.15)_0px_2px_5px_0px,_rgba(0,_0,_0,_0.05)_0px_1px_1px_0px]">
        <div class="min-w-max max-w-screen-xl w-full">
            @foreach ($products as $product)
                <div class="product rounded-md  transition ease-in hover:bg-gray-100 hover:shadow-[rgba(17,_17,_26,_0.1)_0px_0px_14px]">
                    <img style="width: 80px ; height: 80px" src="{{ asset('imgs/' . $product->image)}}" alt="{{ $product->title }}">
                    <p class="productTitle text-left ml-2 w-1/4">{{ $product->title }}</p>
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
                    <button class="bg-blue-500 py-1 px-2.5 rounded-sm mx-2"><a style="color: white; text-decoration: none">Details</a></button>
                    <a class="detailsLink mx-4" href="{{ route('dashboard.productsEdit', $product->id)}}" >
                        <img width="30" height="30" src="https://img.icons8.com/fluency/48/create-new.png" alt="create-new"/>
                    </a>
                </div>
            @endforeach
        </div>
    
    </div>

</div>

@endsection