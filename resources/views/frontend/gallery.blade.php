@extends('layouts.frontend.master')

<div class="hero-wrap" style="background-image: url({{ url('assets/images/bg_6.jpg') }});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                        class="mr-2"><a href="index.html">Home</a></span> <span>Gallery</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Galleries</h1>
            </div>
        </div>
    </div>
</div>

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-body">
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
                                            <img src="{{ URL::to('/') }}{{ Illuminate\Support\Facades\Storage::url($allImages[0]->filename) }}"
                                                class="thumbnailImage" alt="{{ $album->album_name }}">
                                            <div class="middle">
                                                <p class="text">+{{ sizeof($allImages)-1 }}</p>
                                            </div>
                                        </div>


                                        <div class="card-body">
                                            <h3 class="card-text">{{ $album->album_name }}</h3>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('albums.view', ['album_id' => $album->id]) }}"><button
                                                            type="button"
                                                            class="btn btn-sm btn-primary me-2">View</button></a>                                                </div>
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
