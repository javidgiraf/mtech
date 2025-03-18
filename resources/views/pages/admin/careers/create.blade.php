@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>{{ __('Create Career') }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.careers.index') }}">{{ __('Careers') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Create') }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body mt-4">



                    <form class="row g-3" action="{{ route('admin.careers.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <label for="position" class="form-label">{{ __('Position') }} <span class="text-danger">*</span></label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="{{ __('Position') }}" value="{{ old('position') }}">
                            @error('position')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="discipline" class="form-label">{{ __(key: 'Discipline') }}</label>
                            <input type="text" name="discipline" class="form-control @error('discipline') is-invalid @enderror" placeholder="{{ __('Discipline') }}" value="{{ old('discipline') }}">
                            @error('discipline')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-12">
                            <label for="job_type" class="col-form-label">{{ __('Job Type') }} <span class="text-danger">*</span></label>
                            <select class="form-control @error('job_type') is-invalid @enderror" name="job_type">
                                <option value="">Select Job Type</option>
                                <option {{ old('job_type') == App\Models\Career::JOBTYPE_PARTTIME ? 'selected' : '' }} value="{{ App\Models\Career::JOBTYPE_PARTTIME }}">{{ App\Models\Career::JOBTYPE_PARTTIME }}</option>
                                <option {{ old('job_type') == App\Models\Career::JOBTYPE_FULLTIME ? 'selected' : '' }} value="{{ App\Models\Career::JOBTYPE_FULLTIME }}">{{ App\Models\Career::JOBTYPE_FULLTIME }}</option>        
                            </select>
                            @error('job_type')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="location" class="col-form-label">{{ __('Location') }} <span class="text-danger">*</span></label>
                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">
                            
                            @error('location')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
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
    });
</script>
@endpush