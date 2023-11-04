@extends('layouts.frontend.master')


<div class="hero-wrap" style="background-image: url({{url('assets/images/bg_1.jpg')}});"
  data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
              href="index.html">Home</a></span> <span>Projects</span></p>
        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Projects</h1>
      </div>
    </div>
  </div>
</div>


<section class="ftco-section">
  <div class="container">
    <div class="row">
      @foreach ($projects as $index => $project)
      <div class="col-md-4 ftco-animate">
        <div class="cause-entry">
          <a href="#" class="img" style="background-image: url({{ URL::to('/')}}{{ Illuminate\Support\Facades\Storage::url($project->image) }});"></a>
          <div class="text p-3 p-md-4">

            {{-- <h3><a href="#">Clean water for the urban area</a></h3> --}}

            <h3><a href="#">{{ $project->name }}</a></h3>

            <span class="donation-time mb-3 d-block">{{ $project->coordinator }}</span>
            <p>{{ $project->description }}</p>
            
            <div class="progress custom-progress-success">
              <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            {{-- <span class="fund-raised d-block"></span> --}}
          </div>
        </div>
      </div>
      @endforeach
    </div>
</section>