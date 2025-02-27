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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
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
                                        <span class="badge badge-{{ $order->payment_status == 'Paid' ? 'success' : 'danger' }}">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $order->delivery_status == 'Delivered' ? 'success' : 'warning' }}">
                                            {{ ucfirst($order->delivery_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($order->delivery_status == 'Delivered')
                                            <span class="text-success">Delivered</span>
                                        @else
                                            <a href="{{ route('order_delivred',$order->id) }}" onclick="return confirm('Are you sure the order is delivered?')" class="btn btn-info btn-sm">Delivered</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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
