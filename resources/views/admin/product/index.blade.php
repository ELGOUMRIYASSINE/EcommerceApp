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
                <h1 class="text-center my-4" style="font-size: 2.2rem;">Products List</h1>
                <div class="d-flex justify-content-center">
                    <table class="table table-bordered table-striped text-center" style="width: 70%;">

                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>discount_price</th>
                                <th>Image</th>
                                <th>Product File</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($products))
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" >{{ $product->title }}</td>
                                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $product->description }}">
                                            {{ $product->description }}
                                        </td>
                                        <td>{{ $product->category->category_name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price }} $</td>
                                        <td>{{ $product->discount_price }} $</td>
                                        <td><img src="{{ asset('storage/'.$product->image) }}" alt="" width="50"></td>
                                        <td>
                                            @if($product->file_path)
                                                <a href="{{ asset('storage/'.$product->file_path) }}" target="_blank">View File</a>
                                            @else
                                                No File
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('product.show',$product->id) }}" class="btn btn-info btn-sm">Show</a>
                                            <a href="{{ route('product.edit',$product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('product.delete',$product->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>


@endsection
