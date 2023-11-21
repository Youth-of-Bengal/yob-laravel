@extends('layouts.frontend.master')

<div class="hero-wrap" style="background-image: url({{ url('assets/images/bg_5.jpg') }});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                        class="mr-2"><a href="/">Home</a></span>/ <span>About</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About Us</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex ftco-animate">
                <div class="img img-about align-self-stretch"
                    style="background-image: url({{ URL::to('/') }}{{ Illuminate\Support\Facades\Storage::url($description[0]->image) }}); width: 100%;">
                </div>
            </div>
            <div class="col-md-6 pl-md-5 ftco-animate">
                {!! $description[0]->description !!}
            </div>
        </div>
    </div>
</section>
<h2 class="text-center text-primary my-5">Team Members</h2>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-3">
    @foreach ($members as $index => $member)
        <div class="col d-flex justify-content-center">
            <div class="">
                <div class="imageContainer d-flex justify-content-center">
                    <img style="width: 250px; height: 250px;object-position: center;
                    object-fit: cover;"
                        src="{{ URL::to('/') }}{{ Illuminate\Support\Facades\Storage::url($member->image) }}"
                        alt="{{ $member->name }}"" class="thumbnailImage">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title text-center">{{ $member->name }}</h5>
                    <h6 class="text-center text-warning">{{ $member->ngo_role }}</h6>
                    <p class="card-text text-left text-center">{!! $member->profession !!}</p>
                    <a target="_blank" href="{{ $member->social_link }}" class="btn btn-warning text-right">More
                        info</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
