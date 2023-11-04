@extends('layouts.master')
@section('title', 'Member Dashboard')

@section('content')
    <div class="container-fluid px-4 mb-5">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">User Dashboard</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form id="postForm">
                    <input type="hidden" name="request_type" value="create">
                    <div class="mb-3">
                        <label>Name</label>
                        <input disabled type="text" name="name" class="form-control" value="{{$user->name}}" />
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input disabled type="email" name="email" class="form-control" value="{{$user->email}}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection