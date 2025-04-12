@extends('layouts.frontend.main')
@push('css')
<style>
    #loader {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
    }

    .spinner {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
@endpush

@section('content')
@include('pages.frontend.alerts.messages')
<!-- ======================
            HERO AREA START   
         ====================== -->
<section class="banner-area">
    <!-- Banner Video -->
    <video class="banner-video" src="{{ asset('assets/frontend/video/banner-video.mp4') }}" autoplay muted loop> </video>
    <!-- Banner Video -->

    <!-- Banner Slider -->
    <div class="swiper sliderSwiper">
        <div class="swiper-wrapper">

            <!-- Slide 1 -->
            <div class="swiper-slide">
                <div class="slider-content">
                    <h1> Building the <br>
                        future </h1>
                </div>
            </div>
            <!-- Slide 1 -->

            <!-- Slide 2 -->
            <div class="swiper-slide">
                <div class="slider-content">
                    <h1> Building the <br>
                        future </h1>
                </div>
            </div>
            <!-- Slide 2 -->

            <!-- Slide 3 -->
            <div class="swiper-slide">
                <div class="slider-content">
                    <h1> Building the <br>
                        future </h1>
                </div>
            </div>
            <!-- Slide 3 -->


        </div>
        <div class="swiper-pagination"></div>
        <div class="autoplay-progress">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div>
    </div>
    <!-- Banner Slider -->

    <!-- Social Media -->
    <div class="social-media">
        <ul>
            <li> <a href="#"> <i
                        class="fa-brands fa-linkedin"></i> </a> </li>
            <li> <a href="#"> <i class="fa-brands fa-facebook"></i>
                </a> </li>
            <li> <a href="#"> <i
                        class="fa-brands fa-instagram"></i> </a> </li>
            <li> <a href="#"> <i
                        class="fa-brands fa-youtube"></i> </a> </li>

        </ul>
    </div>
    <!-- Social Media -->
    <!-- scroll down arrow -->
    <div class="scroll-down" onclick="scrollDown()">
        <span></span>
    </div>
    <!-- scroll down arrow -->
</section>
<!-- ======================
            HERO AREA END   
         ====================== -->



<!-- ======================
            ABOUT AREA START   
         ====================== -->
<section class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-6 col-md-12 col-12 about-image">
                <img src="{{ asset('assets/frontend/img/about-1.jpg') }}" alt="about">
                <img src="{{ asset('assets/frontend/img/about-2.jpg') }}" alt="about">
            </div>
            <div class="col-xl-5 col-lg-6 col-md-12 col-12 about-content">
                <h2> About Us </h2>
                <p> MTECH Construction Solutions LLC is a recognized leader in the Middle East market, specializing
                    in the supply of Automatic Jumpform System that uses electronic screw-jacks which are safer,
                    more accurate, cleaner, and more environmentally friendly that hydraulic alternatives and the
                    system enables faster construction on any shape of floor plan, while minimizing personnel
                    requirements maximizing productivity.</p>
                <img src="{{ asset('assets/frontend/img/iso.jpg') }}" alt="iso certified">
                <!-- Button -->
                <a href="{{ route('about-us') }}" class="btn btn-lg">
                    <span> View More </span>
                </a>
                <!-- Button -->
            </div>
        </div>
    </div>
</section>
<!-- ======================
            ABOUT AREA END   
         ====================== -->


<!-- ======================
           PRODUCTS AREA START   
         ====================== -->
@if($productsCount > 0)
<section class="products-area">
    <div class="container">
        <h2 class="section-title"> Our Product </h2>
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12 product-home-box">
                <div class="product-pic">
                    <a href="{{ route('product-details') }}">
                        <div class="box">
                            <img src="{{ asset('storage/products/'. $product->image) }}" alt="products">
                            <div class="box-content">
                                <div class="content">
                                    <ul class="icon">
                                        <li><span href="#"><i class="fa fa-search"></i></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="product-content">
                    <h4>{{ $product->title }}</h4>
                    <!-- Button -->
                    <a href="{{ route('product-details') }}" class="btn btn-lg">
                        <span> View More </span>
                    </a>
                    <!-- Button -->
                </div>

            </div>
        </div>


    </div>
</section>
@endif
<!-- ======================
            PRODUCTS AREA END   
         ====================== -->
<!-- ======================
            SECTOR AREA START   
         ====================== -->
@if($sectorsCount > 0)
<section class="sector-area">
    <div class="container">
        <h2 class="section-title"> Industry we serve</h2>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-10 col-sm-12 sector-home-box">
                <div class="sector-pic">
                    <a>
                        <div class="box">
                            <img src="{{ ($sector || $sector->image) ? asset('storage/sectors/'. $sector->image) : asset('assets/img/empty-image.jpg') }}" alt="sector">

                        </div>
                    </a>
                </div>

                <div class="sector-content">
                    <h4> {{ $sector->title }} </h4>
                    <p>{!! $sector->description !!}</p>

                </div>

            </div>
        </div>


    </div>
</section>
@endif
<!-- ======================
            SECTOR AREA END   
         ====================== -->


<!-- ==================================
            REQUEST QUOTATION AREA START   
         ================================== -->
<section class="request-quotation-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 mx-auto">
                <div class="request-quotation-box">
                    <h3> Request for Quotation </h3>
                    <!-- Button -->
                    <a href="#" class="btn btn-lg" data-toggle="modal" data-target="#exampleModalCenter">
                        <span> View More </span>
                    </a>
                    <!-- Button -->
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close rq" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- body -->
                    <div class="career-form-area">
                        <div class="career-form request-qt">
                            <h2> Request Form </h2>
                            <p> Feel free to use the contact form below or reach out to us directly via phone or
                                email. We look forward to hearing from you and beginning a conversation about how we
                                can assist you with your construction needs.
                            </p>


                            <div class="career-form-box">
                                <form id="contact" class="interest_send" action="{{ route('sendContactMail') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-bg">
                                        <div class="form-container">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-5 col-lg-5 col-md-10 form-group">
                                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                                </div>

                                                <div class="col-xl-5 col-lg-5 col-md-10 form-group">
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Email" required>
                                                </div>
                                                <div class="col-xl-5 col-lg-5 col-md-10 form-group">
                                                    <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                                                </div>
                                                <div class="col-xl-5 col-lg-5 col-md-10 form-group city">
                                                    <div class="form-group">
                                                        <label>City</label>
                                                        <select class="form-control" name="location" required>
                                                            <option value="paris">Paris</option>
                                                            <option value="new york">New York</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-10 col-md-10 form-group city">
                                                    <div class="form-group">
                                                        <label>Job Code</label>
                                                        <select class="form-control" name="job_code" required>
                                                            <option value="">Select Job Code</option>
                                                            @foreach($careers as $career)
                                                            <option value="{{ $career->job_code }}">{{ $career->job_code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-10 col-md-10 form-group"><i
                                                        class="fas fa-file"></i>
                                                    <input type="file" class="form-control" id="resume"
                                                        name="resume" accept=".pdf" placeholder=""><br>
                                                    <label style="color:white">(Laden Sie Ihren Lebenslauf oder
                                                        Lebenslauf unter 3 MB hoch)</label>

                                                </div>

                                                <div class="col-md-10 form-group">
                                                    <textarea name="message" class="form-control" rows="4" cols="120"
                                                        placeholder="Message" required></textarea>

                                                </div>
                                            </div>
                                            <input type="hidden" name="subject" value="Quotation Enquiry">

                                            <!-- Button -->
                                            <button type="submit" id="btnSubmit" class="btn btn-lg mx-auto d-flex"><span>
                                                    SUBMIT</span></button>
                                            <!-- Button -->


                                        </div>
                                    </div>
                                </form>

                                <div id="loader" style="display: none;">
                                    <div class="spinner"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- body -->
                </div>

            </div>
        </div>
    </div>
    <!-- modal -->
</section>
<!-- ==================================
            REQUEST QUOTATION AREA END   
         ================================== -->


<!-- ===========================
            OUR SERVICE AREA START   
         =========================== -->
@if($servicesCount > 0)
<section class="service-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-10 col-sm-12 service-home-box">
                <div class="service-pic">
                    <a href="{{ route('service-details') }}">
                        <div class="box">
                            <h5> {{ $service->title }} </h5>
                            <img src="{{ asset('storage/services/'. $service->image) }}" alt="service">
                            <div class="box-content">
                                <div class="content">
                                    <ul class="icon">
                                        <li><span href="#"><i class="fa fa-search"></i></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="service-content">
                    <h2> Our Service </h2>
                    <p> {!! Illuminate\Support\Str::limit($service->content, 200) !!} </p>
                    <!-- Button -->
                    <a href="{{ route('service-details') }}" class="btn btn-lg">
                        <span> View More </span>
                    </a>
                    <!-- Button -->

                </div>

            </div>
        </div>


    </div>
</section>
@endif
<!-- =========================
            OUR SERVICE AREA END   
         ========================= -->


<!-- ======================
            FAQ AREA START   
         ====================== -->
@if($faqsCount > 0)
<section class="faq-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="faq-content-box">
                    <h2> What Sets Us Apart </h2>
                    <p> MTECH employs a capable, qualified, and motivated management team to provide
                        excellent services to its clients. Our team are considered experts in the
                        field and understand construction methodologies, programming, and cost
                        constraints, enabling them to deliver value-driven solutions in sync
                        with the Client’s objectives.We maintain the highest standards,
                        apply diligence, pay attention to the details, and ensure best
                        practice and a high level of customer service.

                    </p>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="faq-box">
                    <h2> FAQ </h2>
                    <!-- faq -->
                    <div id="accordion">
                        @foreach($faqs as $faq)
                        <div class="accordion">
                            <input type="radio" name="radacc" class="accordian-chk" checked />
                            <h4 class="accordian-header active">
                                {{ $faq->question }}

                                <span class="acc-icon"></span>
                            </h4>
                            <div class="accordian-content" tabindex="2">

                                <p>
                                    {!! $faq->answer !!}

                                </p>


                            </div>
                        </div>
                        @endforeach


                    </div>

                    <!-- faq -->
                </div>
            </div>

        </div>
    </div>
</section>
@endif
<!-- ======================
            FAQ AREA END   
         ====================== -->



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
                                    <img src="{{ asset('storage/testimonials/'. $testimonial->photo) }}" alt="testimonials">
                                </div>
                                <div class="testimonial-content">
                                    <h4> {{ $testimonial->author_name }} </h4>
                                    <p>
                                        {!! strip_tags($testimonial->content) !!}
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
@endif
<!-- ============================
            TESTIMONIALS AREA END   
         ============================ -->

<!-- =========================
            CLIENTS AREA START   
         ======================== -->
@if($clientsCount > 0)
<section class="clients-area">
    <div class="client-box">
        <div class="row">
            <div class="col-lg-12">
                <div class="clients-logo">
                    <div class="swiper clientSwiper">
                        <div class="swiper-wrapper">
                            <!-- slide -->
                            @foreach($clients as $client)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/clients/'. $client->logo) }}" alt="logo" />
                            </div>
                            @endforeach
                            <!-- slide -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- ======================
            CLIENTS AREA END   
         ====================== -->
<!-- ======================
            BLOGS AREA START   
         ====================== -->
@if($blogsCount > 0)         
<section class="blogs-area">
    <div class="row blogs-row">
        <div class="col-xl-2 col-lg-4 col-md-12">
            <div id="recent-blogs" class="recent-blogs-box">
                @foreach($blogs as $blog)
                <div class="recent-blog">
                    <!-- post slide -->
                    <div class="post-slide">

                        <div class="pic">
                            <img src="{{ asset('storage/blogs/'. $blog->image) }}" alt="blog">
                            <div class="post-category">
                                <h6> {{ $blog->title }} </h6>
                            </div>
                        </div>

                    </div>
                    <!-- post slide -->
                </div>
                @endforeach

            </div>
        </div>
        <div class="col-xl-5 col-lg-8 col-md-12">
            <div id="recent-blogs" class="latest-blog-box">
                <div class="latest-blog">
                    <!-- post slide -->
                    <div class="post-slide">

                        <div class="pic">
                            <img src="{{ asset('storage/blogs/'. $latestBlog->image) }}" alt="blog">
                            <div class="post-category">
                                <h5> {{ $latestBlog->title }} </h5>
                            </div>
                        </div>

                    </div>
                    <!-- post slide -->
                    <!-- <img src="./img/blogs/blog-3.png" alt="blog">
                        <h5> Significant milestone achieved at One Leadenhall, in the City of London </h5> -->
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-12 col-md-12 blg">
            <div class="blog-content-box">
                <h2> Blogs </h2>
                <div class="blog-content">
                    <h4> {{ $latestBlog->title }} </h4>
                    <p> {!! Illuminate\Support\Str::limit($latestBlog->description, 200) !!} </p>
                    <!-- Button -->
                    <a href="{{ route('blogs') }}" class="btn btn-lg">
                        <span> View More </span>
                    </a>
                    <!-- Button -->
                </div>
            </div>
        </div>
    </div>


</section>
@endif
<!-- ======================
            BLOGS AREA END   
         ====================== -->
@endsection

@push('scripts')
<!-- @if($message = session()->get('success'))
<script>
    setTimeout(() => {
        toastr.success("{{ $message }}");
    }, 2000);
</script>
@endif -->
<script>
    document.getElementById('contact').addEventListener('submit', function() {
        document.getElementById('btnSubmit').disabled = true; // Optional: disable button
        document.getElementById('loader').style.display = 'block';
    });
</script>
@endpush