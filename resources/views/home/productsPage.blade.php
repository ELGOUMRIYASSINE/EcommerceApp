<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>All Products</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS for Pagination -->
    <style>
        /* Make pagination smaller */
        .pagination {
            font-size: 14px; /* Adjust the size as needed */
        }

        /* Remove "Previous" and "Next" text */
        .page-item .page-link {
            padding: 0.25rem 0.5rem; /* Smaller padding */
        }

        /* Hide "Previous" and "Next" text */
        .page-item:first-child .page-link::before {
            content: "‹"; /* Left arrow */
        }

        .page-item:last-child .page-link::before {
            content: "›"; /* Right arrow */
        }

        .page-item:first-child .page-link span,
        .page-item:last-child .page-link span {
            display: none; /* Hide the text */
        }

        /* Center the pagination */
        .pagination {
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- Include Header -->
        @include('home.header')

        <!-- Main Content -->
        <section class="product_section layout_padding" id="products">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        All <span>Products</span>
                    </h2>
                </div>

                <!-- Product Grid -->
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="box">
                                <div class="option_container">
                                    <div class="options">
                                        <!-- Product Details Button -->
                                        <a href="{{ route('product_details', $product->id) }}" class="btn btn-outline-primary btn-block mb-2 option1">
                                            Product Details
                                        </a>

                                        <!-- Add to Cart Form -->
                                        <form action="{{ route('add_to_cart', $product->id) }}" method="POST" class="d-flex align-items-center justify-content-between">
                                            @csrf
                                            @if($product->is_digital == 1)
                                                <!-- Digital Product (No Quantity) -->
                                                <button type="submit" class="btn btn-primary ml-2 option2">
                                                    <i class="fas fa-cart-plus"></i> Add To Cart
                                                    <input type="hidden" name="quantity" value="1">
                                                </button>
                                            @else
                                                <!-- Physical Product (With Quantity) -->
                                                <div class="input-group" style="width: 120px;">
                                                    <input type="number" name="quantity" min="1" value="1" class="form-control text-center">
                                                </div>
                                                <button type="submit" class="btn btn-primary ml-2 option2">
                                                    <i class="fas fa-cart-plus"></i> Add To Cart
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </div>

                                <!-- Product Image -->
                                <div class="img-box">
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="Product image">
                                </div>

                                <!-- Product Details -->
                                <div class="detail-box">
                                    <h5>
                                        {{ $product->title }}
                                    </h5>
                                    <h6>
                                        @if($product->discount_price)
                                            <!-- Discounted Price -->
                                            <span style="text-decoration: line-through; color: red;">
                                                {{ $product->price }} $
                                            </span>
                                            <br>
                                            <span style="color: green; font-weight: bold;">
                                                {{ $product->discount_price }} $
                                            </span>
                                        @else
                                            <!-- Regular Price -->
                                            <span style="color: black; font-weight: bold;">
                                                {{ $product->price }} $
                                            </span>
                                            <br>
                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Custom Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {!! $products->withQueryString()->onEachSide(1)->links('pagination::bootstrap-4') !!}
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

        <!-- Include Footer -->
        @include('home.footer')

        <!-- Copyright Section -->
        <div class="cpy_ text-center mt-3">
            <p>© 2025 All Rights Reserved</p>
        </div>
    </div>

    <!-- jQuery and Bootstrap Scripts -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
</body>
</html>
