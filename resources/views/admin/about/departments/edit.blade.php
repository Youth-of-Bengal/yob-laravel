@extends('layouts.master')
@section('title', 'Edit Department')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Department</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/about/update-department/'.$department->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Department Name <span class="text-danger fw-bold" >*</span></label>
                    <input type="text" name="department" value="{{ $department->department }}" class="form-control" />
                </div>
               
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update Department</button>
                </div>



            </form>
        </div>
    </div>
</div>

@endsection