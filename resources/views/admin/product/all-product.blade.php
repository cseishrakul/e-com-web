@extends('admin.layouts.template')
@section('page_title')
    All Product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Product</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if (session()->has('message'))
                            <div class="alert alert-success"> {{ session()->get('message') }} </div>
                        @endif
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <img src="{{ asset($product->product_image) }}" alt=""
                                                style="width: 80px;height:80px;">
                                        </td>
                                        <td> {{ $product->product_name }} </td>
                                        <td>{{ $product->price }} Tk.</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="{{ route('editProduct', $product->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="{{ route('editImage', $product->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="{{ route('deleteProduct', $product->id) }}" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
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
