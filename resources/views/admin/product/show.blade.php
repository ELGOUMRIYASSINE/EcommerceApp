
@extends('admin.layout')
@section('title','Admin Panel')

@section('content')

<!-- sidebare-->
@include('admin.sidebare')

<!-- header-->
@include('admin.header')

<!-- body content page -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container mt-5 d-flex justify-content-center">
            <div class="card p-3" style="max-width: 700px;">
                <div class="row g-0">
                    <!-- Product Image (Left) -->
                    <div class="col-md-4 d-flex align-items-center">
                        <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid rounded-start" alt="Product Image">
                    </div>

                    <!-- Product Details (Right) -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ $product->title }}</h4>
                            <p class="card-text text-muted">{{ $product->description }}</p>

                            <h5 class="text-success">${{ $product->price }}</h5>
                            @if ($product->discount_price)
                                <h6 class="text-danger">Discount: ${{ $product->discount_price }}</h6>
                            @endif

                            <p class="text-secondary"><strong>Category:</strong> {{ $product->category->category_name }}</p>
                            <p class="text-secondary"><strong>Quantity:</strong> {{ $product->quantity }}</p>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('product.edit',$product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('product.delete',$product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection
