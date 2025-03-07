@extends('admin.layout')

@section('title','Admin Panel')

@section('content')

<!-- Sidebar -->
@include('admin.sidebare')

<!-- Header -->
@include('admin.header')

<!-- Main Content -->
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
            <div class="col-md-8">
                <!-- Card Container -->
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Add Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Product Title -->
                            <div class="form-group mb-3">
                                <label for="title" class="font-weight-bold">Product Title</label>
                                <input type="text" id="title" name="title" class="form-control border-dark text-dark bg-white" placeholder="Enter product title" required>
                            </div>

                            <!-- Product Type -->
                            <div class="form-group mb-3">
                                <label for="is_digital" class="font-weight-bold">Product Type</label>
                                <select id="is_digital" name="is_digital" class="form-control border-dark text-dark bg-white" required onchange="toggleFileInput()">
                                    <option value="1">Digital Product</option>
                                    <option value="0">Physical Product</option>
                                </select>
                            </div>

                            <!-- Product Description -->
                            <div class="form-group mb-3">
                                <label for="description" class="font-weight-bold">Description</label>
                                <textarea id="description" name="description" class="form-control border-dark text-dark bg-white" placeholder="Enter product description" rows="4" required></textarea>
                            </div>

                            <!-- Category -->
                            <div class="form-group mb-3">
                                <label for="category_id" class="font-weight-bold">Category</label>
                                <select id="category_id" name="category_id" class="form-control border-dark text-dark bg-white" required>
                                    <option value="" selected>Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Product File Input (For Digital Products) -->
                            <div class="form-group mb-3" id="file_input_group" style="display: none;">
                                <label for="product_file" class="font-weight-bold">Upload Product File</label>
                                <input type="file" id="file_path" name="file_path" class="form-control border-dark text-dark bg-white" accept=".pdf,.zip,.mp3,.mp4,.epub">
                            </div>

                            <!-- Quantity (For Physical Products) -->
                            <div class="form-group mb-3">
                                <label for="quantity" class="font-weight-bold">Quantity</label>
                                <input type="number" id="quantity" name="quantity" class="form-control border-dark text-dark bg-white" placeholder="Enter quantity" required>
                            </div>

                            <!-- Price -->
                            <div class="form-group mb-3">
                                <label for="price" class="font-weight-bold">Price</label>
                                <input type="number" id="price" name="price" class="form-control border-dark text-dark bg-white" placeholder="Enter price" required step="0.01">
                            </div>

                            <!-- Discount Price -->
                            <div class="form-group mb-3">
                                <label for="discount_price" class="font-weight-bold">Discount Price (Optional)</label>
                                <input type="number" id="discount_price" name="discount_price" class="form-control border-dark text-dark bg-white" placeholder="Enter discount price (if applicable)" step="0.01">
                            </div>

                            <!-- Product Image -->
                            <div class="form-group mb-3">
                                <label for="image" class="font-weight-bold">Product Image</label>
                                <input type="file" id="image" name="image" class="form-control border-dark text-dark bg-white-file" accept="image/*" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-lg w-100">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
</div>

@endsection

