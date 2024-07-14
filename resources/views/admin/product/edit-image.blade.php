@extends('admin.layouts.template')
@section('page_title')
    Add Product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Image</div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('updateImage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$product_img->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset($product_img->product_image) }}" alt=""
                                    style="width: 250px;height:250px">
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Product Image</label>
                                    <input type="file" class="form-control" name="product_image"
                                        placeholder="Product Image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update Image" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
