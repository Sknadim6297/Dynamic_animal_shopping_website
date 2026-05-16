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
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
                <h1>Contact Us</h1>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">
        @php
            $headerSettings = \App\Models\HeaderSettings::first();
            $phoneNumbers = $headerSettings && $headerSettings->phone
                ? preg_split('/[\r\n,]+/', $headerSettings->phone, -1, PREG_SPLIT_NO_EMPTY)
                : [];
        @endphp

        <!-- Generally Asked Question Start -->
        <section class="wide-tb-100 pb-0">
            <div class="container">
                <section class="map-wrap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2965.0824050173574!2d-93.63905729999999!3d41.998507000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWebFilings%2C+University+Boulevard%2C+Ames%2C+IA!5e0!3m2!1sen!2sus!4v1390839289319"></iframe>
                </section>
            </div>
        </section>
        <!-- Generally Asked Question End -->

        <!-- Get in touch with us Start -->
        <section class="wide-tb-100 pb-0">
            <div class="container">
                <h1 class="heading-main center">
                    <small>Get in touch with us <i class="pethund_repeat_grid"></i></small>
                    <span>Make</span> Online Enquiry?
                </h1>
                <div class="row">                    
                    <div class="col-lg-8 col-md-12 mx-auto">
                        <div class="need-help">
                            @if (session('success'))
                                <div class="alert alert-success" style="margin-bottom: 20px; padding: 15px; background-color: #4caf50; color: white; border-radius: 4px;">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger" style="margin-bottom: 20px; padding: 15px; background-color: #f44336; color: white; border-radius: 4px;">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST" id="contact_form_laravel">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-0">
                                        <div class="mb-3">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="First Name" value="{{ old('name') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="mb-3">
                                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" value="{{ old('lastname') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="mb-3">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="mb-3">
                                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-0">
                                        <div class="mb-3">
                                            <textarea name="comment" id="comment" class="form-control" rows="6" placeholder="Message" required>{{ old('comment') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn-theme bg-green mt-3 capusle">Submit Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Get in touch with us End -->

        <!-- Client Logos Start -->
        <section class="wide-tb-100 bg-light-gray clients-rounded-wrap need-help-topspace">
            <div class="container pos-rel">
                <div class="contact-map-img">
                    <img src="{{ asset('frontend/assets/images/World-Map-PNG-Picture.png') }}" alt="">
                </div>
                <div class="row">
                    <!-- Icon Boxes Four Style -->
                    <div class="col-md-4 col-sm-6">
                        <div class="icon-box-4 h-100">
                            <i data-feather="map-pin"></i>
                            <h3>Visit Us</h3>
                            <div>{{ $headerSettings->address ?? 'Pet Street 123 - New York' }}</div>
                        </div>
                    </div>
                    <!-- Icon Boxes Four Style -->

                    <!-- Icon Boxes Four Style -->
                    <div class="col-md-4 col-sm-6">
                        <div class="icon-box-4 h-100">
                            <i data-feather="phone"></i>
                            <h3>Phone Us</h3>
                            <div>
                                @forelse ($phoneNumbers as $phoneNumber)
                                    <div><a href="tel:{{ preg_replace('/[^0-9+]/', '', $phoneNumber) }}">{{ trim($phoneNumber) }}</a></div>
                                @empty
                                    <div>(123) 456-789</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <!-- Icon Boxes Four Style -->

                    <!-- Icon Boxes Four Style -->
                    <div class="col-md-4 col-sm-6 mx-auto">
                        <div class="icon-box-4 h-100">
                            <i data-feather="mail"></i>
                            <h3>Mail Us</h3>
                            <div><a href="mailto:{{ $headerSettings->email ?? 'info@pethund.com' }}">{{ $headerSettings->email ?? 'info@pethund.com' }}</a></div>
                        </div>
                    </div>
                    <!-- Icon Boxes Four Style -->
                </div>
            </div>
        </section>
        <!-- Client Logos End -->

    </main>

    <script>
        // Prevent the old JavaScript from intercepting this form
        document.addEventListener('DOMContentLoaded', function() {
            // Unbind any existing jQuery validation on this form
            if (typeof jQuery !== 'undefined') {
                // Remove validation from the old form ID if it exists
                if (jQuery.fn.validate) {
                    var oldForm = jQuery('#contact_form');
                    if (oldForm.length) {
                        oldForm.off('submit');
                        oldForm.unbind('submit');
                        oldForm.validate && oldForm.validate().destroy();
                    }
                }
                
                // Ensure our new form doesn't get validation attached
                var newForm = jQuery('#contact_form_laravel');
                if (newForm.length && jQuery.fn.validate) {
                    newForm.off('submit');
                    newForm.unbind('submit');
                }
            }
            
            // Ensure form submits normally to Laravel
            var contactForm = document.getElementById('contact_form_laravel');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    // Allow normal form submission
                    return true;
                }, false);
            }
        });
    </script>

@endsection