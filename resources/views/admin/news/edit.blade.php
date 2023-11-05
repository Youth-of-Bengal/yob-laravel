@extends('layouts.master')
@section('title', 'News')
@section('styles')
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flatpickr.min.css') }}" rel="stylesheet">
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
                <h4 class="">Edit News</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/update-news/' . $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Title <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="title" value="{{ $news->title }}" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>SubTitle <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="subtitle" value="{{ $news->subtitle }}" class="form-control" />
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <label>Cover Image</label>
                        <img src="{{ URL::to('/') }}{{ Illuminate\Support\Facades\Storage::url($news->image) }}"
                            id="previousImg" width="200px" height="200px" class="mt-1 mb-3" alt="{{ $news->name }}">
                        <img id="newImg" src="#" alt="New Image" class="mt-1 mb-3" style="display: none;"
                            width="200px" height="200px" />
                        <input type="file" name="image" class="form-control" id="imgInp" />
                    </div>

                    <div class="mb-3">
                        <label>Description <span class="text-danger fw-bold">*</span></label>
                        <textarea name="description" id="newsEditor" rows="5" class="form-control" style="resize:none;">{{ $news->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Categories (Max: 5) <span class="text-danger fw-bold">*</span></label>
                        <select class="categories form-control" name="tags[]" multiple="multiple">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ in_array($item->id, $selected_news_ids) ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label>meta title <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="meta_title" value="{{ $news->meta_title }}" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>meta description <span class="text-danger fw-bold">*</span></label>
                        <textarea name="meta_description" rows="5" class="form-control" style="resize:none;">{{ $news->meta_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>meta keyword <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="meta_keyword" value="{{ $news->meta_keyword }}" class="form-control"/>
                    </div>

                    <div class="mb-3" data-provide="datepicker">
                        <label>Publish Date <span class="text-danger fw-bold">*</span></label>
                        <input type="datetime-local" class="form-control" publish-date="{{ $news->publish_date }}" name="publish_date" value="{{ date('yyyy-MM-ddThh:mm', strtotime($news->publish_date)) }}">
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update News</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@php
    $category_ids = [];
@endphp
@foreach ($news->categories as $category)
    @php
        array_push($category_ids, $category->id);
    @endphp
@endforeach

@section('scripts')
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr') }}"></script>
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

        config = {
            enableTime: true,
            dateFormat: 'Y-m-d H:i:s',
        }
        flatpickr("input[type=datetime-local]");

        // CK EDITOR INTERFACE IS NOT SHOWING: NEEDS TO BE FIXED
        ClassicEditor.create(document.querySelector('#newsEditor'), {
                ckfinder: {
                    uploadUrl: "{{ route('news.description.image.upload', ['_token' => csrf_token()]) }}",
                }
            })
            .catch(error => {
                console.error(error);
            });

        // MULTIPLE TAGS PRE-SELECTION (SELECT2 PROBLEM): NEEDS TO BE FIXED 
        $(document).ready(function() {
            $('.categories').select2({
                maximumSelectionLength: 5
            });
            data = [];
            data = <?php echo json_encode($category_ids); ?>;
            $('.categories').val(data);
            $('.categories').trigger('change');
        })

        $('.flatpickr-input').val('2022-02-06')
    </script>
@endsection
