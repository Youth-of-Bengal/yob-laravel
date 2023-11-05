@extends('layouts.master')
@section('title', 'Home')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Update Homepage</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" id="alertMessage">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/pages/home/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_type" value="create">
                    <div class="mb-3">
                        <label>Heading <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="heading" class="form-control" value="{{$home['heading']}}" />
                    </div>

                    <div class="mb-3">
                        <label>subheading <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="subheading" class="form-control" value="{{$home['subheading']}}" />
                    </div>

                    <div class="mb-3">
                        <label>Video URL <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="video_url" class="form-control" value="{{$home['video_url']}}" />
                    </div>

                    <div class="mb-3">
                        <label>Served People <span class="text-danger fw-bold">*</span></label>
                        <input type="number" name="served_number" class="form-control" value="{{$home['served_number']}}" />
                    </div>

                    <div class="mb-3">
                        <label>Served Description <span class="text-danger fw-bold">*</span></label>
                        <input name="served_description" rows="5" class="form-control" style="resize:none;" value="{{$home['served_description']}}" />
                    </div>

                    <div class="mb-3">
                        <label>Image <span class="text-danger fw-bold">*</span></label>
                        <img src="{{ URL::to('/') }}{{ Illuminate\Support\Facades\Storage::url($home['image']) }}"
                            id="previousImg" width="200px" height="200px" class="mt-1 mb-3" alt="homepage image">
                        <img id="newImg" src="#" alt="New Image" class="mt-1 mb-3" style="display: none;"
                            width="200px" height="200px" />
                        <input type="file" name="image" class="form-control" id="imgInp" />
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>Meta Title <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="meta_title" class="form-control" value="{{$home['meta_title']}}" />
                    </div>
                    <div class="mb-3">
                        <label>Meta Description <span class="text-danger fw-bold">*</span></label>
                        <input name="meta_description" rows="3" class="form-control" style="resize:none;" value="{{$home['meta_description']}}" />
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
        const imgInp = document.getElementById('imgInp');
        // const previousImg = document.getElementById('previousImg');
        const newImg = document.getElementById('newImg');
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                newImg.src = URL.createObjectURL(file)
                newImg.style.display = "flex"
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
