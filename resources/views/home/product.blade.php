<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
       @foreach ($products as $product)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Men's Shirt
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="{{ asset('storage/'.$product->image) }}" alt="Product image">
                </div>
                <div class="detail-box">
                   <h5>
                      {{ $product->title }}
                   </h5>
                   <h6>
                      @if($product->discount_price)
                         <span style="text-decoration: line-through; color: red;">
                            {{ $product->price }} $
                         </span>
                         <br>
                         <span style="color: green; font-weight: bold;">
                            {{ $product->discount_price }} $
                         </span>
                      @else
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
       <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-lg">
                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </ul>
        </nav>
    </div>
       </div>

       {{-- <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div> --}}
    </div>
</section>
