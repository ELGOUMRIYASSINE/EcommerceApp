<section class="subscribe_section">
    <div class="container-fuild">
       <div class="box">
          <div class="row">
             <div class="col-md-6 offset-md-3">
                <div class="subscribe_form ">
                   <div class="heading_container heading_center">
                      <h3>Subscribe To Get Discount Offers</h3>
                   </div>
                   <i class="fas fa-envelope"></i> Subscribe To Get Exclusive Discounts & Updates
                   <form action="{{ route('subscribe') }}" method="get">
                    @csrf
                      <input type="email" placeholder="Enter your email" name="email">
                      <button>
                      subscribe
                      </button>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
