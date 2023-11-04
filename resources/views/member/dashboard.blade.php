@extends('layouts.master')
@section('title', 'Member Dashboard')

@section('content')
    <div class="container-fluid px-4 mb-5">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Member Dashboard</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form id="postForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_type" value="create">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" />
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input disabled type="email" name="email" class="form-control" value="{{$user->email}}" />
                    </div>

                    <div class="mb-3">
                        <label>Phone No.</label>
                        <input disabled type="number" name="phone_no" class="form-control" value="{{$member->phone}}" />
                    </div>

                    <div class="mb-3">
                        <label>Address</label>
                        <input disabled type="text" name="address" class="form-control" value="{{$member->address}}" />
                    </div>

                    <div class="d-flex">
                        <div class="mb-3 col-6">
                            <label for="blood_gr">Blood group</label>
                            <select id="blood_gr" name="blood_gr" class="form-control">
                                <input disabled type="text" value="{{$member->blood_gr}}" />
                              </select>
                        </div>
    
                        <div class="mb-3 col-6">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="{{$member->dob}}" />
                        </div>
                    </div>

                    <div class="d-flex">
                        @if($member->height)
                            <div class="mb-3 col-6">
                                <label>Height</label>
                                <input type="number" name="height" class="form-control" value="{{$member->height}}" />
                            </div>
                        @endif
                        @if ($member->weight)
                            <div class="mb-3 col-6">
                                <label>Weight</label>
                                <input type="number" name="weight" class="form-control" value="{{$member->weight}}" />
                            </div>
                        @endif
                    </div>

                    @if ($member->disease)
                        <div class="mb-3">
                            <label>Known disease</label>
                            <input type="text" name="disease" class="form-control" value="{{$member->disease}}" />
                        </div>
                    @endif

                    <div class="mb-3">
                        <label>Photo</label>
                        <img id="newImg" src="{{ URL::to('/') }}{{ Illuminate\Support\Facades\Storage::url($member->image) }}" alt="New Image" class="mt-1 mb-3" style="display: none;"
                            width="200px" height="200px" alt="{{$user->name}}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection