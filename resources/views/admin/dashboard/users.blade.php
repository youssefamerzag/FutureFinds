@extends('layouts.dashboard')

@section('content')
<style>
    /* Table Container */
    .table-container {
        padding: 20px;
    }

    table {
    background-color: #e9edc9;
    }

    /* Dashboard Table */
    .dashboard-table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Table Header */
    .dashboard-table th {
        padding: 8px;
        text-align: left;
        background-color: #2E6CA1;
        color: white;
    }

    /* Table Body */
    .dashboard-table td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    /* Alternate Row Color */
    .dashboard-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<p style="font-size: 27px ; margin-left: 20px">Users :</p>
<div class="table-container">
    <table class="dashboard-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user) 
                @if($user->role != 'admin')
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td><button style="background-color: #2E6CA1;padding: 5px 10px; border-radius: 4px; border : none"><a href="{{ route('dashboard.usersDetails' , $user->id ) }}" style="color: white; text-decoration: none">Details</a></button></td>
                        <td>
                            <form action="{{ route('dashboard.userDestroy', $user->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" style="background-color: red; color: white; padding: 5px 10px; border-radius: 4px; border : none">
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
