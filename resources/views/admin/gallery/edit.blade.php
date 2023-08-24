@extends('layouts.master')
@section('title', 'Gallery')
@section('styles')
    <style>
        output {
            width: 100%;
            min-height: 150px;
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            gap: 15px;
            position: relative;
            border-radius: 5px;
        }

        output .image {
            height: 150px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            position: relative;
        }

        output .image img {
            height: 100%;
            width: 100%;
        }

        output .image span {
            position: absolute;
            top: -4px;
            right: 4px;
            cursor: pointer;
            font-size: 22px;
            color: white;
        }

        output .image span:hover {
            opacity: 0.8;
        }

        output .span--hidden {
            visibility: hidden;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Edit Album</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" id="alertMessage">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/update-album/' . $album->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Album Name <span class="text-danger fw-bold">*</span></label>
                        <input type="text" name="album_name" value="{{ $album->album_name }}" class="form-control" />
                    </div>
                    @php
                        $prevImagePaths = [];
                        $albumName = $album->album_name;
                        foreach ($allImages as $image) {
                            $prevImagePaths[] = Illuminate\Support\Facades\Storage::url($image->filename);
                        }
                        $prevImagePathsJSONString = json_encode($prevImagePaths);
                    @endphp
                    <div class="mb-3">
                        <label id="prevImageLevel">Album's Images</label>
                        <input type="hidden" name="" id="prevImageInput"
                            data-previmagepaths="{{ $prevImagePathsJSONString }}" data-albumname="{{ $albumName }}">
                        <output style="display:none;" id="prevOutput"></output>
                    </div>
                    <div class="mb-3">
                        <label>Add New Image(s) <span class="text-danger fw-bold">*</span></label>
                        <input type="file" class="form-control mb-3" name="images[]" multiple="multiple"
                            id="newImageInput" />
                        <output style="display:none;" id="newOutput"></output>
                    </div>

                    <script>
                        const newOutput = document.getElementById("newOutput")
                        const prevOutput = document.getElementById("prevOutput")
                        const newImageInput = document.getElementById("newImageInput")
                        const prevImageInput = document.getElementById("prevImageInput")
                        const prevImageLevel = document.getElementById("prevImageLevel")
                        const prevImagePathsJSONString = prevImageInput.dataset.previmagepaths
                        let prevImagePaths = JSON.parse(prevImagePathsJSONString)
                        let albumName = prevImageInput.dataset.albumname
                        let newImagesArray = []

                        function deleteImage(index) {
                            const dt = new DataTransfer()
                            const newImageInput = document.getElementById("newImageInput")
                            const {
                                files
                            } = newImageInput
                            for (let i = 0; i < files.length; i++) {
                                const file = files[i]
                                if (index !== i) {
                                    dt.items.add(file)
                                }
                            }
                            newImageInput.files = dt.files
                            newImagesArray.splice(index, 1)
                            displayImages()
                        }

                        function deletePrevImage(index) {
                            prevImagePaths.splice(index, 1)
                            displayPrevImages()
                        }


                        function displayImages() {
                            let images = ""

                            newImagesArray.forEach((image, index) => {
                                images += `<div class="image">
                                            <img src="${URL.createObjectURL(image)}" alt="image">
                                            <span onclick="deleteImage(${index})">&times;</span>
                                            </div>`
                            })
                            newOutput.innerHTML = images
                        }

                        newImageInput.addEventListener("change", () => {
                            newOutput.style.display = "flex"
                            const files = newImageInput.files
                            newImagesArray = []
                            for (let i = 0; i < files.length; i++) {
                                newImagesArray.push(files[i])
                            }
                            displayImages()
                        })

                        function displayPrevImages() {
                            let prevImages = ""
                            if (prevImagePaths.length > 0) {
                                prevImagePaths.forEach((imgPath, index) => {
                                    prevImages += `<div class="image">
                                            <img src="${imgPath}" alt="image">
                                            <span onclick="deletePrevImage(${index})">&times;</span>
                                            </div>`
                                })
                                prevImageInput.name = JSON.stringify(prevImagePaths)
                            }
                            else {
                                prevOutput.style.display = "none"
                                prevImageLevel.style.display = "none"
                                prevImageInput.name = JSON.stringify(prevImagePaths)
                            }
                            prevOutput.innerHTML = prevImages
                        }
                        window.addEventListener("load", () => {
                            prevOutput.style.display = "flex"
                            displayPrevImages()
                        })
                    </script>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update Album</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
