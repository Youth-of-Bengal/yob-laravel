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

                <form id="postForm" action="{{ route('add-news') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="request_type" value="create">
                    <div class="mb-3">
                        <label>Title <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="title" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>SubTitle <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="subtitle" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Cover Image <span class="text-danger fw-bold">*</span></label>
                        <img id="newImg" src="#" alt="New Image" class="mt-1 mb-3" style="display: none;"
                            width="200px" height="200px" />
                        <input type="file" name="image" class="form-control" id="imgInp" />
                    </div>

                    <div class="mb-3">
                        <label>Description <span class="text-danger fw-bold">*</span></label>
                        <textarea id="newsEditor" name="description" rows="5" class="form-control" style="resize:none;"></textarea>
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <label>Categories (Max: 5) <span class="text-danger fw-bold">*</span></label>
                        <select class="categories form-control" name="tags[]" multiple="multiple">
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
                        <textarea name="meta_keyword" rows="3" class="form-control" style="resize:none;"></textarea>
                    </div>

                    <div class="mb-3" data-provide="datepicker">
                        <label>Publish Date <span class="text-danger fw-bold">*</span></label>
                        <input type="datetime-local" class="form-control" name="publish_date">
                    </div>

                    <div class="col-md-6">
                        <button type="submit" name="action" value="publish" class="btn btn-primary">Publish News</button>
                        <button type="submit" name="action" value="save_draft" class="btn btn-secondary ms-2">Save
                            Draft</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr') }}"></script>
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
    <script type="text/javascript">
        const imgInp = document.getElementById('imgInp');
        const newImg = document.getElementById('newImg');
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                newImg.src = URL.createObjectURL(file)
                newImg.style.display = "flex"
            }
        }
        $(document).ready(function() {
            $('.categories').select2({
                maximumSelectionLength: 5
            });
        })

        config = {
            enableTime: true,
            dateFormat: 'Y-m-d H:i:s',
        }
        flatpickr("input[type=datetime-local]");

        ClassicEditor
            .create(document.querySelector('#newsEditor'), {
                ckfinder: {
                    uploadUrl: "{{ route('news.description.image.upload',['_token'=>csrf_token()]) }}",
                }
            })
            .catch(error => {
                console.error(error);
            });

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('postForm');

            form.addEventListener('submit', function(event) {
                const clickedButton = document.querySelector('button[type="submit"]:focus');
                if (clickedButton) {
                    const action = clickedButton.value;
                    form.setAttribute('action', form.getAttribute('action') + '?action=' + action);
                }
            });
        });
    </script>
@endsection
