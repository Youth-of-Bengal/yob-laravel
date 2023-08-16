@extends('layouts.master')
@section('title', 'News')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View News
                <a href="{{ url('admin/add-news') }}" class="btn btn-primary btn-sm float-end">Add News</a>
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
                    }, 2500); // 5000 milliseconds = 5 seconds
                });
            </script>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>News Title</th>
                        <th>Cover Image</th>
                        <th>Published Date</th>
                        <th>Status</th>
                        <th>Categories</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <img src="{{ URL::to('/')}}/uploads/news/{{$item->image }}" width="50px" height="50px" alt="{{ $item->name }}">
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->is_draft == false ? 'Draft': 'Published' }}</td>
                        <td>{{ $item->categories }}</td>
                        <td>
                            <a href="{{ url('admin/edit-news/'.$item->id) }}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('admin/delete-news/'.$item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</div>

@endsection