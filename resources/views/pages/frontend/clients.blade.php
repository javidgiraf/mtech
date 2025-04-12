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
                    <h1> Trusted Clients </h1>
                    <p> We take pride in showcasing the esteemed clients we've had the privilege to work with. From
                        renowned
                        corporations to local businesses, our diverse portfolio reflects our commitment to excellence
                        and
                        customer satisfaction. Each project represents a collaborative journey, where we've had the
                        opportunity
                        to bring our clients' visions to life. We invite you to explore our client testimonials and
                        success
                        stories, and discover why MTECH Constructions is the trusted choice for construction solutions.
                    </p>
                </div>
            </div>

        </div>
        <!-- Page Banner -->
    </section>
    <!-- ======================
             BANNER AREA END   
         ====================== -->


    <!-- ============================
            CLIENTS MAIN AREA START   
         ============================ -->
    @if($clientsCount > 0)     
    <section class="clients-main-area">
        <div class="container">
            <!-- Search box -->
            <div class="row">
                <div class="col-md-12">
                    <div class="clients-search-box">

                    </div>
                </div>
            </div>
            <!-- Search box -->
            <div class="row">
                @foreach($clients as $client)
                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                    <div class="clients-box-pic">
                        <img src="{{ $client->getLogoUrl() }}" alt="logo">
                    </div>
                    <div class="client-box-cnt">
                        <h5> {{ $client->client_name }} </h5>
                        <h5> {{ $client->sector->title }} </h5>
                        <h5> {{ $client->location }} </h5>
                    </div>
                </div>
                @endforeach
                

            </div>
        </div>
    </section>
    @endif
    <!-- ============================
            CLIENTS MAIN AREA END   
         ============================ -->
    <!-- ============================
            TESTIMONIALS AREA START   
         ============================ -->
    @if($testimonialsCount > 0)     
    <section class="testimonial-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 col-xl-9 col-xl-9">

                    <div class="swiper testimonialSwiper">
                        <h2 class="testi-head"> Testimonials </h2>
                        <div class="swiper-wrapper">

                            <!-- 1 -->
                             @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial-main-box">
                                    <div class="testimonial-pic">
                                        <img src="{{ $testimonial->getPhotoUrl() }}" alt="testimonials">
                                    </div>
                                    <div class="testimonial-content">
                                        <h4> {{ $testimonial->author_name }} </h4>
                                        <p> 
                                            {!! $testimonial->content !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- 1 -->

                           

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================
            TESTIMONIALS AREA END   
         ============================ -->
@endsection
