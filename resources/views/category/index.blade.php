@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>
    <link href="{{ asset('css/category.css') }}" rel="stylesheet">
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
    <a href="/" style="background: #0077b6; padding: 10px 30px; border-radius: 5px; text-decoration: none; color : white ; margin-left: 30px">Back</a>
    <p class="title">{{ $category->name }}</p>
    <div class="sortBtns">
        <a class="sortBtn" href="{{ route('product.sortby', $category)}}">lowerToHigher</a>
        <a class="sortBtn" href="{{ route('product.sortByDesc', $category)}}">higherToLower</a>
    </div>
    <div class="products">
        @foreach ($products as $product)
            <a href="{{ route('products.show' , $product->id )}}" class="product">
                <div>
                    <img src="{{ asset('imgs/' . $product->image) }}" alt="{{ $product->title }}">
                </div>
                <div class="content">
                    <p>{{ $product->title }}</p>
                    <p>MAD {{ $product->price }}</p>
                </div>
            </a>
        @endforeach
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var titles = document.querySelectorAll('.product .content p:first-child');
        titles.forEach(function(title) {
            var text = title.textContent || title.innerText;
            var words = text.split(' ');
            if (words.length > 4) {
                var truncatedText = words.slice(0, 4).join(' ') + '...';
                title.textContent = truncatedText;
            }
        });
    });
</script>
</html>
@endsection