@extends('layouts.frontend.main')

@section('content')
    <!-- ======================
            BANNER AREA START   
         ====================== -->
    <section class="page-banner-area career-hero">
        <!-- Page Banner -->
        <div class="page-banner">
            <h1> Build your career with M-Tech </h1>
        </div>
        <!-- Page Banner -->
    </section>
    <!-- ======================
             BANNER AREA END   
         ====================== -->
    <!-- ===========================
           CAREER FIRST AREA START   
         =========================== -->
    <section class="career-first-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-6 col-md-12">
                    <h2> Build the future. Leave a legacy. Love what you do. </h2>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-12 career-first-content">
                    <h5> At M-TECH, we build careers that thrive. </h5>
                    <h6> Unmatched opportunities. Global impact. Join M-TECH. </h6>
                    <p> Build your career on a global stage. At M-TECH, you'll join a diverse team of experts tackling
                        challenging projects
                        across industries. We offer unmatched opportunities for growth with approachable leaders and a
                        collaborative
                        environment. Make a real difference for clients and communities – join us! </p>
                </div>
            </div>
        </div>
    </section>
    <!-- =========================
               CLIENT FIRST AREA END   
             ========================= -->
    <!-- =========================
            REGION AREA START   
         ========================= -->
    <section class="region-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-7 col-md-8 col-sm-12">
                    <div class="region-content-box">
                        <h2> The regions we work in </h2>
                        <p> Building Everywhere, Together </p>

                        <p> We have a mobile workforce of over 500, collaborating across regions to deliver best
                            practices on every project. </p>
                        <ul>
                            <li>
                                <h5> 2000+ Projects </h5>
                                <h6> 6 Countries </h6>
                            </li>
                            <li>
                                <h5> 500+ People </h5>
                                <h6> One Team </h6>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8"></div>
            </div>
        </div>
    </section>
    <!-- =========================
            REGION AREA END   
         ========================= -->

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
                                <h5 class="title"> We maintain authenticity </h5>
                                <p class="paragraph"> We are straightforward, transparent, and practical. </p>
                                <p class="paragraph"> Our commitment is genuine, ensuring delivery of our promises. </p>

                                <h5 class="title"> We invest in our people</h5>
                                <p class="paragraph"> We demonstrate respect, inclusivity, and care for our team and
                                    community, fostering an environment where everyone can flourish with empowerment and
                                    support. </p>

                                <h5 class="title"> We thrive on collaboration </h5>
                                <p class="paragraph"> Uniting individuals to forge impactful connections. Our
                                    consultative approach ensures responsiveness from inception. </p>

                                <h5 class="title"> Challenges fuel us </h5>
                                <p class="paragraph"> We are motivated, practical, and adaptable minds, always embracing
                                    new knowledge and avenues.
                                    With the audacity to tackle the toughest challenges that stump others, and the
                                    resilience to see it through. </p>

                            </div>
                        </div>
                        <div class="tab-bar-content" id="item-2">
                            <div class="texts">
                                <h4 class="title"> Challenges fuel us </h4>
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
    <!-- ==========================
            WHY M-TECH AREA START   
         ========================== -->
    <section class="why-mTech-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-6 col-md-6 col-sm-12">
                    <div class="why-mTech-pic">
                        <img src="{{ asset('assets/frontend/img/why-mtech/why-mTech.jpg') }}" alt="why-mTech">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 why-mTech-content">
                    <h2> Why M-TECH </h2>
                    <h5> What sets M-TECH apart? </h5>

                    <p> At M-TECH, teamwork and collaboration form the cornerstone of our operations. We take pride in
                        fostering an open, hands-on culture where individuals feel empowered to seek assistance and
                        extend
                        help to others in return.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================
            WHY M-TECH AREA END   
         ======================== -->
    <!-- =================================
            JOB OPERTUNITIES AREA START   
         ================================ -->
    <section class="job-opportunities-area">
        <div class="container opportunities-box">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 job-opportunities-content">

                    <h2> Job opportunities </h2>
                    <p>Being a rapidly growing business with a wide array of projects spanning various sectors, we
                        provide unparalleled opportunities and experiences. Join us to embark on a transformative
                        and purposeful career journey.</p>
                    <!-- Button -->
                    <a href="{{ route('career-form') }}" class="btn btn-lg">
                        <span> Opportunities </span>
                    </a>
                    <!-- Button -->

                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 p-0">
                    <div class="job-opportunities-pic">
                        <img src="{{ asset('assets/frontend/img/job-opportunities/job-opportunities.jpg') }}" alt="Opportunities">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==============================
            JOB OPERTUNITIES AREA END   
         ============================== -->
@endsection