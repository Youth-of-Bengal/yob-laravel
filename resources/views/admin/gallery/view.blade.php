@extends('layouts.master')
@section('title', 'Albums')
@section('styles')
    <style>
        .thumbnailImage {
            object-fit: cover;
            object-position: center center;
            width: 250px;
            height: 250px;
        }

        .imageContainer {
            position: relative;
        }
    </style>
@endsection
@section('content')
    <div class="imageContainer mx-3 my-2">
        <div class="d-flex align-items-center justify-content-between mx-3 mb-3">
            <h1 class="text-center">{{ ucwords($album->album_name) }}</h1>
            <div class="btn-group">
                <a href="{{ url('admin/edit-album/' . $album->id) }}"><button type="button"
                        class="btn btn-sm btn-primary me-2">Edit Album</button></a>
                <a href="{{ url('admin/delete-album/' . $album->id) }}"><button type="button"
                        class="btn btn-sm btn-danger me-2">Delete Album</button></a>
                <a href="{{ url('admin/all-album/') }}"><button type="button" class="btn btn-sm btn-outline-secondary">All
                        Albums</button></a>
            </div>
        </div>
        @foreach ($allImages as $index => $image)
            <img src="{{ URL::to('/') }}{{ Illuminate\Support\Facades\Storage::url($image->filename) }}"
                class="thumbnailImage m-2" alt="{{ $album->album_name }}-{{ $index + 1 }}">
        @endforeach
    </div>
@endsection
