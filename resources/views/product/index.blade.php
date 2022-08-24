@extends('layouts.app')

@section('title', 'Product List')

@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="d-flex justify-content-between mb-3">
                <h3>Products List</h3>
                <a class="btn btn-primary" href="{{ route('product.create') }}">Create</a>
            </div>
            <div class="col-12">
                @if(session()->has('success'))
                <label class="alert alert-success w-100">{{session('success')}}</label>
                @elseif(session()->has('error'))
                    <label class="alert alert-danger w-100">{{session('error')}}</label>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td><img src="{{ Storage::url($product->image) }}" alt="Product Image" style="height: 150px; width: 150px;">  </td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
