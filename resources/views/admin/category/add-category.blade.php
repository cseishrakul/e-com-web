@extends('admin.layouts.template')
@section('page_title')
    Add Category
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card my-5">
                <div class="card-header">
                    <div class="card-title">Add Category</div>
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
                    <form action="{{ route('storeCategory') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Category" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
