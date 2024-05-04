@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- User Information Section -->
    <div class="bg-white rounded-lg shadow-md mb-8">
        <div class="flex justify-evenly items-center p-6">
            <img class="w-24 h-24 rounded-full mr-6" src="/imgs/Svgs/man.png" alt="User Image">
            <div>
                <h2 class="text-xl font-bold mb-2">User Information</h2>
                <div class="mb-2">
                    <p><span class="font-semibold">Name:</span> {{ $user->name }}</p>
                </div>
                <div class="mb-2">
                    <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
                </div>
                <div>
                    <p><span class="font-semibold">Role:</span> {{ $user->role }}</p>
                </div>
            </div>
            <div>
                <div class="mb-2">
                    <p><span class="font-semibold">Phone:</span> {{ $user->name }}</p>
                </div>
                <div class="mb-2">
                    <p><span class="font-semibold">Address:</span> {{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Table Section -->
    <div class="bg-white rounded-lg shadow-md">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-4">Products in Cart</h2>
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-blue-100">
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="bg-white">
                            <td class="px-4 py-2"><img src="{{ asset('imgs/'.$product['product']->image) }}" class="w-16 h-16 object-cover" alt="{{ $product['product']->title }}"></td>
                            <td class="px-4 py-2">{{ $product['product']->title }}</td>
                            <td class="px-4 py-2">{{ $product['product']->price }}</td>
                            <td class="px-4 py-2">{{ $product['card_item']->quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
