@extends('admin.layout')
@section('title', 'Order Details')

@section('content')

<!-- Sidebar -->
@include('admin.sidebare')

<!-- Header -->
@include('admin.header')

<!-- Main Panel -->
<div class="main-panel">
    <div class="content-wrapper d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="row justify-content-center w-100">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mb-0">Order Details</h4>
                            <a href="{{ route('orders') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-arrow-left"></i> Back to Orders
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Customer Information -->
                            <div class="col-md-6 mb-4">
                                <h5 class="mb-3 font-weight-bold text-primary">Customer Information</h5>
                                <p><strong>Name:</strong> {{ $order->name }}</p>
                                <p><strong>Email:</strong> {{ $order->email }}</p>
                                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                                <p><strong>Address:</strong> {{ $order->address }}</p>
                            </div>

                            <!-- Order Information -->
                            <div class="col-md-6 mb-4">
                                <h5 class="mb-3 font-weight-bold text-primary">Order Information</h5>
                                <p><strong>Product:</strong> {{ $order->product_title }}</p>
                                <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
                                <p><strong>Price:</strong> ${{ number_format($order->price, 2) }}</p>
                                <p><strong>Payment Status:</strong>
                                    <span class="badge badge-pill {{ $order->payment_status == 'Paid' ? 'badge-success' : 'badge-danger' }}">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                </p>
                                <p><strong>Delivery Status:</strong>
                                    <span class="badge badge-pill {{ $order->delivery_status == 'Delivered' ? 'badge-success' : 'badge-warning' }}">
                                        {{ ucfirst($order->delivery_status) }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- Product Image -->
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <h5 class="font-weight-bold">Product Image</h5>
                                <img src="{{ asset('storage/'.$order->image) }}" alt="Product Image" class="img-fluid rounded shadow-sm" style="max-width: 250px;">
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer with Buttons -->
                    <div class="card-footer bg-light border-top">
                        <div class="d-flex justify-content-between">
                            <!-- Print PDF Button -->
                            <a href="{{ route('print_order_pdf', $order->id) }}" class="btn btn-danger px-4 py-2">
                                <i class="fas fa-file-pdf"></i> Print PDF
                            </a>

                            <!-- Send Email Button -->
                            <a href="{{ route('send_email',$order->id) }}" class="btn btn-primary px-4 py-2">
                                <i class="fas fa-envelope"></i> Send Email
                            </a>

                            <!-- Mark as Delivered Button -->
                            @if ($order->delivery_status != 'Delivered')
                                <a href="{{ route('order_delivred', $order->id) }}" onclick="return confirm('Are you sure the order is delivered?')" class="btn btn-info px-4 py-2">
                                    <i class="fas fa-check"></i> Mark as Delivered
                                </a>
                            @else
                                <span class="text-success font-weight-bold">✔ Delivered</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
