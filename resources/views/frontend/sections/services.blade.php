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
                        <li class="breadcrumb-item active" aria-current="page">Our Services</li>
                    </ol>
                </nav>
                <h1>Our Services</h1>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Quality & Experience Start -->
        <section class="wide-tb-100">
            <div class="container">               
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <img src="{{ asset('frontend/assets/images/cat_img.png') }}" alt="">
                    </div>
                    <div class="col-md-7">
                        <h1 class="heading-main">
                            <small>Quality & Experience <i class="pethund_repeat_grid"></i></small>
                            <span>Pet Grooming</span> & Care Center
                        </h1>

                        @if($homeService && $homeService->description)
                            <p>{{ $homeService->description }}</p>
                        @else
                            <p>At Animal Pride, we provide professional pet grooming and care services with experienced groomers dedicated to keeping your pets healthy, happy, and looking their best. Our modern facility and expert team ensure your pets receive the highest quality care.</p>
                        @endif

                        <ul class="list-unstyled icons-listing theme-green paws fw-7 mt-5 txt-blue">
                            <li>Professional grooming services for all pet breeds</li>
                            <li>Experienced and certified pet care professionals</li>
                            <li>Safe and comfortable environment for your pets</li>
                        </ul>

                        <a href="{{ route('grooming') }}#booking-form" class="btn-theme bg-navy-blue capusle mt-5 btn-shadow">Book Appointment</a>                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Quality & Experience End -->

        <!-- Callout Section Solid Background -->
        <section class="wide-tb-70 bg-navy-blue pt-0 video-popup-wrap">
            <div class="container">
                @if($homeService && ($homeService->video_file || $homeService->video))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bg-fixed pos-rel video-popup">
                            <div class="zindex-fixed pos-rel">
                                @if($homeService->video_file)
                                    <video controls style="width: 100%; max-height: 420px; border-radius: 12px; background: #000;">
                                        <source src="{{ asset('storage/' . $homeService->video_file) }}" type="video/mp4">
                                    </video>
                                @else
                                    <a href="{{ $homeService->video }}" class="popup-video"><i
                                            class="icofont-play"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-sm-10 mx-auto text-center txt-white">
                        @if($homeService && $homeService->heading)
                            <p>{{ $homeService->heading }}</p>
                        @else
                            <p>Experience the best in pet care services. Our team of professionals is dedicated to providing exceptional grooming and healthcare services for your beloved pets.</p>
                        @endif
                        <div class="text-center mt-4">
                            @php $headerSettings = \App\Models\HeaderSettings::first(); @endphp
                            <a href="{{ route('contact') }}" class="btn-theme bg-orange capusle bordered me-4"><span
                                    class="txt-white">Contact us</span></a>
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $headerSettings->phone ?? '(123) 456-789') }}" style="color: white; text-decoration: none;">
                                {{ $headerSettings->phone ?? '(123) 456-789' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout Section Solid Background -->

        <!-- Our Providing Services Start -->
        <section class="wide-tb-100">
            <div class="container">
                <h1 class="heading-main center">
                    <small>What we offer for you <i class="pethund_repeat_grid"></i></small>
                    <span>Our Providing </span> Services
                </h1>

                <div class="row justify-content-center">
                    <!-- Icon Boxes One Style -->
                    <div class="col-md-6 col-lg-6">
                        <div class="icon-box-1 d-flex">
                            <div class="icon-font">
                                <i class="pethund_pet_grooming"></i>
                            </div>
                            <div class="text">
                                <h3>Pet Grooming</h3>
                                <p>Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu
                                    risus. </p>
                                <a href="{{ route('service.details') }}" class="read-more-arrow">
                                    Read More <span> <i class="icofont-simple-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Icon Boxes One Style -->

                    <!-- Icon Boxes One Style -->
                    <div class="col-md-6 col-lg-6">
                        <div class="icon-box-1 d-flex">
                            <div class="icon-font">
                                <i class="pethund_pet_food"></i>
                            </div>
                            <div class="text">
                                <h3>Pet Foods</h3>
                                <p>Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu
                                    risus. </p>
                                <a href="https://animalpride.tazen.in/" class="read-more-arrow">
                                    Read More <span> <i class="icofont-simple-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Icon Boxes One Style -->
                </div>
            </div>
        </section>
        <!-- Our Providing Services End -->

        <!-- Counter Style Background Image -->

        <!-- Counter Style Background Image -->

        <!-- Callout Section Parallax -->
        {{-- <section class="wide-tb-150 bg-scroll pos-rel callout_bg">
            <div class="bg-overlay black opacity-30"></div>
            <div class="container">
                <div class="text-center">
                    <!-- Heading Main -->
                    <div class="col-sm-12 wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
                        <h1 class="heading-main light-mode center">
                            <small>Safety & Quality For Your Pet <i class="pethund_repeat_grid"></i></small>
                            We Take Care of <br> Your Pet 24/7
                        </h1>
                        @php $headerSettings = \App\Models\HeaderSettings::first(); @endphp
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $headerSettings->phone ?? '(123) 456-789') }}" class="btn-theme bg-green btn-shadow">Give us call</a>
                    </div>
                    <!-- Heading Main -->
                </div>
            </div>
        </section> --}}
        <!-- Callout Section Parallax -->

        <!-- Recent Blog Post Start -->

        <!-- Recent Blog Post End -->

    </main>

@endsection
