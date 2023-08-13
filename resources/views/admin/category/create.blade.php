@extends('layouts.master')
@section('title', 'Category')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add Category</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="request_type" value="create">
                <div class="mb-3">
                    <label>Category Name <span class="text-danger fw-bold" >*</span></label>
                    <input type="text" name="name" class="form-control" />
                </div>
                <!-- <div class="mb-3">
                    <label>Slug <span class="text-danger fw-bold" >*</span></label>
                    <input type="text" name="slug" class="form-control" />
                </div> -->
                <div class="mb-3">
                    <label>Description <span class="text-danger fw-bold" >*</span></label>
                    <textarea name="description" rows="5" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Image <span class="text-danger fw-bold" >*</span></label>
                    <img id="newImg" src="#" alt="New Image" class="mt-1 mb-3" style="display: none;" width="200px" height="200px"  />
                    <input type="file" name="image" class="form-control" id="imgInp" />

                    <script type="text/javascript">
                        const imgInp = document.getElementById('imgInp');
                        // const previousImg = document.getElementById('previousImg');
                        const newImg = document.getElementById('newImg');
                        imgInp.onchange = evt => {
                            const [file] = imgInp.files
                            if (file) {
                                // previousImg.style.display = "none";
                                newImg.src = URL.createObjectURL(file)
                                newImg.style.display = "flex"
                            }
                        }
                    </script>
                </div>

                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" />
                </div>
                <div class="mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Meta Keywords</label>
                    <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Navbar Status</label>
                        <input type="checkbox" name="navbar_status" />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Hide Category</label>
                        <input type="checkbox" name="status" />
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>



            </form>
        </div>
    </div>
</div>

@endsection