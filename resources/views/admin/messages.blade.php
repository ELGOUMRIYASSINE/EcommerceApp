@extends('admin.layout')

@section('title', 'Admin Panel')

@section('content')

<!-- Sidebar -->
@include('admin.sidebare')

<!-- Header -->
@include('admin.header')

<!-- Main Content -->
<div class="container mt-5">
    <h2 class="text-center mb-4 mt-5">Messages</h2>

    <!-- Table to show messages -->
    <div class="table-container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Text</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->full_name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->text }}</td>
                        <td>
                            <!-- Button to trigger modal -->
                            <button class="btn btn-info" data-toggle="modal" data-target="#messageModal{{ $message->id }}">
                                Show Message
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for showing message details -->
@foreach($messages as $message)
<div class="modal fade" id="messageModal{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel{{ $message->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel{{ $message->id }}">Message from {{ $message->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Email:</strong> {{ $message->email }}</p>
                <p><strong>Subject:</strong> {{ $message->subject }}</p>
                <p><strong>Message:</strong> {{ $message->text }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
