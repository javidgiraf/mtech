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
                    <h1> {{ $blog->title }} </h1>
                    <!-- <p>
                        {!! $blog->description !!}
                    </p> -->
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
            <div class="row justify-content-center">

                <!-- blog -->
                <div class="col-xl-8 col-lg-10 col-md-10 col-sm-12">
                    <div class="blog-box">
                        <img class="blog-box-logo" src="{{ asset('assets/frontend/img/m-tech-logo.png') }}" alt="blog">
                        <a>
                            <div class="box">
                                <img src="{{ asset('storage/blogs/'. $blog->image) }}" alt="blog">
                                <!-- <div class="blog-title">
                                   
                                </div> -->
                            </div>
                        </a>
                    </div>
                </div>
                <!-- blog -->

                <div class="col-xl-8 blog-details-content text-center">
                    <p>
                        {!! strip_tags($blog->description) !!}
                    </p>
                </div>




            </div>
        </div>
    </section>
    <!-- ===========================
               blogs AREA START   
         =========================== -->

@endsection
 