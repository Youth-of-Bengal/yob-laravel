@extends('layouts.master')
@section('title', 'Home')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Contact details</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" id="alertMessage">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/pages/contact/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_type" value="create">
                    <div class="mb-3">
                        <label>Address <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="address" value="{{ $contact->address }}" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Phone.No <span class="text-danger fw-bold">*</span></label>
                        <input type="number" name="phone_no" value="{{ $contact->phone_no }}" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Email <span class="text-danger fw-bold">*</span></label>
                        <input type="email" name="email" value="{{ $contact->email }}" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Website name <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="website_name" value="{{ $contact->website_name }}" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Map url <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="map_url" value="{{ $contact->map_url }}" class="form-control" />
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

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
