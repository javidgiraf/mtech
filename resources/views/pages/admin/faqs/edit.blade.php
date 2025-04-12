@extends('layouts.main')

@section('content')
<div class="pagetitle">
    <h1>{{ __('Edit Faq') }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.faqs.index') }}">{{ __('Faqs') }}</a></li>
            <li class="breadcrumb-item active">{{ __('Edit') }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body mt-4">



                    <form class="row g-3" action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="question" class="form-label">{{ __('Question') }} <span class="text-danger">*</span></label>
                            <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" placeholder="{{ __('Question') }}" value="{{ old('question', $faq->question) }}">
                            @error('question')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-12">
                            <label for="answer" class="col-form-label">{{ __('Answer') }} <span class="text-danger">*</span></label>
                            <textarea name="answer" class="tinymce-editor @error('answer') is-invalid @enderror">
                                {!! old('answer', $faq->answer) !!}
                            </textarea>
                            @error('answer')
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

