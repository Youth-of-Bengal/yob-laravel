@extends('layouts.master')
@section('title', 'Project')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Project</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" id="alertMessage">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/add-project') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_type" value="create">
                    <div class="mb-3">
                        <label>Project Name <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="name" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Project Coordinator(s) <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="coordinator" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Description <span class="text-danger fw-bold">*</span></label>
                        <textarea name="description" rows="5" class="form-control" style="resize:none;"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Cover Image <span class="text-danger fw-bold">*</span></label>
                        <img id="newImg" src="#" alt="New Image" class="mt-1 mb-3" style="display: none;"
                            width="200px" height="200px" />
                        <input type="file" name="image" class="form-control" id="imgInp" />


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
