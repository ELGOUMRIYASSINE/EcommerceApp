<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Orders</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="hero_area">
        <!-- Include Header -->
        @include('home.header')

        <!-- Orders Section -->
        @if ($orders->count() > 0)
        <div class="container mt-5">
            <h2 class="text-center mb-4">Your Orders</h2>
            <div class="table-responsive">
                @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $order->image) }}" alt="{{ $order->product_title }}" width="100">
                                </td>
                                <td>{{ $order->product_title }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>${{ number_format($order->price, 2) }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->delivery_status }}</td>
                                <td>
                                    @if ($order->delivery_status == 'Delivered')
                                        <span class="badge bg-success text-white">Finished</span>
                                    @elseif($order->delivery_status == 'Processing')
                                        <form action="{{ route('cancel_order',$order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are You Sure You Want To Cancel The Order ?')" class="btn btn-danger btn-sm">Cancel</button>
                                        </form>
                                    @elseif($order->delivery_status == 'You Canceled The Order')
                                        <span class="badge bg-danger text-white">Cnceled</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="container mt-5">
            <h2 class="text-center mb-4">Your Orders</h2>
            <div class="alert alert-info text-center" role="alert">
            You do not have any orders yet.
            </div>
        </div>
        @endif

        <!-- Include Footer -->
        @include('home.footer')

        <div class="cpy_ text-center mt-3">
            <p>© 2025 All Rights Reserved</p>
        </div>

        <!-- jQuery and Bootstrap Scripts -->
        <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('home/js/popper.min.js') }}"></script>
        <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    </div>
</body>
</html>
