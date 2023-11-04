@extends('layouts.master')
@section('title', 'Create Department')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add Department</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/about/add-department') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="request_type" value="create">
                <div class="mb-3">
                    <label>Department Name <span class="text-danger fw-bold" >*</span></label>
                    <input type="text" name="department" class="form-control" />
                </div>
               
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Department</button>
                </div>



            </form>
        </div>
    </div>
</div>

@endsection