<section class="product_section layout_padding" id="products">
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
                        <a href="{{ route('product_details', $product->id) }}" class="btn btn-outline-primary btn-block mb-2 option1    ">
                            Product Details
                        </a>
                        <form action="{{ route('add_to_cart',$product->id) }}" method="POST" class="d-flex align-items-center justify-content-between">
                            @csrf
                            <div class="input-group" style="width: 120px;">
                                <input type="number" name="quantity" min="1" value="1" class="form-control text-center">
                            </div>
                            <button type="submit" class="btn btn-primary ml-2 option2">
                                <i class="fas fa-cart-plus"></i> Add To Cart
                            </button>
                        </form>
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
