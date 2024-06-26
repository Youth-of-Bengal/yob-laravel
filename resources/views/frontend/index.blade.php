@extends('layouts.frontend.master')
   
   
   <div class="hero-wrap" style="background-image: url({{url('assets/images/bg_7.jpg')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$homedata['heading']}}</h1>
            <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$homedata['subheading']}}</p>

            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="{{$homedata['video_url']}}" class="btn btn-white btn-outline-white px-4 py-3 popup-vimeo"><span class="icon-play mr-2"></span>Watch Video</a></p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-counter ftco-intro" id="section-counter">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 color-1 align-items-stretch">
              <div class="text">
              	<span>Served Over</span>
                <strong class="number" data-number="{{$homedata['served_number']}}">0</strong>
                <span>{{$homedata['served_description']}}</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 color-2 align-items-stretch">
              <div class="text">
              	<h3 class="mb-4">Donate Money</h3>
              	<p>Make a contribution. Each rupee of your donation goes to the community with extra value added by the work of our volunteers.</p>
              	<p><a href="/donation" class="btn btn-white px-3 py-2 mt-2">Donate Now</a></p>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 color-3 align-items-stretch">
              <div class="text">
              	<h3 class="mb-4">Be a Member</h3>
              	<p>We have a deep passion for the work that we do to improve the efficiency and effectiveness of the nonprofit sector, as well as how donors think about the way they give to it. Contact us to be a member.</p>
              	<p><a href="{{ url('/contact') }}" class="btn btn-white px-3 py-2 mt-2">Be A Member</a></p>
              </div>
            </div>
          </div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 d-flex services p-3 py-4 d-block">
              <div class="icon d-flex mb-3"><span class="flaticon-donation-1"></span></div>
              <div class="media-body pl-4">
                <h3 class="heading">Make Donation</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 d-flex services p-3 py-4 d-block">
              <div class="icon d-flex mb-3"><span class="flaticon-charity"></span></div>
              <div class="media-body pl-4">
                <h3 class="heading">Become A Volunteer</h3>
                <p>A selfless journey, much like the uncontrollable power of Pointing in blind texts.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 d-flex services p-3 py-4 d-block">
              <div class="icon d-flex mb-3"><span class="flaticon-donation"></span></div>
              <div class="media-body pl-4">
                <h3 class="heading">Sponsorship</h3>
                <p>A heartfelt gesture, much like the silent power of text that changes lives.</p>
              </div>
            </div>    
          </div>
        </div>
    	</div>
    </section>

    {{-- Project section --}}
    <section class="ftco-section bg-light">
    	<div class="container-fluid">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-5 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Projects</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="carousel-cause owl-carousel">
              @foreach ($projects as $index => $project)
	    				<div class="item">
	    					<div class="cause-entry">
		    					<a href="#" class="img" style="background-image: url({{ URL::to('/')}}{{ Illuminate\Support\Facades\Storage::url($project->image) }}" class="thumbnailImage" width="50px" height="50px" alt="{{ $project->name }});"></a>
		    					<div class="text p-3 p-md-4">
		    						<h3><a href="#">{{ $project->name }}</a></h3>
		                <div class="progress custom-progress-success">
		                  <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
		                </div>
		    					</div>
		    				</div>
	    				</div>
              @endforeach
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    
    {{-- News section --}}
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Recent from news</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          @foreach ($newses as $index => $news)
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="/news/{{$news->id}}" class="block-20" style="background-image: url({{ URL::to('/')}}{{ Illuminate\Support\Facades\Storage::url($news->image) }}" class="thumbnailImage" width="50px" height="50px" alt="{{ $news->title }});">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="/news/{{$news->id}}"><h4>{{ $news->title }}</h4></a></div>
                </div>
                <h3 class="heading mt-3 text-primary">{{ $news->publish_date }}</h3>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

	{{-- <section class="ftco-section-3 img" style="background-image: url(images/bg_3.jpg);">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex">
    		<div class="col-md-6 d-flex ftco-animate">
    			<div class="img img-2 align-self-stretch" style="background-image: url(images/bg_4.jpg);"></div>
    		</div>
    		<div class="col-md-6 volunteer pl-md-5 ftco-animate">
    			<h3 class="mb-3">Be a volunteer</h3>
    			<form action="#" class="volunter-form">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Email">
            </div>
            <div class="form-group">
              <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-white py-3 px-5">
            </div>
          </form>
    		</div>    			
    		</div>
    	</div>
  </section> --}}

    
  </body>
</html>