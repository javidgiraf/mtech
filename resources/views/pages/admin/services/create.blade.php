@extends('layouts.main')

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
                            <label for="image" class="col-form-label">{{ __('Upload Image') }} <span class="text-danger">*</span></label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
                            @error('image')
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