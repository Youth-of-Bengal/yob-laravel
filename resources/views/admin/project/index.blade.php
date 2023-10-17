@extends('layouts.master')
@section('title', 'Project')

@section('styles')
    <style>
        .thumbnailImage {
            object-fit: cover;
            object-position: center center;
            width: 100%;
            height: 200px;
        }

        .imageContainer{
            position: relative;
        }

        .text {
            color: white;
            font-size: 4rem;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>All Projects
                <a href="{{ url('admin/add-project') }}" class="btn btn-primary btn-sm float-end">Add Project</a>
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

            <div class="project py-5 bg-light">
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ($projects as $index => $project)
                            <div class="col">
                                <div class="card shadow-sm">
                                    <div class="imageContainer">
                                        <img src="{{ URL::to('/')}}{{ Illuminate\Support\Facades\Storage::url($project->image) }}" class="thumbnailImage" width="50px" height="50px" alt="{{ $project->name }}">
                                    </div>


                                    <div class="card-body">
                                        <h3 class="card-text">{{ $project->name }}</h3>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{ url('admin/edit-project/' . $project->id) }}"><button
                                                        type="button"
                                                        class="btn btn-sm btn-outline-secondary">Edit</button></a>
                                            </div>
                                            <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $project->id }}"
                                                class="btn text-danger"><i class="fa-solid fa-trash-can"></i></a>
                                            <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $project->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $project->id }}">Confirm
                                                                Deletion</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this project?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <a href="{{ url('admin/delete-project/' . $project->id) }}"
                                                                class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>

@endsection