@extends('layouts.frontend.main')

@section('content')

    <!-- ======================
            BANNER AREA START   
         ====================== -->
    <section class="page-banner-area client-hero">
        <!-- Page Banner -->
        <div class="page-banner">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 text-center">
                    <h1> Blogs </h1>
                    
                </div>
            </div>

        </div>
        <!-- Page Banner -->
    </section>
    <!-- ======================
             BANNER AREA END   
         ====================== -->
    <!-- ===========================
               blogs AREA START   
         =========================== -->

    <section class="blog-page-area">
        <div class="container">
            <div class="row">

                <!-- blog -->
                @if($blogsCount > 0) 
                @foreach($blogs as $blog) 
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-box">
                        <img class="blog-box-logo" src="{{ asset('assets/frontend/img/m-tech-logo.png') }}" alt="blog">
                        <a href="{{ route('blog-details', $blog->id) }}">
                            <div class="box">
                                <img src="{{ asset('storage/blogs/'. $blog->image) }}" alt="blog">
                                <div class="blog-title">
                                    <h4> {{ $blog->title }} </h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- blog -->

                
            </div>
        </div>
    </section>
    <!-- ===========================
               blogs AREA START   
         =========================== -->

@endsection