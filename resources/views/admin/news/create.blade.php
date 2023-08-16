@extends('layouts.master')
@section('title', 'News')

@section('styles')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/flatpickr.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add News</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ url('admin/add-news') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="request_type" value="create">
                <div class="mb-3">
                    <label>News Title <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="title" class="form-control" />
                </div>
                <div class="mb-3">
                    <label>News SubTitle <span class="text-danger fw-bold">*</span></label>
                    <input type="text" name="subtitle" class="form-control" />
                </div>

                <div class="mb-3">
                    <label>Cover Image <span class="text-danger fw-bold">*</span></label>
                    <img id="newImg" src="#" alt="New Image" class="mt-1 mb-3" style="display: none;" width="200px" height="200px" />
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

                <div class="mb-3">
                    <label>Description <span class="text-danger fw-bold">*</span></label>
                    <textarea name="description" rows="5" class="form-control" style="resize:none;"></textarea>
                </div>

                <div class="mb-3 d-flex flex-column">
                    <label>Categories <span class="text-danger fw-bold">*</span></label>
                    <select class="categories form-control" name="categories[]" multiple="multiple">
                        @foreach ($categories as $item)
                        <option vlaue="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
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
                <div class="mb-3">
                    <label>Meta Keywords <span class="text-danger fw-bold">*</span></label>
                    <textarea name="meta_keyword" rows="3" class="form-control" style="resize:none; height:50px;"></textarea>
                </div>

                <div class="mb-3" data-provide="datepicker">
                <label>Publish Date <span class="text-danger fw-bold">*</span></label>
                    <input type="datetime-local" class="form-control" name="publish_date">
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Publish News</button>
                    <button type="submit" class="btn btn-secondary ms-2">Save Draft</button>
                </div>




            </form>
        </div>
    </div>
</div>

@section('scripts')
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/flatpickr') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.categories').select2();
    })

    config = {
        enableTime: true,
        dateFormat: 'Y-m-d H:i:s',
    }
    flatpickr("input[type=datetime-local]");
</script>
@endsection



@endsection