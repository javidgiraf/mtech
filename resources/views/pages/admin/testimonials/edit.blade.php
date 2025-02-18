@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>{{ __('Update Testimonial') }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">{{ __('Testimonials') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Edit') }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body mt-4">



                    <form class="row g-3" action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="title" class="form-label">{{ __('Title') }} <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="{{ __('Title') }}" value="{{ old('title', $testimonial->title) }}">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="author_name" class="form-label">{{ __(key: 'Author Name') }}</label>
                            <input type="text" name="author_name" class="form-control" placeholder="{{ __('Author Name') }}" value="{{ old('author_name', $testimonial->author_name) }}">
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="col-5">
                                <div class="card">
                                    <div class="card-body mt-3">
                                        <img src="{{ $testimonial->getPhotoUrl() }}" class="d-block w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="photo" class="col-form-label">{{ __('Upload Photo') }} <span class="text-danger">*</span></label>
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo">
                            @error('photo')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="designation" class="form-label">{{ __(key: 'Designation') }}</label>
                            <input type="text" name="designation" class="form-control" placeholder="{{ __('Designation') }}" value="{{ old('designation', $testimonial->designation) }}">
                        </div>
                        <div class="col-12">
                            <label for="company_name" class="form-label">{{ __(key: 'Company Name') }}</label>
                            <input type="text" name="company_name" class="form-control" placeholder="{{ __('Company Name') }}" value="{{ old('company_name', $testimonial->company_name) }}">
                        </div>
                        <div class="col-12">
                            <label for="content" class="col-form-label">{{ __('Content') }} <span class="text-danger">*</span></label>
                            <textarea name="content" class="tinymce-editor @error('content') is-invalid @enderror">
                                {!! old('content', $testimonial->content) !!}
                            </textarea>
                            @error('content')
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