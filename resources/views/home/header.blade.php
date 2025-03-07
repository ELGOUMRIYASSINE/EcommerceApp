<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{ url('/') }}"><img width="250" src="{{ asset('images/logo.png') }}" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="about.html">About</a></li>
                              <li><a href="testimonial.html">Testimonial</a></li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/#products">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="blog_list.html">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('show_cart') }}" style="position: relative; display: inline-block;">
                                @if($cartNumber > 0)
                                    <span class="badge badge-pill badge-danger"
                                          style="position: absolute; top: 0; left: -3px; font-size: 0.8em; background-color: red;">
                                        {{ $cartNumber }}
                                    </span>
                                @endif
                                <i class="fas fa-cart-plus"
                                   style="font-size: 1.5em;
                                          color: {{ $cartNumber > 0 ? 'green' : 'black' }};">
                                </i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('my_orders') }}">Orders</a>
                         </li>
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>
                        @if (Route::has('login'))
                            @auth

                            <li class="nav-item" >

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a> <!-- Profile link -->
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                            </li>

                            @else

                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                             </li>
                            <li class="nav-item">
                                <a class="btn btn-success" id="registercss" href="{{ route('register') }}">Register</a>
                             </li>


                            @endauth

                        @endif


                     </ul>
                  </div>
               </nav>
            </div>
</header>
