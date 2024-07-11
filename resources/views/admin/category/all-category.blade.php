@extends('admin.layouts.template')
@section('page_title')
    All Category
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Category</h4>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success"> {{ session()->get('message') }} </div>
                    @endif
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category name</th>
                                    <th>Subcategory</th>
                                    <th>Product</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Category name</th>
                                    <th>Subcategory</th>
                                    <th>Product</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->category_name }}</td>
                                        <td>{{ $item->subcategory_count }}</td>
                                        <td>{{ $item->product_count }}</td>
                                        <td>
                                            <a href="{{ route('editCategory', $item->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('deleteCategory', $item->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
