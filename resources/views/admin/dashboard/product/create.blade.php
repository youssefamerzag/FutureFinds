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
    <link href="{{ asset('css/dashboard/createProduct.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<div class="formContainer">
    <form class="form" action="{{ route('dashboard.storeProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <img src="{{ asset('imgs/Svgs/Create Product.svg') }}" height="200px">
        <span>Product Title</span>
        <input class="formElement" type="text" name="product_title" placeholder="Product Title" required>
        <span>Product Description</span>
        <textarea class="formElement" type="text" name="product_description" placeholder="Product Description" required></textarea>
        <span>Product Price</span>
        <input class="formElement" type="text" name="product_price" placeholder="Product Price" required>
        <span>Product Image</span>
        <label for="product_image" class="fileLabel">
            <img width="50" height="50" src="https://img.icons8.com/external-inkubators-blue-inkubators/50/external-upload-arrow-lite-inkubators-blue-inkubators.png" alt="external-upload-arrow-lite-inkubators-blue-inkubators"/>
            <span id="file-name">Choose Product Image</span>
        </label>
        <input class="fileInput" type="file" name="product_image" id="product_image" onchange="updateFileName(this)" required>
        <span>Product Category</span>
        <select class="formElement"  name="category" required>
            <option value="1">Phones</option>
            <option value="2">Tables</option>
            <option value="3">Laptops</option>
            <option value="4">Consoles</option>
        </select>
        <input class="submitButton" type="submit" value="Create">
    </form>
</div>

<script>
    function updateFileName(input) {
        const fileName = input.files[0].name;
        document.getElementById('file-name').textContent = fileName;
    }
</script>

@endsection