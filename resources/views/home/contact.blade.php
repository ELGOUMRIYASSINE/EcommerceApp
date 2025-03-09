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

</head>
<body>
    <div class="hero_area">
        <!-- Include Header -->
        @include('home.header')

        <section class="inner_page_head">
            @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="container_fuild">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <h3>Contact us</h3>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- end inner page section -->
         <!-- why section -->
         <section class="why_section layout_padding">
            <div class="container">

               <div class="row">
                  <div class="col-lg-8 offset-lg-2">
                     <div class="full">
                        <form action="{{ route('userMessage') }}" method="POST">
                            @csrf
                           <fieldset>
                              <input type="text" placeholder="Enter your full name" name="full_name" required />
                              <input type="email" placeholder="Enter your email address" name="email" required />
                              <input type="text" placeholder="Enter subject" name="subject" required />
                              <textarea placeholder="Enter your message" name="message" required></textarea>
                              <input type="submit" value="Submit" />
                           </fieldset>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </section>

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
