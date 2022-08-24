@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <div class="container mt-5">
        <div class="flex justify-content-center">
            <div class="col-4 m-auto">
                <div class="d-flex justify-content-between mb-4">
                    <h3>Create Product</h3>
                    <a class="btn btn-success" href="{{ route('product.index') }}">Products List</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group mt-4">
                                <input type="text" name="name"
                                    class="form-control mt-3  @error('name') border-danger @enderror" placeholder="Product name">
                                @error('name')
                                    <div class="text-danger">
                                        {{ ($message) }}
                                    <div>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <input type="text" name="price"
                                    class="form-control mt-3 @error('price') border-danger @enderror" placeholder="Product price">
                                @error('price')
                                    <div class="text-danger">
                                        {{ ($message) }}
                                    <div>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <input type="file" name="image" multiple class="form-control">
                                @error('image')
                                    <div class="text-danger">
                                        {{ ($message) }}
                                    <div>
                                @enderror
                            </div>
                            <button type="submit" class="mt-3 btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
