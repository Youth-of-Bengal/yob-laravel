@extends('layouts.frontend.master')

<div class="hero-wrap" style="background-image: url({{url('assets/images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
              href="/">Home</a></span>/ <span>News</span></p>
        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">News</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row d-flex">
      @foreach ($news as $index => $news)
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="{{ url('news/' . $news->id) }}" class="block-20" style="background-image: url({{ URL::to('/')}}{{ Illuminate\Support\Facades\Storage::url($news->image) }});">
          </a>
          <div class="text p-4 d-block">
            <div class="meta mb-1">
              <div><a href="{{ url('news/' . $news->id) }}">{{ $news->publish_date }}</a></div>
            </div>
            <h3 class="heading mt-1"><a href="{{ url('news/' . $news->id) }}">{{ $news->title }}</a></h3>
            {{-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> --}}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>