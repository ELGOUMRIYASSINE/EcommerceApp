<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product Details</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">

    <link rel="stylesheet" href="path/to/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .product-details {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-title {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .price-box {
            margin-bottom: 20px;
        }

        .text-danger {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .text-muted {
            font-size: 1.2rem;
        }

        .img-box img {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Align Add to Cart Button and Quantity */
        .add-to-cart-form {
            display: flex;
            align-items: center;
            margin-top: -10px; /* Adjust this value as needed */
        }

        .quantity-input {
            width: 70px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
            font-size: 16px;
            height: 36px;
            margin-top: 21px;
            margin-right: 5px;
        }

        .add-to-cart-btn {
            background:#e83d44;
            height: 36px;
            font-size: 16px;
            white-space: nowrap;
        }

        /* Buy Now Button */
        .buy-now-btn {
            background:#e83d44;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            font-size: 14px;
            width: auto;
            display: block;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .buy-now-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- Include Header -->
        @include('home.header')

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box text-center">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="Product image" class="img-fluid">
                    </div>
                </div>

                <div class="col-md-6 product-details">
                    <h2 class="product-title">{{ $product->title }}</h2>
                    <p class="text-muted">Category: {{ $product->category->category_name }}</p>

                    <div class="price-box">
                        @if($product->discount_price)
                            <span class="text-danger">{{ $product->discount_price }} $</span>
                            <span class="text-muted" style="text-decoration: line-through;">{{ $product->price }} $</span>
                        @else
                            <span class="text-dark font-weight-bold" style="font-size: 1.5rem;">{{ $product->price }} $</span>
                        @endif
                    </div>

                    <p>{{ $product->description }}</p>
                    <p class="text-success">Stock: {{ $product->quantity }}</p>

                    <!-- Add to Cart Form -->
                    <form action="{{ route('add_to_cart', $product->id) }}" method="POST" class="add-to-cart-form">
                        @csrf

                            <input type="number" name="quantity" min="1" value="1" class="quantity-input option2">
                            <button type="submit" class="btn btn-primary add-to-cart-btn">
                                <i class="fas fa-cart-plus"></i> Add To Cart
                            </button>

                    </form>

                    <!-- Buy Now Button -->
        
                </div>
            </div>
        </div>
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
