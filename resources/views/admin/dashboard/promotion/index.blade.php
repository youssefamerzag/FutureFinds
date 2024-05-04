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
    <p class="text-3xl font-semibold">Promotions</p>
    <div class="flex justify-center">
        <div class="no-underline text-black flex flex-wrap justify-evenly w-10/12 bg-blue-50 py-10 rounded-md shadow-[0_3px_10px_rgb(0,0,0,0.2)]">
            <div class="flex flex-col">
                <div class="flex justify-around">
                    <p class="text-xl font-bold">Promotion 1</p>
                    <p class="text-xl font-bold">Promotion 2</p>
                </div>
            <div class="flex justify-around">
                @foreach($promotions as $promotion)
                <a href='{{ route('dashboard.Editpromotions' , $promotion->id )}}' class='no-underline text-black' >
                    <div class=" bg-blue-200 items-center text-center w-96 p-3 mx-2  rounded-md shadow-[0px_0px_0px_1px_rgba(0,0,0,0.06),0px_1px_1px_-0.5px_rgba(0,0,0,0.06),0px_3px_3px_-1.5px_rgba(0,0,0,0.06),_0px_6px_6px_-3px_rgba(0,0,0,0.06),0px_12px_12px_-6px_rgba(0,0,0,0.06),0px_24px_24px_-12px_rgba(0,0,0,0.06)]  transition ease-in-out hover:bg-blue-400 hover:text-white">
                        <div class="w-full h-60 rounded-md" style="background-image: url('{{ asset($promotion->image) }}'); background-size: cover"></div>
                        <p class=" text-xl mt-3" >{{ $promotion->title }}</p>
                    </div>
                </a>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</body>
</html>

@endsection