@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="header mb-8">
        <h1 class="text-3xl font-bold">Orders</h1>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full table-auto rounded-lg shadow-md bg-white">
            <thead>
                <tr class="bg-blue-400 text-white">
                    <th class="px-4 py-3 rounded-tl-md">ID</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Created at</th>
                    <th class="px-4 py-3">Customer</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3 rounded-tr-md">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr class="transition ease-in hover:shadow-md hover:bg-blue-100">
                    <td class="px-4 py-3">{{ $order['order']->id }}</td>
                    <td class="px-4 py-3"><span class="bg-slate-400 text-white px-3 py-1 rounded-sm">{{ $order['order']->status }}</span></td>
                    <td class="px-4 py-3">{{ $order['order']->created_at }}</td>
                    <td class="px-4 py-3">{{ $order['user']->name }}</td>
                    <td class="px-4 py-3">{{ $order['orderTotal'] }}</td>
                    <td class="px-4 py-3"><a href="#" class="text-blue-500 hover:underline">Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
