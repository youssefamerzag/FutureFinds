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
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
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
    <header>
        <div class="bannerContent">
            <div>
                <p style="font-size: 20px">Make Smart Choices</p>
                <p style="font-size: 40px; color: #0077b6; font-weight: 900">Dive into our</p>
                <p style="font-size: 40px">Electronics Store</p>
            </div>
            <div>
                <button class="bannerBtn">SHOP NOW</button>
            </div>
        </div>
    </header>
    <body>
        <p class="title"><span style="color: #0077b6">C</span>ATEGORIES</p>
        <div class="categories">
            @foreach($categories as $category)
                <a href={{ route('categories.index', $category->id )}} class="category" style='background-image: url("../imgs/categories/{{$category->name}}.png")'>
                </a>
            @endforeach
        </div>

        <p class="title" style="margin-top: 50px"><span style="color: #0077b6">B</span>EST SELLING</p>
        <div class="productsSlider">
            <div class="slider">
                @foreach($products as $product)
                    <a href="{{ route('products.show' , $product->id)}}" class="product">
                        <div class="productImg" style='background-image: url("../imgs/products/{{$product->title}}.png")'>
                        </div>
                        <div style="margin-top: 15px; margin-left : 20px">
                            <p style="margin-bottom: 4px ; font-size: 18px">{{ $product->title }}</p>
                            <p>$ {{ $product->price }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <p class="title" style="margin-top: 50px"><span style="color: #0077b6">N</span>EW ARRIVED</p>
        <div class="productsSlider">
            <div class="slider">
                @foreach($products as $product)
                    <a href="{{ route( 'products.show', $product->id ) }}" class="product">
                        <div class="productImg" style='background-image: url("../imgs/products/{{$product->title}}.png")'>
                        </div>
                        <div style="margin-top: 15px; margin-left : 20px">
                            <p style="margin-bottom: 4px ; font-size: 18px">{{ $product->title }}</p>
                            <p>$ {{ $product->price }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="promotions">
            <div class="promotion1" style="background-image: url('../imgs/promotions/promotion 1.jpg')">
                <div class="content">
                    <p>Microsoft Surface 4</p>
                    <button>Shop Now</button>
                </div>
            </div>
            <div class="promotion2" style="background-image: url('../imgs/promotions/promotion 2.webp')">
                <div class="content">
                    <p>Google Pixel 8 & 8 Pro</p>
                    <button>Shop Now</button>
                </div>
            </div>
        </div>

        {{-- <div>
            <section class='slider2'>
                <div class="slide2-track">
                    <div class="slide2">
                        <img src='../imgs/companies/hp.png' width="100px"/>
                    </div>
                    <div class="slide2">
                        <img src='../imgs/companies/apple.png' width="100px"/>
                    </div>
                    <div class="slide2">
                        <img src='../imgs/companies/samsung.png' width="100px"/>
                    </div>
                    <div class="slide2">
                        <img src='../imgs/companies/nintendo.png' width="100px"/>
                    </div>
                    <div class="slide2">
                        <img src='../imgs/companies/lenovo.png' width="100px"/>
                    </div>
                    <div class="slide2">
                        <img src='../imgs/companies/sony.png' width="100px"/>
                    </div>
                </div>
            </section>
        </div> --}}
    </body>

    <script>
        $(document).ready(function(){
            $(".slider").slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4
            });
        });
        </script>

</body>
</html>

@endsection