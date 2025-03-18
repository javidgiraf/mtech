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
    <h1>{{ __('Edit Project') }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">{{ __('Projects') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Edit') }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body mt-4">



                    <form class="row g-3" action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" id="projectForm">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="title" class="form-label">{{ __('Title') }} <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="{{ __('Title') }}" value="{{ old('title', $project->title) }}">
                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="sub_title" class="form-label">{{ __(key: 'Sub Title') }}</label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="{{ __('Sub Title') }}" value="{{ old('sub_title', $project->sub_title) }}">
                        </div>
                        <div class="col-6">
                            <label for="sector" class="form-label">{{ __(key: 'Choose Sector') }}</label>
                            <select name="sector_id" id="sector_id" class="form-control @error('sector_id') is-invalid @enderror">
                                <option value="">Choose Sector</option>
                                @foreach($sectors as $sector)
                                    <option {{ old('sector_id', $project->sector_id) == $sector->id ? 'selected' : '' }} value="{{ $sector->id }}">{{ $sector->title }}</option>
                                @endforeach
                            </select>
                            @error('sector_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="client" class="form-label">{{ __(key: 'Choose Client') }}</label>
                            <select name="client_id" id="client_id" class="form-control  @error('client_id') is-invalid @enderror">
                                <option value="">Choose Client</option>
                                @foreach($clients as $client)
                                <option {{ old('client_id', $project->client_id) == $client->id ? 'selected' : '' }} value="{{ $client->id }}">{{ $client->client_name }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div id="dropbox" class="dropbox my-4">
                                <p>Drag & Drop images here or click to upload</p>
                                <input type="file" name="image" id="fileInput" accept="image/*" hidden>
                                @if($project->image)
                                <div class="position-relative d-inline-block m-2">
                                    <img src="{{ asset('storage/projects/'. $project->image) }}" class="img-thumbnail" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    <button onclick="$(this).parent().remove();" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" style="border-radius: 50%;">×</button>
                                </div>
                                @endif
                                
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
                            <label for="description" class="col-form-label">{{ __('Description') }} <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="tinymce-editor @error('description') is-invalid @enderror">
                                {!! old('description', $project->description) !!}
                            </textarea>
                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="year-of-completion" class="form-label">{{ __('Year of completion') }} <span class="text-danger">*</span></label>
                            <input type="date" name="year_of_completion" id="year_of_completion" class="form-control @error('year_of_completion') is-invalid @enderror" placeholder="{{ __('Year of Completion') }}" value="{{ old('year_of_completion', date('Y-m-d', strtotime($project->year_of_completion))) }}">
                            @error('year_of_completion')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-9">
                            <label for="location" class="form-label">{{ __('Location') }} <span class="text-danger">*</span></label>
                            <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" placeholder="{{ __('Location') }}" value="{{ old('location', $project->location) }}">
                            @error('location')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btnSave ml-2">{{ __('Update') }}</button>

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
        $("#sector_id").select2({
            placeholder: "Choose Sector",
            allowClear: true
        });

        $("#client_id").select2({
            placeholder: "Choose Sector",
            allowClear: true
        });

        const dropbox = document.getElementById('dropbox');
        const fileInput = document.getElementById('fileInput');
        let projectImages = "{{ $project->projectImages->pluck('image') }}";

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