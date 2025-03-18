@extends('layouts.main')

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
                        <div class="d-flex justify-content-center">
                            <div class="col-4">
                                <div class="card showPhotoCard">
                                    <div class="card-body mt-3">
                                        <img src="{{ $client->getLogoUrl() }}" class="d-block w-100 imgPreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="logo" class="col-form-label">{{ __('Upload Logo') }} <span class="text-danger">*</span></label>
                            <input class="form-control photoInput @error('logo') is-invalid @enderror" type="file" name="logo">
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
    });
</script>
@endpush