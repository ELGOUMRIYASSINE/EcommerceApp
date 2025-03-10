<footer>
    <div class="container">
       <div class="row">
          <div class="col-md-4">
              <div class="full">
                 <div class="logo_footer">
                   <a href="#"><img width="210" src="{{ asset('images/logo.png') }}" alt="#" /></a>
                 </div>
                 <div class="information_f">
                   {{-- <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p> --}}
                   <p><strong>TELEPHONE:</strong> +212 675735586</p>
                   <p><strong>EMAIL:</strong> proowork15@gmail.com</p>
                 </div>
              </div>
          </div>
          <div class="col-md-8">
             <div class="row">
             <div class="col-md-7">
                <div class="row">
                   <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Menu</h3>
                   <ul>
                      <li><a href="/">Home</a></li>
                      <li><a href="/#about">About</a></li>
                      <li><a href="/#client">Testimonial</a></li>
                      <li><a href="#">Blog</a></li>
                      <li><a href="{{ url('/contact') }}">Contact</a></li>
                   </ul>
                </div>
             </div>
             <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Account</h3>
                   <ul>
                      <li><a href="{{ route('profile.show') }}">Account</a></li>
                      <li><a href="{{ url('/contact') }}">Contact</a></li>
                      <li><a href="{{ route('login') }}">Login</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                   </ul>
                </div>
             </div>
                </div>
             </div>
             <div class="col-md-5">
                <div class="widget_menu">
                   <h3>Newsletter</h3>
                   <div class="information_f">
                     <p>Subscribe by our newsletter and get update protidin.</p>
                   </div>
                   <div class="form_sub">
                      <form action="{{ route('subscribe') }}"  method="get">
                         <fieldset>
                            <div class="field">
                               <input type="email" placeholder="Enter Your Mail" name="email" />
                               <input type="submit" value="Subscribe" />
                            </div>
                         </fieldset>
                      </form>
                   </div>
                </div>
             </div>
             </div>
          </div>
       </div>
    </div>
 </footer>
