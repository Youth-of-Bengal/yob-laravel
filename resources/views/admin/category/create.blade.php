@extends('layouts.master')
@section('title', 'Category')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add Category</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="request_type" value="create">
                <div class="mb-3">
                    <label>Category Name <span class="text-danger fw-bold" >*</span></label>
                    <input type="text" name="name" class="form-control" />
                </div>
               
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>



            </form>
        </div>
    </div>
</div>

@endsection