@extends('layouts.frontend.main')

@section('content')

    <!-- ======================
            BANNER AREA START   
         ====================== -->
    <section class="hero-area">
        <!-- Banner Video -->
        <video class="hero-video" src="{{ asset('assets/frontend/video/banner-video.mp4') }}" autoplay muted loop> </video>
        <!-- Banner Video -->
    </section>
    <!-- ======================
             BANNER AREA END   
         ====================== -->

    <!-- ======================
            COUNT AREA START   
         ====================== -->
    <section class="count-area">
        <div class="container">
            <div class="row counterbox">

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="counter">
                        <span class="count">2000</span> <span class="plus"> + </span>
                    </div>
                    <h5> Projects </h5>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="counter">
                        <span class="count">5000</span> <span class="plus"> + </span>
                    </div>
                    <h5> Satisfied Clients </h5>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="counter">
                        <span class="count">50</span> <span class="plus"> + </span>
                    </div>
                    <h5> Countries </h5>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="counter">
                        <span class="count">520</span> <span class="plus"> + </span>
                    </div>
                    <h5> Operating employees </h5>
                </div>

            </div>
        </div>
    </section>

    <!-- ==========================
             WHO WE ARE AREA START   
         =========================== -->
    <section class="who-we-are-area">
        <div class="container">
            <div class="row row-box">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <div class="who-we-are-pic">
                        <img src="{{ asset('assets/frontend/img/about/who-we-are.png') }}" alt="who-we-are">
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <div class="who-we-are-content">
                        <h1> Who we are </h1>
                        <p> MTECH Construction Solutions LLC is a recognized leader in the Middle East market,
                            specializing in the supply of Automatic Jumpform System that uses electronic screw-jacks
                            which are safer, more accurate, cleaner, and more environmentally friendly that hydraulic
                            alternatives and the system enables faster construction on any shape of floor plan, while
                            minimizing personnel requirements maximizing productivity.</p>

                        <p> One Company.
                            One Solution.</p>

                        <p> Formed in 2007, MTECH Construction Solutions LLC is a response to the region’s demand for a
                            safe, reliable, and cost-efficient supplier within the Middle East, United Kingdom, and
                            Canada.</p>

                        <p> MTECH offers bespoke solutions for each Client’s Jumpform requirement. We work closely with
                            Client to tailor competitive solutions that drive the best for project outcomes.</p>

                        <p> MTECH employs a capable, qualified, and motivated management team to provide excellent
                            services to its clients. Our team are considered experts in the field and understand
                            construction methodologies, programming, and cost constraints, enabling them to deliver
                            value-driven solutions in sync with the Client’s objectives.</p>

                        <p>One Strengths and Capabilities.</p>

                        <p> We consider ourselves a market leader. Our success comes from having a reliable, high
                            quality, and well maintained fleet of equipment, strong management, and the knowledge of the
                            best solution for each situation. We maintain the highest standards, apply diligence, pay
                            attention to the details, and ensure best practice and a high level of customer service. We
                            provide efficient and safe construction equipment at competitive rates.</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================
             WHO WE ARE AREA END   
         ======================== -->

    <!-- ======================
           TIMELINE AREA START   
         ====================== -->
    <section class="timeline-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title"> Timeline </h2>
                    <p>Here, you'll discover key moments in our company's evolution, from our humble beginnings to our
                        current
                        status as a leader in the field. Join us as we celebrate our achievements, reflect on our
                        growth,
                        and
                        look forward to an exciting future filled with new opportunities and successes. Explore our
                        timeline
                        and
                        witness the legacy of MTECH Constructions unfold before your eyes.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="swiper timelineSwiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="timeline-box">
                                <h5> Started office </h5>
                                <h6> Started operations in UAE </h6>
                            </div>
                            <div class="slider-content">
                                <h5> 2007 </h5>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="timeline-box">
                                <h5> Yard at Umm Al Quwain </h5>
                                <h6> Opened new yard at
                                    Umm Al Quwain </h6>
                            </div>
                            <div class="slider-content">
                                <h5> 2010 </h5>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="timeline-box">
                                <h5> ISO Certifications </h5>
                                <h6> ISO 9001:2015
                                    ISO 14001:2015 </h6>
                            </div>
                            <div class="slider-content">
                                <h5> 2015 </h5>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="timeline-box">
                                <h5> New corporate office </h5>
                                <h6> New Office opened at
                                    Barsha Heights </h6>
                            </div>
                            <div class="slider-content">
                                <h5> 2023 </h5>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="timeline-box">
                                <h5> New corporate office </h5>
                                <h6> New Office opened at
                                    Barsha Heights </h6>
                            </div>
                            <div class="slider-content">
                                <h5> 2023 </h5>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="timeline-box">
                                <h5> New corporate office </h5>
                                <h6> New Office opened at
                                    Barsha Heights </h6>
                            </div>
                            <div class="slider-content">
                                <h5> 2023 </h5>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="timeline-box">
                                <h5> New corporate office </h5>
                                <h6> New Office opened at
                                    Barsha Heights </h6>
                            </div>
                            <div class="slider-content">
                                <h5> 2023 </h5>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>


        </div>
    </section>
    <!-- ======================
                TIMELINE AREA END   
             ====================== -->

    <!-- =========================
                OUR VALUE AREA START   
             ========================= -->
    <section class="our-value-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title"> Our values </h2>
                </div>
            </div>
            <div class="row">
                <!-- tab -->
                <div class="tab">
                    <div class="tab-menu">
                        <button class="tab-menu-link is-active" data-content="item-1">
                            <span data-title="item-1"> We keep it real </span>
                        </button>
                        <button class="tab-menu-link" data-content="item-2">
                            <span data-title="item-2"> We care about people </span>
                        </button>
                        <button class="tab-menu-link" data-content="item-3">
                            <span data-title="item-3"> We are collaborative </span>
                        </button>
                        <button class="tab-menu-link" data-content="item-4">
                            <span data-title="item-4"> We have grit </span>
                        </button>
                    </div>
                    <div class="tab-bar">
                        <div class="tab-bar-content is-active" id="item-1">
                            <div class="texts">
                                <h4 class="title"> Our safety culture is built-in, not bolt-in. </h4>
                                <p class="paragraph">
                                    The M-TECH system is designed to ensure the safety of all personnel. Our clients
                                    benefit from more than 50 years of health and safety expertise. We maintain the
                                    highest standards, apply diligence, pay attention to the details, and ensure best
                                    practices and a high level of customer service.
                                </p>
                            </div>
                        </div>
                        <div class="tab-bar-content" id="item-2">
                            <div class="texts">
                                <h4 class="title">Lorem ipsum dolor sit amet.</h4>
                                <p class="paragraph">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Saepe at sunt veritatis dolorem placeat iusto praesentium maiores natus.
                                    Ratione atque odio magni quaerat rem odio hic velit delectus ipsam aliquam.
                                </p>
                            </div>
                        </div>
                        <div class="tab-bar-content" id="item-3">
                            <div class="texts">
                                <h4 class="title">Lorem ipsum dolor sit amet.</h4>
                                <p class="paragraph">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Similique alias expedita ut unde modi facere repellat tempora.
                                    Aperiam dolores magni quos alias cum inventore molestiae dolorem placeat.
                                </p>
                            </div>
                        </div>
                        <div class="tab-bar-content" id="item-4">
                            <div class="texts">
                                <h4 class="title">Lorem ipsum dolor sit amet.</h4>
                                <p class="paragraph">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Fugiat quo minima officia et ratione eius deserunt modi vel eaque.
                                    Animi provident reprehenderit beatae officiis molestias illum harum fugiat.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tab -->
            </div>
        </div>
        </div>
    </section>
    <!-- ======================
                OUR VALUE AREA END   
             ====================== -->


    <!-- ============================
            CERTIFICATION AREA START   
        ============================ -->
    <section class="certification-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="certification-title">
                        <h2 class="section-title"> Certifications </h2>
                        <p>Some of the key affiliations and registrations of M-TECH Constructions include:</p>
                    </div>
                </div>
            </div>
            <div class="row certification-logos">
                <div class="col-xl-2 col-lg-3 col-md-4 colsm-12 col-6 certification-logo-box">
                    <img src="{{ asset('assets/frontend/img/certificate/certificate-1.png') }}" alt="certification">
                    <p> Member of UAE Contractors Association (UCA) </p>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 colsm-12 col-6 certification-logo-box">
                    <img src="{{ asset('assets/frontend/img/certificate/certificate-2.png') }}" alt="certification">
                    <p> Member of Emirates Green Building Council (Emirates GBC) </p>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 colsm-12 col-6 certification-logo-box">
                    <img src="{{ asset('assets/frontend/img/certificate/certificate-3.png') }}" alt="certification">
                    <p> Dubai Municipality Building Control Commission (BCC) </p>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 colsm-12 col-6 certification-logo-box">
                    <img src="{{ asset('assets/frontend/img/certificate/certificate-4.png') }}" alt="certification">
                    <p> Abu Dhabi Environment, Health, and Safety Center (EHS) </p>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 colsm-12 col-6 certification-logo-box">
                    <img src="{{ asset('assets/frontend/img/certificate/certificate-5.png') }}" alt="certification">
                    <p> ISO 9001:2015 </p>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 colsm-12 col-6 certification-logo-box">
                    <img src="{{ asset('assets/frontend/img/certificate/certificate-6.png') }}" alt="certification">
                    <p> ISO 14001:2015 </p>
                </div>
            </div>

            <div class="row certificate-pics">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="certificate-pic">

                        <a data-fancybox="gallery"
                            href="{{ asset('assets/frontend/img/certificate/ISO-45001-MTECH-Construction-Solutions-LLC.jpg') }}">
                            <img src="{{ asset('assets/frontend/img/certificate/ISO-45001-MTECH-Construction-Solutions-LLC.jpg') }}"
                                alt="certificate">
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="certificate-pic">

                        <a data-fancybox="gallery"
                            href="{{ asset('assets/frontend/img/certificate/ISO-14001-MTECH-Construction-Solutions-LLC.jpg') }}">
                            <img src="{{ asset('assets/frontend/img/certificate/ISO-14001-MTECH-Construction-Solutions-LLC.jpg') }}"
                                alt="certificate">
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="certificate-pic">

                        <a data-fancybox="gallery"
                            href="{{ asset('assets/frontend/img/certificate/ISO-9001-MTECH-Construction-Solutions-LLC.jpg') }}">
                            <img src="{{ asset('assets/frontend/img/certificate/ISO-9001-MTECH-Construction-Solutions-LLC.jpg') }}"
                                alt="certificate">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================
            CERTIFICATION AREA END   
         ========================== -->
 
@endsection