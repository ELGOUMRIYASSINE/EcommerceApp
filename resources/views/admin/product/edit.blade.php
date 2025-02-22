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
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
     @endif
        <div class="row justify-content-center">
            <h1 class="text-center mb-4" style="font-size: 2.2rem;">Edit Product</h1>
        </div>

        <!-- Add Product Form -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Product Title -->
                    <div class="form-group mb-3">
                        <label for="title">Product Title</label>
                        <input type="text" id="title" name="title" value="{{ $product->title }}" class="form-control text-dark" placeholder="Enter product title" required>
                    </div>

                    <!-- Product Description -->
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea id="description" name="description"  class="form-control text-dark" placeholder="Enter product description" rows="4" required>{{  $product->title }}</textarea>
                    </div>

                    <!-- Category -->
                    <div class="form-group mb-3">
                        <label for="category_id">Category</label>
                        <select id="category_id" name="category_id" class="form-control" required>
                            <option value="">Select a category</option>
                            <!-- Assuming you have categories in your database -->
                            @foreach ($categories as $category)
                                <option {{ $category->category_name == $product->category->category_name ? 'selected' :  ''  }} value="{{ $category->id }}">
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="form-group mb-3">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" value="{{  $product->quantity }}" name="quantity" class="form-control text-dark" placeholder="Enter quantity" required>
                    </div>

                    <!-- Price -->
                    <div class="form-group mb-3">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" value="{{  $product->price }}" Quantity class="form-control text-dark" placeholder="Enter price" required>
                    </div>

                    <!-- Discount Price -->
                    <div class="form-group mb-3">
                        <label for="discount_price">Discount Price (Optional)</label>
                        <input type="text" id="discount_price" value="{{  $product->discount_price }}" name="discount_price" class="form-control text-dark" placeholder="Enter discount price (if applicable)">
                    </div>

                    <!-- Product Image -->
                    <div class="form-group mb-3">
                        <label for="image">Currect image</label>
                        <!-- File input without Bootstrap styling -->
                        <img src="{{ asset('storage/'.$product->image) }}" width="100" alt="no image">
                        <input type="text" hidden value="{{  $product->image }}" name="current_image">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Upload New Image</label>
                        <!-- File input without Bootstrap styling -->
                        <input type="file" id="image" name="image"  class="form-control-file" accept="image/*" >
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-block">Update Product</button>
                    <a class="btn btn-danger btn-block" href="{{ route('products.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
