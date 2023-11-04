@extends('layouts.master')
@section('title', 'Description')

@section('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Edit Description</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                @if (session('message'))
                <div class="alert alert-success" id="alertMessage">{{ session('message') }}</div>
                @endif

                <form action="{{ url('admin/about/description/edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Description <span class="text-danger fw-bold">*</span></label>
                        <textarea class="form-control" rows="5" name="description" id="newsEditor" style="resize:none;">{{ $description->description }}"</textarea> 
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <label>Image</label>
                        <img src="{{ URL::to('/') }}{{ Illuminate\Support\Facades\Storage::url($description->image) }}"
                            id="previousImg" width="200px" height="200px" class="mt-1 mb-3" alt="">
                        <img id="newImg" src="#" alt="New Image" class="mt-1 mb-3" style="display: none;"
                            width="200px" height="200px" />
                        <input type="file" name="image" class="form-control" id="imgInp" />
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
    <script type="text/javascript">
        const imgInp = document.getElementById('imgInp');
        const previousImg = document.getElementById('previousImg');
        const newImg = document.getElementById('newImg');
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                previousImg.style.display = "none";
                newImg.src = URL.createObjectURL(file)
                newImg.style.display = "flex"
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Get the alert element by its ID
            const alertMessage = document.getElementById('alertMessage');

            // Set a timeout to hide the alert after 5 seconds (adjust the time as needed)
            setTimeout(function() {
                alertMessage.style.display = 'none';
            }, 2500); // 5000 milliseconds = 5 seconds
        });

        ClassicEditor.create(document.querySelector('#newsEditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
