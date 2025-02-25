<!DOCTYPE html>
<html>
   <head>

      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
      <style>

</style>

      </style>
   </head>
   <body>
      <div class="hero_area">
        <!-- header section strats -->

        @include('home.header')

        <!-- end header section -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="Product image" class="img-fluid" style="max-width: 350px; margin-bottom: -10px;">
                     </div>


                </div>
                <div class="col-md-6">
                    <h2 class="product-title">{{ $product->title }}</h2>
                    <p class="text-muted">Category: {{ $product->category->category_name }}</p>
                    <div class="price-box">
                        @if($product->discount_price)
                            <span class="text-danger" style="font-size: 1.5rem; font-weight: bold;">
                                {{ $product->discount_price }} $
                            </span>
                            <span class="text-muted" style="text-decoration: line-through;">
                                {{ $product->price }} $
                            </span>
                        @else
                            <span class="text-dark" style="font-size: 1.5rem; font-weight: bold;">
                                {{ $product->price }} $
                            </span>
                        @endif
                    </div>
                    <p class="mt-3">{{ $product->description }}</p>
                    <p class="text-success">Stock: {{ $product->quantity }}</p>
                    <button class="btn btn-primary btn-lg">Add to Cart</button>
                    <button class="btn btn-outline-secondary btn-lg">Buy Now</button>
                </div>
            </div>
        </div>


    </div>


      @include('home.footer')

      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
    <!-- jQery -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('home/js/custom.js') }}"></script>
   </body>
</html>
