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
    @vite(['public/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
</head>

<div>
    <div class="header">
        <p>Orders</p>
    </div>
</div>
<div>
    <table class=" w-full text-center rounded shadow-[0px_2px_3px_-1px_rgba(0,0,0,0.1),0px_1px_0px_0px_rgba(25,28,33,0.02),0px_0px_0px_1px_rgba(25,28,33,0.08)]">
        <tr class=" text-white bg-blue-400">
            <th class=" py-3 rounded-tl-md">ID</th>
            <th class=" py-3">Status</th>
            <th class=" py-3 w-40">Created at</th>
            <th class=" py-3">Customer</th>
            <th class=" py-3">Total</th>
            <th class=" py-3 rounded-tr-md">Actions</th>
        </tr>
        @foreach ($orders as $order)
        <tr class=" transition ease-in hover:shadow-[rgba(17,_17,_26,_0.1)_0px_0px_14px] hover:bg-blue-100">
            <td class="py-3">{{ $order['order']->id }}</td>
            <td class="py-3"><span class="bg-slate-400 text-white px-3 py-1 rounded-sm">{{ $order['order']->status }}</span></td>
            <td class="py-3">{{ $order['order']->created_at }}</td>
            <td class="py-3">{{ $order['user']->name}}</td>
            <td class="py-3">{{ $order['orderTotal']}}</td>
            <td class="py-3">details</td>
        </tr>        
        @endforeach
    </table>
</div>

@endsection