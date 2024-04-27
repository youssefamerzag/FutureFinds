<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FutureFinds</title>
    <link href="{{ asset('css/dashboard/sideBar.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="dashboard-container">
        <aside class="dashboard-sidebar">
            <nav class="dashboard-nav">
                <img src="{{ asset('imgs/logo/Logo.png')}}" width="200px" style="margin-bottom: 20px">
                <a href="{{ route('dashboard.index') }}" class="dashboard-link">Analytics</a>
                <a href="{{ route('dashboard.users')}}" class="dashboard-link">Users</a>
            </nav>
        </aside>
        <main class="dashboard-content">
            @yield('content')
        </main>
    </div>
</body>
</html>
