@extends('layouts.layout')
@section('styles')

@endsection

@section('content')

    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">        
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page">
            <img class="ptt-png" src="{{ asset('frontend/assets/images/Dot-Shape.png') }}" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('services') }}">Services</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pet Clinic</li>
                    </ol>
                </nav>
                <h1>Pet Clinic</h1>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    @php
        $headerSettings = \App\Models\HeaderSettings::first();
    @endphp
    <main id="body-content">

        <section class="wide-tb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <h4 class="text-secondary mb-3">Our Pet Clinic</h4>
                        <h5 class="text-muted mb-3">Leading in our Pet Clinic is <b>Dr. Subir Bhattacharya (PHD Scholar)</b></h5>

                        <p class="mb-4">Dr. Subir Bhattacharya is one of the best veterinary Doctors the city has. Taking complete care of the Patients and providing comprehensive care, the Doctor's Facility is one well-maintained centre which is equipped with all the necessary medical equipment. The centre is such that the Patients can feel at ease during the course of treatment. The Veterinary Doctor provides a host of medical services which include General Check Up, Veterinary Services, Viral Fever Treatment, Dengue Fever Treatment, Immunisation/Vaccination to name a few. The Veterinary Centre is operational 4:00 PM onwards on Mondays, Wednesdays, Fridays & Sundays as of now.</p>

                        <p class="mb-4">The Doctor ensures the comfort of the Pet and has a very calm approach towards the Patient. It is quite convenient for people from various parts of the city to visit this Veterinary Healthcare Facility and finding the Centre is not difficult owing to this Location.</p>

                        <p class="mb-4">We have an upcoming Operation Theater (OT) coming up in our Facility for treatment of Patients in need of Operative Procedures.</p>

                        <p class="mb-4">We also have an upcoming Diagnostics &amp; Pathology Center coming up in our Facility for reliable State-of-the-art Diagnosis of our Furry Friends.</p>

                        {{-- Doctor image (kept) --}}
                        @php $doctorImage = $headerSettings->doctor_image ?? 'frontend/assets/images/doctor.jpg'; @endphp
                        <div class="mt-3 text-center">
                            <img src="{{ asset($doctorImage) }}" alt="Doctor" class="img-fluid rounded" style="max-width: 180px; display: inline-block;" />
                        </div>

                        {{-- removed static clinic images per request --}}

                    </div>

                    <div class="col-lg-4 col-md-12">
                        <aside class="row sidebar-widgets">
                            <div class="sidebar-primary col-lg-12 col-md-6">
                                <div class="services-list">
                                    <h4>Our Services</h4>
                                    <ul class="list-unstyled">
                                        <li><a href="/pet-clinic">Pet Clinic <i class="icofont-check-circled"></i></a></li>
                                        <li><a href="/grooming-booking">Pet Grooming <i class="icofont-check-circled"></i></a></li>
                                        <li><a href="/pet-food">Pet Food <i class="icofont-check-circled"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-secondary col-lg-12 col-md-6">
                                <div class="sidebar-sitters">
                                    <h3>Contact & Booking</h3>
                                    <p><i class="fa fa-map-marker-alt mr-2"></i><strong>CLINIC & GROOMING CENTER:</strong><br>
                                        {{ $headerSettings->address ?? 'BE-10, SECTOR - I, SALT LAKE, KOLKATA - 700 064' }}</p>
                                    <p><i class="fa fa-phone-alt mr-2"></i>{{ $headerSettings->phone ?? '7439767977' }}</p>
                                    <p><i class="fa fa-envelope mr-2"></i>{{ $headerSettings->email ?? 'info@animalpride.in' }}</p>
                                    <div class="mt-3">
                                        <a href="{{ route('clinic.booking') }}" class="btn-theme bg-orange capusle mt-2 btn-shadow">Book Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
