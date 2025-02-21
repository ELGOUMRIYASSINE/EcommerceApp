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
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif




                @if(isset($category_to_edit))

                    <!-- Centered Title -->
                    <h1 class="text-center mb-4" style="font-size: 2.2rem;">Update Category</h1>

                    <!-- Form for Adding Category -->
                    <form action="{{ route('admin.category.update',$category_to_edit->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" id="category_name" value="{{ old('category_name',$category_to_edit->category_name) }}" style="color:black;" name="category_name" placeholder="Enter category name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.category') }}" class="btn btn-danger" >Cancel</a>
                    </form>


                @else

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

                 @endif


                <!-- Display Categories Table -->
                <h2 class="text-center my-4">Categories List</h2>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($categories))
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key+1 }} </td>
                                    <td >{{ $category->category_name }}</td>
                                    <td>
                                        <a  href="{{ route('admin.category.edit',$category->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>

            </div>
        </div>
    </div>
</div>


@endsection
