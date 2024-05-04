@extends('layouts.dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['public/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])

    <title>Users</title>
</head>
<body>
    
</body>
</html>

<p class="text-3xl font-semibold">Users</p>
<div >
    <table class=" w-full text-center rounded shadow-[0px_2px_3px_-1px_rgba(0,0,0,0.1),0px_1px_0px_0px_rgba(25,28,33,0.02),0px_0px_0px_1px_rgba(25,28,33,0.08)]">
        <thead>
            <tr class=" text-white bg-blue-400">
                <th class=" py-3 rounded-tl-md">Name</th>
                <th class=" py-3">Email</th>
                <th class=" py-3">Joined</th>
                <th class=" py-3"></th>
                <th class=" py-3 rounded-tr-md"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user) 
                @if($user->role != 'admin')
                    <tr class=" transition ease-in hover:shadow-[rgba(17,_17,_26,_0.1)_0px_0px_14px] hover:bg-blue-100">
                        <td class="py-3">{{ $user->name }}</td>
                        <td class="py-3">{{ $user->email }}</td>
                        <td class="py-3">{{ $user->created_at->diffForHumans() }}</td>
                        <td class="py-3"><button class="bg-blue-500 py-1 px-2.5 rounded-sm"><a href="{{ route('dashboard.usersDetails' , $user->id ) }}" style="color: white; text-decoration: none">Details</a></button></td>
                        <td class="py-3">
                            <form id="deleteForm" action="{{ route('dashboard.userDestroy', $user->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <img type='submit' onclick="submitForm()" width="35" height="35" src="https://img.icons8.com/color/48/delete-forever.png" alt="delete-forever"/>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function submitForm() {
        document.getElementById("deleteForm").submit();
    }
</script>
@endsection
