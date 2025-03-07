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
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link rel="stylesheet" href="path/to/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style>

    /* Hide the "Showing X to Y of Z results" message */
    .pagination-info {
        display: none;
    }
      </style>


   </head>
   <body>
      <div class="hero_area">
        <!-- header section strats -->

        @include('home.header')
        @if($userEmailVerification == null)
            <div class="alert alert-warning" role="alert" >
                We've sent a verification email to your inbox. Please check your email (including your spam folder) and verify your account to continue.
                {{-- <form action="{{ route('verification.resend') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </form> --}}
                <a href="{{ route('verification.resend') }}">Click here to re-send the verification email.</a>

                @if (session('message'))
                    <p class="mt-2 text-sm text-green-600">{{ session('message') }}</p>
                @endif

                @if (session('error'))
                    <p class="mt-2 text-sm text-red-600">{{ session('error') }}</p>
                @endif
            </div>
        @endif

        <!-- end header section -->

        <!-- slider section -->

        @include('home.slider')

        <!-- end slider section -->

    </div>
    <!-- why section -->

    @include('home.why')

    <!-- end why section -->

    <!-- arrival section -->

    @include('home.arrival')

      <!-- end arrival section -->

      <!-- product section -->

      @include('home.product')

      <!-- end product section -->

      <!-- subscribe section -->

      @include('home.subscribe')

      <!-- end subscribe section -->

      <!-- client section -->

      @include('home.client')

      <!-- end client section -->

      <!-- footer start -->

      @include('home.footer')

      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
