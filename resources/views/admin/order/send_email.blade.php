@extends('admin.layout')
@section('title','Orders Management')

@section('content')

<!-- Sidebar -->
@include('admin.sidebare')

<!-- Header -->
@include('admin.header')

<!-- Main Panel -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg" style="width: 100%; max-width: 600px;">
        <div class="card-header text-center">
            <h4 class="mb-0">Send Email To {{ $order->email }}</h4>
        </div>
        <div class="card-body">
            <!-- Add a success message when email is sent successfully -->
            @if(session()->has('message'))
                <div class="alert alert-success" id="success-message" style="display: none;">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Form to collect email data -->
            <form action="{{ route('send_user_email',$order->id) }}" method="post" id="email-form">
                @csrf
                <div class="form-group">
                    <label for="greeting">Greeting:</label>
                    <input type="text" id="greeting" name="greeting" class="form-control text-dark bg-white" placeholder="e.g. Hello [Name]," required>
                </div>

                <div class="form-group">
                    <label for="first_line">First Line:</label>
                    <input type="text" id="first_line" name="first_line" class="form-control text-dark bg-white" placeholder="e.g. I hope this message finds you well." required>
                </div>

                <div class="form-group">
                    <label for="body">Email Body:</label>
                    <textarea id="body" name="body" class="form-control text-dark bg-white" rows="6" placeholder="Enter the body of the email" required></textarea>
                </div>

                <div class="form-group">
                    <label for="button_text">Button Text:</label>
                    <input type="text" id="button_text" name="button_text" class="form-control text-dark bg-white" placeholder="e.g. Click Here" required>
                </div>

                <div class="form-group">
                    <label for="url">Button URL:</label>
                    <input type="url" id="url" name="url" class="form-control text-dark bg-white" placeholder="e.g. https://example.com" required>
                </div>

                <div class="form-group">
                    <label for="last_line">Last Line:</label>
                    <input type="text" id="last_line" name="last_line" class="form-control text-dark bg-white" placeholder="e.g. Best regards, [Your Name]" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Send Email</button>
            </form>
        </div>
    </div>
</div>

@endsection
