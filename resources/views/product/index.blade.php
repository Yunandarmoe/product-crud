@extends('layouts.app')

@section('title', 'Product List')

@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="d-flex justify-content-between mb-3">
                <h3>Products List</h3>
                <a class="btn btn-primary" href="">Create</a>
            </div>
            <div class="col-12">
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
                        <?php foreach (range(1,5) as $i): ?>
                            <tr>
                                <th><?php echo $i; ?></th>
                                <td>Shirt</td>
                                <td>5000</td>
                                <td>img1</td>
                                <td>
                                    <button type="submit" class="btn btn-success">Edit</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
