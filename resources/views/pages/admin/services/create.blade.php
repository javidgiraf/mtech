@extends('layouts.main')
@push('styles')
<style>
    .dropbox {
        border: 2px dashed #007bff;
        border-radius: 10px;
        padding: 40px;
        text-align: center;
        cursor: pointer;
    }

    .dropbox.dragover {
        background-color: #f8f9fa;
    }

    .dropboxMultiple {
        border: 2px dashed #007bff;
        border-radius: 10px;
        padding: 40px;
        text-align: center;
        cursor: pointer;
    }

    .dropboxMultiple.dragover {
        background-color: #f8f9fa;
    }
</style>
@endpush
@section('content')
<div class="pagetitle">
    <h1>{{ __('Create Service') }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">{{ __('Services') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Create') }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body mt-4">



                    <form class="row g-3" action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="title" class="form-label">{{ __('Title') }} <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="{{ __('Title') }}" value="{{ old('title') }}">
                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="sub_title" class="form-label">{{ __(key: 'Sub Title') }}</label>
                            <input type="text" name="sub_title" class="form-control" placeholder="{{ __('Sub Title') }}" value="{{ old('sub_title') }}">
                        </div>
                        <div class="col-12">
                            <label>Upload Image <span class="text-danger">*</span></label>
                            <div id="dropbox" class="dropbox my-4">
                                <p>Drag & Drop images here or click to upload</p>
                                <input type="file" class="@error('image') is-invalid @enderror" name="image" id="fileInput" accept="image/*" hidden>
                            </div>
                            <div id="preview-container" class="d-none">
                                <h4>Image Preview</h4>
                                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner"></div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>

                                </div>
                            </div>
                            @error('image')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label>Upload Multiple Images</label>
                            <div id="dropboxMultiple" class="dropboxMultiple my-4">
                                <p>Drag & Drop images here or click to upload</p>
                                <input type="file" name="uploadImages[]" multiple id="fileInputMultiple" accept="image/*" hidden>
                            </div>
                            <div id="preview-container" class="d-none">
                                <h4>Image Preview</h4>
                                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner"></div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="content" class="col-form-label">{{ __('Content') }} <span class="text-danger">*</span></label>
                            <textarea name="content" class="tinymce-editor @error('content') is-invalid @enderror">
                                {!! old('content') !!}
                            </textarea>
                            @error('content')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="col-form-label">{{ __('Description') }} <span class="text-danger">*</span></label>
                            <textarea name="description" class="tinymce-editor @error('description') is-invalid @enderror">
                                {!! old('description') !!}
                            </textarea>
                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <table class="table table-striped" id="applicationVideosTable">

                                <tbody>
                                    <tr>
                                        <th colspan="3">{{ __('Application Videos') }}</th>
                                    </tr>
                                    <tr class="keyRow" data-key="0">
                                        <td>
                                            <input type="text" name="applicationVideoTitle[]" class="form-control @error('applicationVideoTitle.*') is-invalid @enderror" placeholder="{{ __('Video Title') }}">
                                            @error('applicationVideoTitle.*')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td scope="row">
                                            <input type="text" name="applicationVideoUrl[]" class="form-control @error('applicationVideoUrl.*') is-invalid @enderror" placeholder="{{ __('Video URL') }}">
                                            @error('applicationVideoUrl.*')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </td>

                                        <td><a class="btn btn-danger btn-sm btn-remove"><i class="bi bi-basket"></i></a></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <a class="btn-plus btn btn-success" style="float: right;"><i class="bi bi-plus"></i></a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                         

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary ml-2">{{ __('Save') }}</button>

                        </div>
                    </form>

                </div>
            </div>



        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {

        function siNo() {
            let i = 1;
            $(".siNo").each(function() {
                $(this).text(i);
                i++;
            });
        }

        $("#applicationVideosTable").on("click", ".btn-plus", function() {
            let html = `
    <tr>
      <td><input type="text" name="applicationVideoTitle[]" class="form-control" placeholder="{{ __('Video Title') }}"></td>
      <td><input type="text" name="applicationVideoUrl[]" class="form-control" placeholder="{{ __('Video URL') }}"></td>
      <td><a class="btn btn-danger btn-sm btn-remove"><i class="bi bi-basket"></i></a></td>
    </tr>`;
            $("#applicationVideosTable tbody").append(html);
            siNo();
        });

        // Remove row
        $("#applicationVideosTable").on("click", ".btn-remove", function() {
            $(this).closest("tr").remove();
            siNo();
        });

        const dropbox = document.getElementById('dropbox');
        const fileInput = document.getElementById('fileInput');

        dropbox.addEventListener('click', () => fileInput.click());

        dropbox.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropbox.classList.add('dragover');
        });

        dropbox.addEventListener('dragleave', () => dropbox.classList.remove('dragover'));

        dropbox.addEventListener('drop', (e) => {
            e.preventDefault();
            dropbox.classList.remove('dragover');
            handleFiles(e.dataTransfer.files);
        });

        fileInput.addEventListener('change', () => handleFiles(fileInput.files));

        let uploadedFiles = new DataTransfer();

        function handleFiles(files) {
            Array.from(files).forEach((file, index) => {
                if (!file.type.startsWith('image/')) {
                    alert('Only image files are allowed!');
                    return;
                }

                uploadedFiles.items.add(file);

                const imgWrapper = document.createElement('div');
                imgWrapper.className = 'position-relative d-inline-block m-2';

                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.className = "img-thumbnail";
                img.style.maxWidth = "300px";
                img.style.maxHeight = "300px";
                img.style.objectFit = "cover";

                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '&times;';
                removeBtn.className = 'btn btn-danger btn-sm position-absolute top-0 end-0 m-1';
                removeBtn.style.borderRadius = '50%';

                // Remove image on click
                removeBtn.onclick = (e) => {
                    e.preventDefault();
                    removeFile(index, imgWrapper);
                };

                imgWrapper.appendChild(img);
                imgWrapper.appendChild(removeBtn);
                dropbox.appendChild(imgWrapper);
            });

            // Update file input with selected files
            fileInput.files = uploadedFiles.files;
        }

        function removeFile(index, imgWrapper) {
            const newDataTransfer = new DataTransfer();

            Array.from(uploadedFiles.files).forEach((file, i) => {
                if (i !== index) {
                    newDataTransfer.items.add(file);
                }
            });

            uploadedFiles = newDataTransfer;
            fileInput.files = uploadedFiles.files;

            imgWrapper.remove();

            if (uploadedFiles.files.length === 0) {
                dropbox.innerHTML = `<p>Drag & Drop images here or click to upload</p>`;
            }
        }

        const dropboxMultiple = document.getElementById('dropboxMultiple');
        const fileInputMultiple = document.getElementById('fileInputMultiple');

        dropboxMultiple.addEventListener('click', () => fileInputMultiple.click());

        dropboxMultiple.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropboxMultiple.classList.add('dragover');
        });

        dropboxMultiple.addEventListener('dragleave', () => dropboxMultiple.classList.remove('dragover'));

        dropboxMultiple.addEventListener('drop', (e) => {
            e.preventDefault();
            dropboxMultiple.classList.remove('dragover');
            handleMultipleFiles(e.dataTransfer.files);
        });

        fileInputMultiple.addEventListener('change', () => handleMultipleFiles(fileInputMultiple.files));

        let uploadedMultipleFiles = new DataTransfer();

        function handleMultipleFiles(files) {
            Array.from(files).forEach((file, index) => {
                if (!file.type.startsWith('image/')) {
                    alert('Only image files are allowed!');
                    return;
                }

                uploadedMultipleFiles.items.add(file);

                const imgWrapper = document.createElement('div');
                imgWrapper.className = 'position-relative d-inline-block m-2';

                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.className = "img-thumbnail";
                img.style.maxWidth = "300px";
                img.style.maxHeight = "300px";
                img.style.objectFit = "cover";

                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '&times;';
                removeBtn.className = 'btn btn-danger btn-sm position-absolute top-0 end-0 m-1';
                removeBtn.style.borderRadius = '50%';

                // Remove image on click
                removeBtn.onclick = (e) => {
                    e.preventDefault();
                    removeMultipleFile(index, imgWrapper);
                };

                imgWrapper.appendChild(img);
                imgWrapper.appendChild(removeBtn);
                dropboxMultiple.appendChild(imgWrapper);
            });

            // Update file input with selected files
            fileInputMultiple.files = uploadedMultipleFiles.files;
        }

        function removeMultipleFile(index, imgWrapper) {
            const newDataTransfer = new DataTransfer();

            Array.from(uploadedMultipleFiles.files).forEach((file, i) => {
                if (i !== index) {
                    newDataTransfer.items.add(file);
                }
            });

            uploadedMultipleFiles = newDataTransfer;
            fileInputMultiple.files = uploadedMultipleFiles.files;

            imgWrapper.remove();

            if (uploadedMultipleFiles.files.length === 0) {
                dropboxMultiple.innerHTML = `<p>Drag & Drop images here or click to upload</p>`;
            }
        }
    });
</script>
@endpush