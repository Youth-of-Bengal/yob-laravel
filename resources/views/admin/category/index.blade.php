@extends('layouts.master')
@section('title', 'Category')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Category
                <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success" id="alertMessage">{{ session('message') }}</div>

            <script type="text/javascript">
                // Wait for the document to be ready
                document.addEventListener("DOMContentLoaded", function() {
                    // Get the alert element by its ID
                    const alertMessage = document.getElementById('alertMessage');

                    // Set a timeout to hide the alert after 5 seconds (adjust the time as needed)
                    setTimeout(function() {
                        alertMessage.style.display = 'none';
                    }, 1500); // 5000 milliseconds = 5 seconds
                });
            </script>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <img src="{{ URL::to('/')}}/uploads/category/{{$item->image }}" width="50px" height="50px" alt="{{ $item->name }}">
                        </td>
                        <td>{{ $item->status == '1' ? 'Hidden': 'Shown' }}</td>
                        <td>
                            <a href="{{ url('admin/edit-category/'.$item->id) }}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('admin/delete-category/'.$item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</div>

@endsection