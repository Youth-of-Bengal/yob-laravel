@extends('layouts.frontend.master')


<div class="hero-wrap" style="background-image: url({{url('assets/images/bg_5.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Home</a></span>/ <span>Contact</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Contact Us</h1>
        </div>
      </div>
    </div>
  </div>


  <section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="col-md-12 mb-4">
          <h2 class="h4">Contact Information</h2>
        </div>
        <div class="w-100"></div>
        <div class="col-md-3">
          <p><span>Address:</span> {{$contact[0]->address}}</p>
        </div>
        <div class="col-md-3">
          <p><span>Phone:</span> <a href="tel:91{{$contact[0]->phone_no}}">+91 {{$contact[0]->phone_no}}</a></p>
        </div>
        <div class="col-md-3">
          <p><span>Email:</span> <a href="mailto:{{$contact[0]->email}}">{{$contact[0]->email}}</a></p>
        </div>
        <div class="col-md-3">
          <p><span>Website</span> <a href="/">www.youthofbengal.org</a></p>
        </div>
      </div>
      
      <div class="row block-9"  id="user_contact">
        <div class="col-md-6 pr-md-5">
            <h4 class="mb-4">Do you have any questions?</h4>

            @if ($errors->any())
            <div class="alert alert-danger" id="alertMessage">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

          <form action="{{ url('/contact/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Your Name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Your Email">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" name="phone_no" placeholder="Phone.No">
            </div>
            <div class="form-group">
              <textarea type="text" cols="30" rows="7" class="form-control" name="message" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        
        </div>

        <div class="col-md-6" id="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3661.436149607599!2d88.36311330979704!3d23.408606878817007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f91dde50a73607%3A0xa282b19af9a2415d!2sInstitute%20of%20Geography%20learning!5e0!3m2!1sen!2sin!4v1699150813913!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>

  @section('scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const alertMessage = document.getElementById('alertMessage');
            setTimeout(function() {
                alertMessage.style.display = 'none';
            }, 7000); // 5000 milliseconds = 5 seconds
        });
        
    </script>
@endsection

