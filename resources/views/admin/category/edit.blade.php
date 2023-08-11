@extends('layouts.master')
@section('title', 'Category')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Category</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Category Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" />
                </div>
                <!-- <div class="mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" />
                </div> -->
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" rows="5" class="form-control">{{ $category->description }}</textarea>
                </div>
                <div class="mb-3 d-flex flex-column">
                    <label>Image</label>
                    <img src="{{ URL::to('/')}}/uploads/category/{{$category->image }}" id="previousImg" width="200px" height="200px" class="mt-1 mb-3" alt="{{ $category->name }}">
                    <img id="newImg" src="#" alt="New Image" class="mt-1 mb-3" style="display: none;" width="200px" height="200px"  />
                    <input type="file" name="image" class="form-control" id="imgInp" />
                    
                    <script type="text/javascript">
                        console.log("I'm running script")
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

                </div>

                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{ $category->meta_description }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Meta Keywords</label>
                    <textarea name="meta_keyword" rows="3" class="form-control">{{ $category->meta_keyword }}</textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Navbar Status</label>
                        <input type="checkbox" name="navbar_status" {{ $category->navbar_status == '1' ? 'checked' : '' }} />
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }} />
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>



            </form>
        </div>
    </div>
</div>

@endsection