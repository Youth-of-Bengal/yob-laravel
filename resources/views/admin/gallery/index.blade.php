@extends('layouts.master')
@section('title', 'Gallery')

@section('styles')
    <style>
        .thumbnailImage {
            object-fit: cover;
            object-position: center center;
            width: 100%;
            height: 200px;
            filter: brightness(50%);
        }

        .imageContainer{
            position: relative;
        }

        .middle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
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
                <h4>All Albums
                    <a href="{{ url('admin/add-album') }}" class="btn btn-primary btn-sm float-end">Add Albums</a>
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

                <div class="album py-5 bg-light">
                    <div class="container">

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($albums as $index => $album)
                                <div class="col">
                                    <div class="card shadow-sm">
                                        @php
                                            $allImages = App\Models\Album::find($album->id)->getImages;
                                        @endphp
                                        <div class="imageContainer">
                                            <img src="{{ URL::to('/') }}{{ Illuminate\Support\Facades\Storage::url($allImages[0]->filename) }}" class="thumbnailImage" alt="{{ $album->album_name }}">
                                            <div class="middle">
                                                <p class="text">+{{ sizeof($allImages) }}</p>
                                            </div>
                                        </div>


                                        <div class="card-body">
                                            <h3 class="card-text">{{ $album->album_name }}</h3>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="{{ url('admin/view-album/' . $album->id) }}"><button
                                                            type="button"
                                                            class="btn btn-sm btn-primary me-2">View</button></a>
                                                    <a href="{{ url('admin/edit-album/' . $album->id) }}"><button
                                                            type="button"
                                                            class="btn btn-sm btn-outline-secondary">Edit</button></a>
                                                </div>
                                                <a href="{{ url('admin/delete-news/' . $album->id) }}"
                                                    class="text-danger"><i class="fa-solid fa-trash-can"></i></a>
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
