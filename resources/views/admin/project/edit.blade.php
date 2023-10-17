@extends('layouts.master')
@section('title', 'Project')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Edit Project</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/update-project/' . $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Project Name <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="name" value="{{ $project->name }}" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Project Coordinator(s) <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="coordinator" value="{{ $project->coordinator }}" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Description <span class="text-danger fw-bold">*</span></label>
                        <textarea name="description" rows="5" class="form-control" style="resize:none;">{{ $project->description }}</textarea>
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <label>Image</label>
                        <img src="{{ URL::to('/') }}{{ Illuminate\Support\Facades\Storage::url($project->image) }}"
                            id="previousImg" width="200px" height="200px" class="mt-1 mb-3" alt="{{ $project->name }}">
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
    </script>
@endsection
