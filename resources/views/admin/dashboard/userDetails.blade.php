@extends('layouts.dashboard')

@section('content')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FutureFinds</title>
    <link href="{{ asset('css/dashboard/userDetail.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div>
<div style="info">
    <div style="display: flex ; flex-direction: column ">
        <p>name :{{ $user->name }}</p>
        <p>email :{{ $user->email }}</p>
        <p>role :{{ $user->role }}</p>
    </div>
</div>
<h3>Products in Card :</h3>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>image</th>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td><img src="{{asset('imgs/'. $product['product']->image)}}" width="100px"></td>
                    <td>{{ $product['product']->title }}</td>
                    <td>{{ $product['product']->price }}</td>
                    <td>{{ $product['card_item']->quantity}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
</body>
</html>