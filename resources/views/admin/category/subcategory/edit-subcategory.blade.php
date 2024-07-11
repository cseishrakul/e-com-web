@extends('admin.layouts.template')
@section('page_title')
    Update Subcategory
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card my-5">
                <div class="card-header">
                    <div class="card-title">Update Subcategory</div>
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
                    <form action="{{ route('updateSubcategory') }}" method="POST">
                        @csrf
                        <input type="hidden" name="subcategory_id" value="{{$subcategory_info->id}}">
                        <div class="form-group">
                            <label for="">Subcategory Name</label>
                            <input type="text" name="subcategory_name" class="form-control" value="{{$subcategory_info->subcategory_name}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update Subcategory" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
