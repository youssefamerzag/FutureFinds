<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FutureFinds</title>
    <link href="{{ asset('css/layoutes.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    FutureFinds
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                    </ul>
                    <form action="{{ route('products.search')}}" method="get">
                        <input style="padding: 5px 80px 5px 20px;
                        border-bottom-left-radius: 20px ;
                        border-top-left-radius: 20px ;
                        border : 1px solid;" type="search" placeholder="Search..." name="search">
                        <input style="border: 1px solid black ;
                        padding: 5px;
                        padding-right: 10px;
                        padding-left: 10px;
                        border-top-right-radius: 20px;
                        border-bottom-right-radius: 20px;
                        background-color: #0077b6;
                        color: white" type="submit" value="Search"></input>
                    </form>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('card.items') }}">Card</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <div class="footer">
            <div class="footer-categories">
                <h3>Categories</h3>
                <ul>
                        <li><a href='/category/1'>Phones</a></li>
                        <li><a href='/category/2'>Tablets</a></li>
                        <li><a href='/category/3'>Laptops</a></li>
                        <li><a href='/category/4'>Consoles</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <form>
                    <textarea placeholder="Your message"></textarea>
                    <input type="email" placeholder="Your Email">
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
        <div style="text-align: center;background-color: #333;color :white; padding-bottom: 20px">
            Made By <a href="https://www.linkedin.com/in/youssefamerzag/" 
            style="text-decoration: none;
            align-items: center;

            ">Youssef Amerzag</a>
        </div>
    </div>
</body>
</html>
