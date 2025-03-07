<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shopping Cart</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="hero_area">
        <!-- Include Header -->
        @include('home.header')

        <div class="container my-5">
            <h2 class="text-center mb-4">🛒 Your Shopping Cart</h2>

            @if(isset($carts) && count($carts) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Product Type</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach($carts as $cart)
                                @php
                                    // get the total price from the table
                                    $totalPrice += $cart['price'] ;
                                    // dd($totalPrice)
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/'.$cart['image']) }}" alt="Product Image" class="img-fluid" style="width: 80px; height: auto;">
                                    </td>
                                    <td>{{ $cart['product_title'] }}</td>
                                    {{-- get the actual price of the product from the product table that comes from controller --}}
                                    @foreach($prices as $price)
                                        @if($price['id'] == $cart->product_id)
                                            @if(isset($price['discount_price']))
                                                <td>${{ number_format($price['discount_price'], 2) }}</td>
                                            @else
                                                <td>${{ number_format($price['price'], 2) }}</td>
                                            @endif
                                        @endif
                                    @endforeach

                                    <td>
                                        @if ($cart->is_digital == 1)
                                            {{ $cart['quantity'] }}
                                        @else
                                            <form action="{{ route('quantity_cart_update',$cart->id) }}" method="POST" class="d-flex justify-content-center">
                                                @csrf
                                                <input type="number" name="quantity" value="{{ $cart['quantity'] }}" min="1" class="form-control text-center" style="width: 60px; margin-right:3px;">
                                                <button type="submit" class="btn btn-success btn-sm ms-2" style="height: 38px;">Update</button>

                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($cart->is_digital == 1)
                                            <span>Digital Product</span>
                                        @else
                                            <span>Phisical Product</span>
                                        @endif
                                    </td>
                                    <td>
                                        ${{ number_format($cart['price'], 2) }}
                                    </td>
                                    <td>
                                        <form action="{{ route('delete_cart',$cart->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="confirm('Are You Sure To Remove This Product')">❌ Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- @if($payment_method == 1) --}}
                <div class="text-center mt-4">
                    <h4 class="fw-bold">Total: ${{ number_format($totalPrice, 2) }}</h4>
                    @if ($digital)
                        <a href="{{ route('stripe',$totalPrice) }}" class="btn btn-success btn-lg mt-2">Pay Using Card</a>
                        @else
                        <a href="{{ route('stripe',$totalPrice) }}" class="btn btn-success btn-lg mt-2">Pay Using Card</a>
                        <a href="{{ route('cash_order') }}" class="btn btn-success btn-lg mt-2">Cash On Deleviry</a>
                    @endif
                </div>
                {{-- @elseif ($payment_method == 2)
                @else --}}
            @else
                @if(session('message') !== null)
                    <div class="alert alert-success text-center d-flex align-items-center justify-content-center" role="alert" style="font-size: 18px; font-weight: 600; padding: 15px; border-radius: 10px;">
                        <i class="fas fa-check-circle me-2" style="font-size: 22px;"></i>
                        <span>Order Placed Successfully! 🎉 {{ session('message') }}</span>
                    </div>

                @else
                    <div class="alert alert-warning text-center">
                        Your cart is empty. 🛍️ <a href="#" class="alert-link">Shop Now</a>
                    </div>
                @endif
            @endif
        </div>

        <!-- Include Footer -->
        @include('home.footer')

        <div class="cpy_ text-center mt-3">
            <p>© 2025 All Rights Reserved</p>
        </div>

        <!-- jQuery and Bootstrap Scripts -->
        <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('home/js/popper.min.js') }}"></script>
        <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    </body>
</html>
