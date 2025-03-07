@extends('admin.layout')
@section('title','Orders Management')

@section('content')

<!-- Sidebar -->
@include('admin.sidebare')

<!-- Header -->
@include('admin.header')

<!-- Main Panel -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <h1 class="text-center my-4" style="font-size: 2.2rem;">Orders List</h1>
                <form action="{{ route('search_order') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" style="color:black;" name="search" class="form-control" placeholder="Search by Name, Email, Phone, or Product" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Delivered</th>
                                <th>PDF</th>
                                <th>Send Email</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr    data-id="{{ $order->id }}" ondblclick="redirectToOrder(this)" style="cursor: pointer;" >
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->product_title }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>${{ number_format($order->price, 2) }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$order->image) }}" alt="Product Image" width="50" class="img-thumbnail">
                                    </td>

                                    <td>
                                        <span class="badge badge-pill
                                            {{ $order->payment_status == 'Paid' ? 'badge-success' : 'badge-danger' }}"
                                            style="font-size: 0.9rem; padding: 6px 10px; border: 1px solid {{ $order->payment_status == 'Paid' ? '#28a745' : '#dc3545' }}; background-color: {{ $order->payment_status == 'Paid' ? '#e9f8ed' : '#fdecea' }}; color: {{ $order->payment_status == 'Paid' ? '#155724' : '#721c24' }};">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge badge-pill
                                            {{ $order->delivery_status == 'Delivered' ? 'badge-success' : 'badge-warning' }}"
                                            style="font-size: 0.9rem; padding: 6px 10px; border: 1px solid {{ $order->delivery_status == 'Delivered' ? '#28a745' : '#ffc107' }}; background-color: {{ $order->delivery_status == 'Delivered' ? '#e9f8ed' : '#fff8e1' }}; color: {{ $order->delivery_status == 'Delivered' ? '#155724' : '#856404' }};">
                                            {{ ucfirst($order->delivery_status) }}
                                        </span>
                                    </td>

                                    <td>
                                        @if ($order->delivery_status == 'Delivered')
                                            <span class="text-success font-weight-bold">✔ Delivered</span>
                                        @else
                                            <a href="{{ route('order_delivred',$order->id) }}"
                                               onclick="return confirm('Are you sure the order is delivered?')"
                                               class="btn btn-outline-info btn-sm">
                                               Mark as Delivered
                                            </a>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('print_order_pdf',$order->id) }}" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-file-pdf"></i> Print
                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{ route('send_email',$order->id) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-envelope"></i> Email
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="13" class="text-center text-muted py-4">
                                        <h5>No orders found.</h5>
                                        <p>Try adjusting your search or check back later.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                {{-- <div class="d-flex justify-content-center mt-3">
                    {{ $orders->links() }}
                </div> --}}
            </div>
        </div>
            </div>
        </div>


@endsection
