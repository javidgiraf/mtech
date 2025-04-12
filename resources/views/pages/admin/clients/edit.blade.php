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
    <h1>{{ __('Edit Client') }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.clients.index') }}">{{ __('Clients') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Edit') }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body mt-4">



                    <form class="row g-3" action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="client_name" class="form-label">{{ __('Client Name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="client_name" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name', $client->client_name) }}" placeholder="{{ __('Client Name') }}" value="{{ old('client_name') }}">
                            @error('client_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- <div class="d-flex justify-content-center">
                            <div class="col-4">
                                <div class="card showPhotoCard">
                                    <div class="card-body mt-3">
                                        <img src="{{ $client->getLogoUrl() }}" class="d-block w-100 imgPreview">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-12">
                            <div id="dropbox" class="dropbox my-4">
                                <p>Drag & Drop images here or click to upload</p>
                                <input type="file" class="@error('logo') is-invalid @enderror" name="logo" id="fileInput" accept="image/*" hidden>
                                <div class="position-relative d-inline-block m-2">
                                    <img src="{{ $client->getLogoUrl() }}" class="img-thumbnail" style="max-width: 300px; max-height: 300px; object-fit: cover;">
                                    <button onclick="$(this).parent().remove();" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" style="border-radius: 50%;">×</button>
                                </div>
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
                            @error('logo')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="sector" class="form-label">{{ __(key: 'Choose Sector') }}</label>
                            <select name="sector_id" id="sector_id" class="form-control @error('sector_id') is-invalid @enderror">
                                <option value="">Choose Sector</option>
                                @foreach($sectors as $sector)
                                <option {{ old('sector_id', $client->sector_id) == $sector->id ? 'selected' : '' }} value="{{ $sector->id }}">{{ $sector->title }}</option>
                                @endforeach
                            </select>
                            @error('sector_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="website" class="col-form-label">{{ __('Website') }} <span class="text-danger">*</span></label>
                            <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website', $client->website) }}">
                                
                            
                            @error('website')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="location" class="col-form-label">{{ __('Location') }} <span class="text-danger">*</span></label>
                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $client->location) }}">
                                
                            
                            @error('location')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary ml-2">{{ __('Update') }}</button>

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
            placeholder: 'Choose Sector',
            allowClear: true
        });

        $('.showPhotoCard').addClass('d-none');
        $(document).on('change', '.photoInput', function(event) {
            var file = event.target.files[0];

            if (file) {
                $('.showPhotoCard').removeClass('d-none');
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".imgPreview").attr("src", e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
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
    });
</script>
@endpush