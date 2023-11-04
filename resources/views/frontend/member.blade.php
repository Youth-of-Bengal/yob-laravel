@extends('layouts.frontend.master')
@section('title', 'Member')

<div class="hero-wrap" style="background-image: url({{url('assets/images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
                href="index.html">Home</a></span> <span>Member</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Member</h1>
        </div>
      </div>
    </div>
  </div>

@section('content')
    <div class="container-fluid px-4 mb-5">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Details</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form id="postForm" action="{{ url('member/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_type" value="create">
                    <div class="mb-3">
                        <label>Name <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="name" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Email <span class="text-danger fw-bold">*</span></label>
                        <input type="email" name="email" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Phone.No <span class="text-danger fw-bold">*</span></label>
                        <input type="number" name="phone_no" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Address <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="address" class="form-control" />
                    </div>

                    <div class="d-flex">
                        <div class="mb-3 col-6">
                            <label for="blood_gr">Blood group <span class="text-danger fw-bold">*</span></label>
                            <select id="blood_gr" name="blood_gr" class="form-control">
                                <option value="A_positive">A+</option>
                                <option value="A_negative">A-</option>
                                <option value="B_positive">B+</option>
                                <option value="B_negative">B-</option>
                                <option value="AB_positive">B+</option>
                                <option value="AB_negative">AB-</option>
                                <option value="O_positive">O+</option>
                                <option value="O_negative">O-</option>
                              </select>
                        </div>
    
                        <div class="mb-3 col-6">
                            <label>Date of Birth <span class="text-danger fw-bold">*</span></label>
                            <input type="date" name="dob" class="form-control"/>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="mb-3 col-6">
                            <label>Height</label>
                            <input type="number" name="height" class="form-control"/>
                        </div>
    
                        <div class="mb-3 col-6">
                            <label>Weight</label>
                            <input type="number" name="weight" class="form-control"/>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Known disease</label>
                        <input type="text" name="disease" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Photo <span class="text-danger fw-bold">*</span></label>
                        <img id="newImg" src="#" alt="New Image" class="mt-1 mb-3" style="display: none;"
                            width="200px" height="200px" />
                        <input type="file" name="image" class="form-control" id="imgInp" />
                    </div>

                    <div class="mb-3">
                        <label>Id proof <span class="text-danger fw-bold">*</span></label>
                        <img id="idProof" src="#" alt="Id proof" class="mt-1 mb-3" style="display: none;"
                            width="200px" height="200px" />
                        <input type="file" name="idProof" class="form-control" id="idInp" />
                    </div>
                        
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Pay Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        const imgInp = document.getElementById('imgInp');
        const newImg = document.getElementById('newImg');
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                newImg.src = URL.createObjectURL(file)
                newImg.style.display = "flex"
            }
        }

        const idInp = document.getElementById('idInp');
        const idProof = document.getElementById('idProof');
        idInp.onchange = evt => {
            const [file] = idInp.files
            if (file) {
                idProof.src = URL.createObjectURL(file)
                idProof.style.display = "flex"
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const alertMessage = document.getElementById('alertMessage');
            setTimeout(function() {
                alertMessage.style.display = 'none';
            }, 7000); // 5000 milliseconds = 5 seconds
        });

    </script>
@endsection
