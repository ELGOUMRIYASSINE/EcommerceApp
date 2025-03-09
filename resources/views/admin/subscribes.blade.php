@extends('admin.layout')

@section('title', 'Admin Panel')

@section('content')

<!-- Sidebar -->
@include('admin.sidebare')

<!-- Header -->
@include('admin.header')

<!-- Main Content -->
<div class="container mt-5">
    <h2 class="text-center mb-4 mt-5">User Subscriptions</h2>

    <!-- Table to show subscribed emails -->
    <div class="table-container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subscribed Emails</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscribes as $subscribe)
                    <tr>
                        <td>{{ $subscribe->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection
