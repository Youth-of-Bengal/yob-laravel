@extends('layouts.master')
@section('title', 'Home')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add details</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" id="alertMessage">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/pages/home/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_type" value="create">
                    <div class="mb-3">
                        <label>Heading <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="heading" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>subheading <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="subheading" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>video_url <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="video_url" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>served_number <span class="text-danger fw-bold">*</span></label>
                        <input type="number" name="served_number" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Served Description <span class="text-danger fw-bold">*</span></label>
                        <textarea name="served_description" rows="5" class="form-control" style="resize:none;"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Image <span class="text-danger fw-bold">*</span></label>
                        <img id="newImg" src="#" alt="New Image" class="mt-1 mb-3" style="display: none;"
                            width="200px" height="200px" />
                        <input type="file" name="image" class="form-control" id="imgInp" />
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>Meta Title <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="meta_title" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>Meta Description <span class="text-danger fw-bold">*</span></label>
                        <textarea name="meta_description" rows="3" class="form-control" style="resize:none;"></textarea>
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
