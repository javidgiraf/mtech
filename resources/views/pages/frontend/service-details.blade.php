@extends('layouts.frontend.main')

@section('content')


    <!-- ======================
            BANNER AREA START   
         ====================== -->
    @if($servicesCount > 0) 
    <section class="hero-area serv-details">
        <!-- Banner Image -->
        <div class="serv-banner">  
            <img src="{{ asset('storage/services/'. $service->image) }}" alt="service">
            <h4> {{ $service->title }} </h4>
        </div>
        <!-- Banner Image -->
    </section>
    <!-- ======================
             BANNER AREA END   
         ====================== -->

    <!-- ==============================
            SERVICE IMAGES AREA START   
        =============================== -->
    <section class="service-images-area">
        <div class="container">
            <!-- Images -->
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-10 col-sm-12">
                    {!! $service->content !!}
                </div>
                @foreach ($service->serviceImages as $serviceImage)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="service-img-box">
                        <a data-fancybox="gallery" href="{{ asset('storage/serviceImages/'. $serviceImage->image) }}">
                            <img src="{{ asset('storage/serviceImages/'. $serviceImage->image) }}" alt="service">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Images -->

        </div>
    </section>
    <!-- ==============================
            SERVICE IMAGES AREA END   
        =============================== -->

    <!-- ========================================
            SERVICE APPLICATION VIDEO AREA START   
         ======================================== -->

    <section class="service-application-video-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="service-application-video-heading">
                        <h4> Application Videos </h4>
                    </div>
                </div>
            </div>
            <!-- Application Video -->
            <div class="row video-box">
                <!-- 1 -->
                @foreach ($service->serviceVideos as $serviceVideo)
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <div class="video-application">
                        <img src="{{ asset('assets/frontend/img/service/video-bg.jpg') }}" alt="youtube">
                        <!-- video popup -->
                        <a href="{{ $serviceVideo->video_url }}" class="video-play-btn1 popup-video">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <!--// video popup -->
                    </div>
                    <div class="video-title">
                        <h6> <a href="#"> {{ $serviceVideo->title }} </a> </h6>
                    </div>
                </div>
                @endforeach
                <!-- 1 -->


            </div>
            <!-- Application Video -->
            <div class="row">
                <div class="col-md-12">
                    {!! $service->description !!}
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- ========================================
            SERVICE APPLICATION VIDEO AREA END   
         ======================================== -->

@endsection