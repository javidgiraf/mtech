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
    <section class="page-banner-area career-form-hero">
        <!-- Page Banner -->
        <div class="page-banner">
            <h1> Job Opportunities </h1>
        </div>
        <!-- Page Banner -->
    </section>
    <!-- ======================
             BANNER AREA END   
         ====================== -->

    <!-- ==========================
             JOB STRIP AREA START   
         ========================== -->
    <section class="job-strip-area">
        <div class="container">
            <div class="row job-strip-box">
                <div class="col-xl-8 col-lg-9 col-md-10 col-sm-12">
                    <h5> If you are interested in a career with M-Tech, search our global job opportunities below.
                    </h5>
                </div>
            </div>

        </div>
    </section>
    <!-- =========================
             JOB STRIP AREA END   
         ========================= -->
    <!-- =========================
             VACANCIES AREA START   
         ========================= -->
    <section class="vacancies-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 vacancies-head">
                    <h2> Search Results </h2>
                    <h6> There are 14 opportunities matching your search criteria </h6>
                </div>
            </div>
            <!-- tabl -->
            <div class="row">
                <div class="col-md-12 vacancies-table">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th scope="col">POSITION</th>
                                <th scope="col">DISCIPLINE</th>
                                <th scope="col">JOB TYPE</th>
                                <th scope="col">JOB CODE</th>
                                <th scope="col">LOCATION</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($careers) > 0)
                            @foreach($careers as $career)
                            <tr>
                                <th scope="row">{{ $career->position }}</th>
                                <td data-title="Released">{{ $career->discipline }}</td>
                                <td data-title="Studio">{{ $career->job_type }}</td>
                                <td data-title="">{{ $career->job_code }}</td>
                                <td data-title="Worldwide Gross" data-type="currency">{{ $career->location }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5">{{ __('No records available in table') }}</td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- tabl -->
        </div>
    </section>
    <!-- =========================
             VACANCIES AREA END   
         ========================= -->

    <!-- ============================
             CAREER FORM AREA START   
         ============================ -->
    <section class="career-form-area">
        <div class="container">
            <div class="row career-form">
                <div class="col-xl-8">
                    <h2> Apply Now </h2>
                    <p> Feel free to use the contact form below or reach out to us directly via phone or email. We look
                        forward to hearing from you and beginning a conversation about how we can assist you with your
                        construction needs.
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
                                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-10 form-group">
                                                <input type="text" name="phone" class="form-control" placeholder="Phone"  required>
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
                                                    <select name="job_code" class="form-control jobCode" required>
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
                                        <input type="hidden" name="subject" value="Job Enquiry">
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
    <!-- =========================
             CAREER FORM AREA END   
         ========================= -->
@endsection

@push('scripts')
<script>
    document.getElementById('contact').addEventListener('submit', function() {
        document.getElementById('btnSubmit').disabled = true; // Optional: disable button
        document.getElementById('loader').style.display = 'block';
    });
</script>
@endpush