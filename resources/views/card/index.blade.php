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
            @foreach ($cardProducts as $cardProduct)
            <div class="product">
                <img src="imgs/{{ $cardProduct['product']->image }}">
                <p>{{ $cardProduct['product']->title }}</p>
                <p>{{ $cardProduct['product']->price }}</p>
                <p>{{ $cardProduct['card_item']->quantity }}</p>
                <form action="{{ route('card.destroy' , $cardProduct['card_item']->id ) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Remove" class="removeBn">
                </form>
            </div>
            @endforeach
        </div>
    </div>
    <div class="Summary">
        <div class="SummaryItems">
            <h1 class="SummaryTitle">Summary</h1>
            <div class="">
                    @foreach($cardProducts as $cardProduct)
                    <div style="display: flex; justify-content: space-between">
                        <p>{{ $cardProduct['product']->price }}</p> 
                        <p>x {{ $cardProduct['card_item']->quantity }}</p>
                    </div>
                    @endforeach
            </div>
            <div>
                Shipping : 0
            </div>
            <div style="display: flex; justify-content: space-between; font-size: 30px">
                <p>Total :</p>
                <p>{{ $totalPrice }}</p>
            </div>
                <button class="checkoutBtn">Go to checkout</button>
        </div>
    </div>
</div>
</body>
@endsection