@extends('layouts.master')
@section('title', 'Add Team Member')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Team Member</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form id="postForm" action="{{ route('add.team.member') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden">
                    <div class="mb-3">
                        <label>Name <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>Profession <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="profession" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Profile Image <span class="text-danger fw-bold">*</span></label>
                        <img id="newImg" src="#" alt="New Image" class="mt-1 mb-3" style="display: none;"
                            width="200px" height="200px" />
                        <input type="file" name="image" class="form-control" id="imgInp" />
                    </div>

                    <div class="mb-3">
                        <label>NGO Role</label>
                        <input type="text" name="ngo_role" class="form-control" />
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <label>Department <span class="text-danger fw-bold">*</span></label>
                        <select class="departments form-control" name="department">
                            @foreach ($departments as $item)
                                <option vlaue="{{ $item->id }}">{{ $item->department }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Social Link</label>
                        <input type="text" name="social_link" class="form-control" />
                    </div>
                    <div class="col-md-6">
                        <button type="submit" name="action" value="publish" class="btn btn-primary">Add Team Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
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
            $('.departments').select2({
                maximumSelectionLength: 5
            });
        })

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
