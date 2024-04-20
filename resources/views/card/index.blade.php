@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="content">
    <div class="card">
        <div class="products">
        <div class="titles">
            <span>Image</span>
            <span>Title</span>
            <span>Price</span>
            <span>Quantity</span>
        </div>
            @foreach ($cardProducts as $cardProduct)
            <div class="product">
                <img>
                <p>{{ $cardProduct['product']->title }}</p>
                <p>{{ $cardProduct['product']->price }}</p>
                <p>{{ $cardProduct['card_item']->quantity }}</p>
            </div>
            @endforeach
        </div>
    </div>
    <div class="test">
        <div class="Summary">
            <h1 class="SummaryTitle">Summary</h1>
            <h3>1224dh</h3>
        </div>
    </div>
</div>
</body>
@endsection