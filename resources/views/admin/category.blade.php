@extends('admin.layout')
@section('title','Admin Paenl')

@section('content')

<!-- sidebare-->
@include('admin.sidebare')

<!-- header-->
@include('admin.header')

<!-- body content page -->

<div class="main-panel">
    <div class="content-wrapper">

        <div class="row justify-content-center">
            <div class="col-md-6">

                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <!-- Centered Title -->
                <h1 class="text-center mb-4" style="font-size: 2.2rem;">Add Category</h1>

                <!-- Form for Adding Category -->
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name"  style="color:black;" name="category_name" placeholder="Enter category name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>


    </div>
</div>

@endsection
