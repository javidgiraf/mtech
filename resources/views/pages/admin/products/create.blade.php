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
</style>
@endpush
@section('content')
<div class="pagetitle">
    <h1>{{ __('Create Product') }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">{{ __('Products') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Create') }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body mt-4">


                    <form class="row g-3" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                        @csrf
                        <div class="col-12">
                            <label for="title" class="form-label">{{ __('Title') }} <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="{{ __('Title') }}" value="{{ old('title') }}">
                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="sub_title" class="form-label">{{ __(key: 'Sub Title') }}</label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="{{ __('Sub Title') }}" value="{{ old('sub_title') }}">
                        </div>

                        <div class="col-6">
                            <label for="sector" class="form-label">{{ __(key: 'Choose Sector') }}</label>
                            <select name="sector_ids[]" class="form-control sector_ids @error('sector_ids') is-invalid @enderror" multiple>
                                <option value="">Choose Sector</option>
                                @foreach($sectors as $sector)
                                <option {{ old('sector_ids') == $sector->id ? 'selected' : '' }} value="{{ $sector->id }}">{{ $sector->title }}</option>
                                @endforeach
                            </select>
                            @error('sector_ids')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="project" class="form-label">{{ __(key: 'Choose Project') }}</label>
                            <select name="project_ids[]" class="form-control project_ids @error('project_ids') is-invalid @enderror" multiple>
                                <option value="">Choose Project</option>
                                @foreach($projects as $project)
                                <option {{ old('project_ids') == $project->id ? 'selected' : '' }} value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="col-5">
                                <div class="card showImageCard d-none">
                                    <div class="card-body mt-3">
                                        <img class="d-block w-100 imgPreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-12">
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
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="col-form-label">{{ __('Description') }} <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="tinymce-editor @error('description') is-invalid @enderror">
                                {!! old('description') !!}
                            </textarea>
                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="quality_assurance" class="col-form-label">{{ __('Quality Assurance') }} <span class="text-danger">*</span></label>
                            <textarea name="quality_assurance" id="quality_assurance" class="tinymce-editor @error('quality_assurance') is-invalid @enderror">
                                {!! old('quality_assurance') !!}
                            </textarea>
                            @error('quality_assurance')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <table class="table table-striped" id="applicationPhotosTable">

                                <tbody>
                                    <tr class="keyRow" data-key="0">
                                        <td>
                                        @foreach (old('applicationTitle', ['']) as $index => $value)
                                            <input type="text" name="applicationTitle[]" class="form-control @error('applicationTitle.*') is-invalid @enderror" placeholder="{{ __('Title') }}">{{ $value }}</>
                                            @error('applicationTitle.*')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        @endforeach
                                        </td>
                                        <td scope="row">
                                            <input type="file" name="applicationImage[]" class="form-control @error('applicationImage') is-invalid @enderror applicationImageUpload">
                                            @error('applicationImage')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror

                                            @foreach ($errors->get('applicationImage.*') as $messages)
                                                @foreach ($messages as $message)
                                                    <span class="invalid-feedback">{{ $message }}</span><br>
                                                @endforeach
                                            @endforeach
                                        </td>

                                        <td><a class="btn btn-danger btn-sm btn-remove"><i class="bi bi-trash"></i></a></td>
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
                        <div class="col-12">
                            <table class="table table-striped" id="applicationVideosTable">

                                <tbody>
                                    <tr class="keyRow" data-key="0">
                                        <td>
                                        @foreach (old('applicationVideoTitle', ['']) as $index => $value)
                                            <input type="text" name="applicationVideoTitle[]" class="form-control @error('applicationVideoTitle') is-invalid @enderror" placeholder="{{ __('Video Title') }}" value="{{ $value }}">
                                            @error('applicationVideoTitle.*')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        @endforeach
                                        </td>
                                        <td scope="row">
                                            <input type="text" name="applicationVideoUrl[]" class="form-control @error('applicationVideoUrl') is-invalid @enderror" placeholder="{{ __('Video URL') }}">
                                            @error('applicationVideoUrl.*')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </td>

                                        <td><a class="btn btn-danger btn-sm btn-remove"><i class="bi bi-trash"></i></a></td>
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
                        <div class="col-12">

                            <table class="table" width="100%" id="productCatalogsTable">
                                <thead>
                                    <tr>
                                        <th colspan="5">Catalog</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="siNo">
                                            1
                                        </td>
                                        <td>
                                            <input type="text" name="catalogTitle[]" class="form-control @error('catalogTitle') is-invalid @enderror" placeholder="Title" value="{{ old('catalogTitle') }}"></td>
                                        <td>
                                            <input type="file"
                                                name="pdfFile[]"
                                                class="form-control" accept="application/pdf">
                                            @error('catalogTitle.*')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-remove"><i class="bi bi-basket"></i></a>
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="4">

                                            <a class="btn-plus btn btn-success" style="float: right;"><i class="bi bi-plus"></i></a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btnSave ml-2">{{ __('Save') }}</button>

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
        $(".sector_ids").select2({
            placeholder: "Choose Sector",
            allowClear: true
        });

        $(".project_ids").select2({
            placeholder: "Choose Project",
            allowClear: true
        });

        $('.showImageCard').addClass('d-none');
        $(document).on('change', '.imgInput', function(event) {
            var file = event.target.files[0];

            if (file) {
                $('.showImageCard').removeClass('d-none');
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imgPreview").attr("src", e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });


        function siNo() {
            let i = 1;
            $(".siNo").each(function() {
                $(this).text(i);
                i++;
            });
        }

        // Add new row
        $("#productCatalogsTable").on("click", ".btn-plus", function() {
            let html = `
    <tr>
      <td class="siNo"></td>
      <td><input type="text" name="catalogTitle[]" class="form-control" placeholder="Title"></td>
      <td><input type="file" name="pdfFile[]" class="form-control" accept="application/pdf"></td>
      <td><a class="btn btn-danger btn-remove"><i class="bi bi-basket"></i></a></td>
    </tr>`;
            $("#productCatalogsTable tbody").append(html);
            siNo();
        });

        // Remove row
        $("#productCatalogsTable").on("click", ".btn-remove", function() {
            $(this).closest("tr").remove();
            siNo();
        });

        $("#applicationPhotosTable").on("click", ".btn-plus", function() {
            let html = `
    <tr>
      <td><input type="text" name="catalogTitle[]" class="form-control" placeholder="Title"></td>
      <td><input type="file" name="pdfFile[]" class="form-control" accept="application/pdf"></td>
      <td><a class="btn btn-danger btn-remove"><i class="bi bi-basket"></i></a></td>
    </tr>`;
            $("#applicationPhotosTable tbody").append(html);
            siNo();
        });

        // Remove row
        $("#applicationPhotosTable").on("click", ".btn-remove", function() {
            $(this).closest("tr").remove();
            siNo();
        });

        $("#applicationVideosTable").on("click", ".btn-plus", function() {
            let html = `
    <tr>
      <td><input type="text" name="applicationVideoTitle[]" class="form-control" placeholder="{{ __('Video Title') }}"></td>
      <td><input type="text" name="applicationVideoUrl[]" class="form-control" placeholder="{{ __('Video URL') }}"></td>
      <td><a class="btn btn-danger btn-remove"><i class="bi bi-basket"></i></a></td>
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

        // Track uploaded files globally
        let uploadedFiles = new DataTransfer();

        function handleFiles(files) {
            Array.from(files).forEach((file, index) => {
                if (!file.type.startsWith('image/')) {
                    alert('Only image files are allowed!');
                    return;
                }

                // Add file to the DataTransfer object
                uploadedFiles.items.add(file);

                const imgWrapper = document.createElement('div');
                imgWrapper.className = 'position-relative d-inline-block m-2';

                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.className = "img-thumbnail";
                img.style.maxWidth = "200px";
                img.style.maxHeight = "200px";
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

            // Rebuild the DataTransfer object excluding the removed file
            Array.from(uploadedFiles.files).forEach((file, i) => {
                if (i !== index) {
                    newDataTransfer.items.add(file);
                }
            });

            uploadedFiles = newDataTransfer;
            fileInput.files = uploadedFiles.files; // Update the file input

            // Remove image from preview
            imgWrapper.remove();

            // Show message if no files are left
            if (uploadedFiles.files.length === 0) {
                dropbox.innerHTML = `<p>Drag & Drop images here or click to upload</p>`;
            }
        }
    });
</script>
@endpush