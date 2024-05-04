@extends('layouts.dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['public/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])

    <title>Promotions</title>
</head>
<body>
    <p class="text-3xl font-semibold">Edit Promotions</p>
<div class="flex justify-center ">
    <form action="{{ route('dashboard.Updatepromotions' , $promotion->id )}}" method="post" enctype="multipart/form-data" class="flex justify-center bg-blue-100 w-1/2 p-4 rounded-md shadow-[0_3px_10px_rgb(0,0,0,0.2)]">
        @csrf
        @method('put')
        <div class="w-full">
            <div class="my-1">
                <p class="text-xl font-bold">Title</p>
                <input class="w-full py-1.5 pl-1 rounded-sm" type="text" name="title" placeholder="iPhone 13 Pro..." value="{{ old('title' , $promotion->title)}}">
            </div>
            <div class="w-full mt-3">
                <p class="text-xl font-bold">Banner</p>
                <div class="flex items-center justify-center w-full flex-col">
                    <label for="dropzone-file" style="background-image: url('{{ asset($promotion->image) }}'); background-size: cover;" class="brightness-70 flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center py-3 px-4 rounded-md backdrop-brightness-75">
                            <svg class="w-8 h-8 mb-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-base text-white font-semibold">Click to upload or drag and drop</p>
                            <p class="text-xs text-white">SVG, PNG, JPG or GIF</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" name="image"/>
                    </label>
                    <input class="bg-blue-500 py-2 w-full mt-3 rounded-md text-white transition ease-in-out hover:bg-gray-500" type="submit" value="Update">
                </div>                 
            </div>
        </div>
    </form>
</div>
</body>
</html>

@endsection