@extends('layouts.frontend.main')

@section('content')

    @if($productsCount > 0)
    <!-- ======================
            BANNER AREA START   
         ====================== -->
    <section class="hero-area product-details">
        <div class="product-details-banner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="product-details-image-box">
                            <a data-fancybox="gallery" href="{{ asset('storage/products/'. $product->image) }}">
                                <img src="{{ asset('storage/products/'. $product->image) }}" alt="product">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 product-details-content-box">
                        <div class="product-details-content">
                            <h1> {{ $product->title }} </h1>
                            <p>
                                {!! $product->content !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ======================
             BANNER AREA END   
         ====================== -->

    <!-- ==================================
            PRODUCT DESCRIPTION AREA START   
        ==================================== -->
    <section class="product-description-area">
        <div class="container">

            <div class="row">
                <!-- Description -->
                <div class="col-md-12">
                    <div class="product-description-box">
                        <h5> Description </h5>
                        {!! $product->description !!}
                    </div>

                </div>
                <!-- Description -->

                <!-- Sectors Used : -->
                <div class="col-md-12">
                    <div class="product-description-box">
                        <h5> Sectors Used : </h5>
                        <ul>
                            @foreach($product->productSectors as $productSector)
                            <li> {{ $productSector->sector->title }} </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <!-- Sectors Used : -->

            </div>
        </div>
    </section>
    <!-- ================================
           PRODUCT DESCRIPTION AREA END   
        ================================= -->

    <!-- =================================
           APPLICATION PHOTOS AREA START   
        ================================== -->
    <section class="product-application-photos-area">
        <div class="container">
            <h4> Application Photos </h4>
            <div class="row">
                <!-- 1 -->
                @foreach($product->productImages as $productImage) 
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-6">
                    <div class="application-photos-box">
                        <a data-fancybox="gallery" href="{{ asset('storage/productImages/'. $productImage->image) }}">
                            <img src="{{ asset('storage/productImages/'. $productImage->image) }}" alt="{{ $productImage->title }}">
                        </a>
                        <h6> {{ $productImage->title }} </h6>
                    </div>
                </div>
                @endforeach
                <!-- 1 -->


            </div>
        </div>
    </section>
    <!-- ================================
           APPLICATION PHOTOS AREA END   
        ================================= -->

    <!-- ========================================
            PRODUCT APPLICATION VIDEO AREA START   
         ======================================== -->

    <section class="product-application-video-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="product-application-video-heading">
                        <h4> Application Videos </h4>
                    </div>
                </div>
            </div>
            <!-- Application Video -->
            <div class="row video-box">
                <!-- 1 -->
                @foreach($product->productVideos as $productVideo) 
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <div class="video-application">
                        <img src="{{ asset('assets/frontend/img/service/video-bg.jpg') }}" alt="youtube">
                        <!-- video popup -->
                        <a href="{{ $productVideo->url }}" class="video-play-btn1 popup-video">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <!--// video popup -->
                    </div>
                    <div class="video-title">
                        <h6> <a href="#"> {{ $productVideo->title }} </a> </h6>
                    </div>
                </div>
                @endforeach
                <!-- 1 -->


            </div>
            <!-- Application Video -->

        </div>
    </section>

    <!-- ========================================
                PRODUCT APPLICATION VIDEO AREA END   
             ======================================== -->
    @endif
@endsection