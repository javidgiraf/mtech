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
            BANNER AREA START   
         ====================== -->
    <section class="page-banner-area contact-hero">
        <!-- Page Banner -->
        <div class="page-banner">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 col-md-12 col-sm-12 text-center">
                    <h1> Contact Us </h1>
                    <p> We're thrilled that you're considering reaching out to us. Whether you have questions about our
                        services, want to discuss a potential project, or simply wish to learn more about what we do,
                        we're here to help. Our dedicated team is committed to providing excellent customer service and
                        ensuring that your inquiries are addressed promptly and effectively.</p>
                </div>
            </div>

        </div>
        <!-- Page Banner -->
    </section>
    <!-- ======================
             BANNER AREA END   
         ====================== -->
    <!-- ===========================
               CONTACT AREA START   
         =========================== -->
   <section class="contact-area">
    <div class="container">
        <div class="row justify-content-center">
            <!-- 1 -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="contact-box">
                    <i class="fa-solid fa-location-dot"></i>
                    <h5> Address</h5>
                    <h6> MTECH Head Office <br>

                        The Onyx Tower 2, Room 1113 <br>

                        Level 11, Al Barsha Heights, The Greens <br>

                        PO Box 213081 <br>

                        Dubai, UAE
                    </h6>
                </div>
            </div>
            <!-- 1 -->
            <!-- 1 -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="contact-box">
                    <i class="fa-solid fa-location-dot"></i>
                    <h5> Address</h5>
                    <h6> MTECH UAQ Yard <br>

                        MTECH Central Yard <br>

                        Al Raafh, Plot 1948 <br>

                        PO Box 213081 <br>

                        Umm Al Quwain, UAE
                    </h6>
                </div>
            </div>
            <!-- 1 -->
            <!-- 1 -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="contact-box">
                    <i class="fa-solid fa-at"></i>
                    <h5> Email & Phone </h5>
                    <h6> <a href="mailto:info@m-tech.global"> info@m-tech.global </a> </h6>
                    <h6> <a href="mailto:sales@m-tech.global"> sales@m-tech.global </a> </h6>
                    <h6> Telephone : <a href="tel:+97143158500"> +971 4 315 8500 </a> </h6>
                    <h6> Fax : <a href="tel:+97143158600"> +971 4 315 8600 </a> </h6>
                </div>
            </div>
            <!-- 1 -->
            <!-- 1 -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="contact-box s-field">
                    <i class="fa-solid fa-share-nodes"></i>
                    <h5> Stay in touch </h5>
                    <ul>
                        <li> <a href="#">
                                <i class="fa-brands fa-linkedin"></i>
                            </a> </li>
                        <li> <a href="#">
                                <i class="fa-brands fa-facebook"></i>
                            </a> </li>
                        <li> <a href="#">
                                <i class="fa-brands fa-instagram"></i>
                            </a> </li>
                        <li> <a href="#">
                                <i class="fa-brands fa-youtube"></i>
                            </a> </li>
                    </ul>
                </div>
            </div>
            <!-- 1 -->
        </div>
    </div>
</section>
    <!-- ===========================
               CONTACT AREA END   
         =========================== -->

    <!-- ===========================
               MAP AREA START   
         =========================== -->
    <section class="map-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 map">
                    <h2> Location Map </h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462564.23154170264!2d54.60365371976373!3d25.075341043031724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sin!4v1742197560833!5m2!1sen!2sin"
                        width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- ===========================
               MAP AREA END   
         =========================== -->


    <!-- ============================
            CONTACT FORM AREA START   
         ============================ -->
    <section class="contact-form-area">
        <div class="container">
            <div class="row contact-form">
                <div class="col-xl-8">
                    <h2> Connect with Us </h2>
                    <p> Feel free to use the contact form below or reach out to us directly via phone or email. We look
                        forward to hearing from you and beginning a conversation about how we can assist you with your
                        construction needs.
                    </p>
                    <div class="contact-form-box">
                        <form id="contact" class="interest_send" action="{{ route('sendContactMail') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-bg">
                                <div class="form-container">
                                    
                                        <div class="row justify-content-center">
                                            <div class="col-xl-5 col-lg-5 col-md-10 form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                                            </div>

                                            <div class="col-xl-5 col-lg-5 col-md-10 form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-10 form-group">
                                                <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-10 form-group city">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <select name="location" class="form-control" required>
                                                        <option value="paris">Paris</option>
                                                        <option value="new york">New York</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-10 col-lg-10 col-md-10 form-group city">
                                                <div class="form-group">
                                                    <label>Job Code</label>
                                                    <select name="job_code" class="form-control" required>
                                                        <option value="">Select  Job Code</option>
                                                        @foreach($careers as $career)
                                                        <option value="{{ $career->job_code }}">{{ $career->job_code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-10 col-md-10 form-group"><i
                                                    class="fas fa-file"></i>
                                                <input type="file" class="form-control" id="resume" name="resume"
                                                    accept=".pdf" placeholder=""><br>
                                                <label style="color:white">(Laden Sie Ihren Lebenslauf oder
                                                    Lebenslauf unter 3 MB hoch)</label>

                                            </div>

                                            <div class="col-md-10 form-group">
                                                <textarea name="message" class="form-control" rows="4" cols="120"
                                                    placeholder="Message" required></textarea>

                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="subject" value="Contact Enquiry">
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
        </div>
    </section>
    <!-- ===========================
            CONTACT FORM AREA END   
         =========================== -->
@endsection

@push('scripts')
<script>
    document.getElementById('contact').addEventListener('submit', function() {
        document.getElementById('btnSubmit').disabled = true; // Optional: disable button
        document.getElementById('loader').style.display = 'block';
    });
</script>
@endpush