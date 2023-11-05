@extends('layouts.frontend.master')

<div class="hero-wrap" style="background-image: url({{ url('assets/images/bg_6.jpg') }});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                    class="mr-2"><a href="/">Home</a></span>/ <span class="mr-2"><a
                        href="/gallery">Gallery</a></span>/ <span>Album Images</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Album Images</h1>
            </div>
        </div>
    </div>
</div>

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-body">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <h2 class="text-primary text-center mb-5">{{$album->album_name}}</h2>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($allImages as $index => $image)
                                <div class="col d-flex justify-content-center">
                                    <img src="{{ Illuminate\Support\Facades\Storage::url($image->filename) }}" alt="{{$album}} image - {{$index}}" width="250px height="250px" style="object-fit: cover;" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
