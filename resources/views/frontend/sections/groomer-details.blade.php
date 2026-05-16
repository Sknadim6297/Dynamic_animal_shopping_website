@extends('layouts.layout')
@section('styles')
<style>
    .booking-confirmation-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.3s ease-in;
    }
    
    .booking-confirmation-box {
        background: white;
        border-radius: 15px;
        padding: 50px 60px;
        max-width: 600px;
        width: 90%;
        text-align: center;
        box-shadow: 0 10px 50px rgba(0, 0, 0, 0.3);
        animation: slideDown 0.4s ease-out;
        position: relative;
    }
    
    .booking-confirmation-box .success-icon {
        font-size: 80px;
        color: #28a745;
        margin-bottom: 25px;
        display: block;
    }
    
    .booking-confirmation-box .success-title {
        font-size: 36px;
        font-weight: 700;
        color: #28a745;
        margin-bottom: 20px;
        line-height: 1.2;
    }
    
    .booking-confirmation-box .success-message {
        font-size: 20px;
        color: #333;
        line-height: 1.6;
        margin-bottom: 30px;
    }
    
    .booking-confirmation-box .close-btn {
        background-color: #ff6b35;
        color: white;
        border: none;
        padding: 15px 40px;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .booking-confirmation-box .close-btn:hover {
        background-color: #e55a2b;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-50px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    @media (max-width: 768px) {
        .booking-confirmation-box {
            padding: 40px 30px;
            max-width: 95%;
        }
        
        .booking-confirmation-box .success-icon {
            font-size: 60px;
        }
        
        .booking-confirmation-box .success-title {
            font-size: 28px;
        }
        
        .booking-confirmation-box .success-message {
            font-size: 18px;
        }
    }
</style>
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
                    <li class="breadcrumb-item"><a href="{{ route('grooming') }}">Grooming Booking</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $groomer->name ?? 'Groomer Details' }}</li>
                </ol>
            </nav>
            <h1>{{ $groomer->name ?? 'Groomer Details' }}</h1>
        </div>
    </div>
</section>
<!-- Page Breadcrumbs End -->

<!-- Main Body Content Start -->
<main id="body-content">

    <!-- Team Single Details Start -->
    <section class="wide-tb-100 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="team-single-wrap" style="background: transparent; box-shadow: none; padding: 0;">
                        <div class="img" style="overflow: visible; border-radius: 15px;">
                            @if($groomer->image)
                                <img src="{{ asset($groomer->image) }}" alt="{{ $groomer->name ?? 'Groomer' }}" style="width: 100%; height: auto; border-radius: 15px; object-fit: contain;">
                            @else
                                <img src="{{ asset('frontend/assets/images/team/team-1.jpg') }}" alt="{{ $groomer->name ?? 'Groomer' }}" style="width: 100%; height: auto; border-radius: 15px; object-fit: contain;">
                            @endif
                        </div>
                        @if($groomer->years_of_experience)
                        <div class="mt-4" style="margin-top: 2rem; text-align: center;">
                            <div style="font-size: 1.5rem; color: var(--secondary-color); font-weight: 700; margin-bottom: 0.5rem;">Experience</div>
                            <div style="font-size: 2rem; color: var(--accent-color); font-weight: 700;">{{ $groomer->years_of_experience }} Years</div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="team-single-details" style="padding: 3rem 2rem; color: #000;">
                        <h4 style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--accent-color);">{{ $groomer->name ?? 'N/A' }}</h4>
                        <div class="mb-4" style="font-size: 1.25rem; color: var(--secondary-color);"><strong>{{ $groomer->profession ?? 'Groomer' }}</strong></div>
                        
                        @if($groomer->experience_details)
                        <div class="mt-4" style="margin-top: 2rem;">
                            <h5 style="color: var(--secondary-color); font-size: 1.5rem; margin-bottom: 1rem;">About</h5>
                            <p style="line-height: 1.8; font-size: 1rem; color: #000;">{{ $groomer->experience_details }}</p>
                        </div>
                        @endif
                        
                        @if($groomer->no_of_cases_handled || $groomer->satisfied_clients)
                        <div class="row mt-5" style="margin-top: 3rem;">
                            @if($groomer->no_of_cases_handled)
                            <div class="col-md-6 mb-4">
                                <div class="counter-style-box" style="background: #f8f9fa; padding: 2rem; border-radius: 15px; text-align: center; border: 2px solid var(--secondary-color);">
                                    <div class="counter-txt" style="font-size: 3rem; color: var(--secondary-color); font-weight: 700;">
                                        <span class="counter">{{ $groomer->no_of_cases_handled }}</span>+
                                    </div>
                                    <div style="color: #000; font-size: 1.1rem; margin-top: 0.5rem; font-weight: 600;">Cases Handled</div>
                                </div>
                            </div>
                            @endif
                            
                            @if($groomer->satisfied_clients)
                            <div class="col-md-6 mb-4">
                                <div class="counter-style-box" style="background: #f8f9fa; padding: 2rem; border-radius: 15px; text-align: center; border: 2px solid var(--secondary-color);">
                                    <div class="counter-txt" style="font-size: 3rem; color: var(--secondary-color); font-weight: 700;">
                                        <span class="counter">{{ $groomer->satisfied_clients }}</span>+
                                    </div>
                                    <div style="color: #000; font-size: 1.1rem; margin-top: 0.5rem; font-weight: 600;">Satisfied Clients</div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                        
                        @if($groomer->skill_1 || $groomer->skill_2 || $groomer->skill_3)
                        <div class="mt-5" style="margin-top: 3rem;">
                            <h5 style="color: var(--secondary-color); font-size: 1.5rem; margin-bottom: 1.5rem;">Professional Skills</h5>
                            <ul class="list-unstyled">
                                @if($groomer->skill_1)
                                <li class="mb-3" style="margin-bottom: 1.5rem;">
                                    <div class="d-flex justify-content-between mb-2" style="margin-bottom: 0.5rem;">
                                        <span style="font-weight: 600; font-size: 1rem; color: #000;">{{ $groomer->skill_1 }}</span>
                                        <span style="color: var(--secondary-color); font-weight: 700;">{{ $groomer->skill_1_percentage ?? 0 }}%</span>
                                    </div>
                                    <div class="progress" style="height: 10px; background: #e9ecef; border-radius: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $groomer->skill_1_percentage ?? 0 }}%; background: var(--secondary-color); border-radius: 10px;" aria-valuenow="{{ $groomer->skill_1_percentage ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                @endif
                                
                                @if($groomer->skill_2)
                                <li class="mb-3" style="margin-bottom: 1.5rem;">
                                    <div class="d-flex justify-content-between mb-2" style="margin-bottom: 0.5rem;">
                                        <span style="font-weight: 600; font-size: 1rem; color: #000;">{{ $groomer->skill_2 }}</span>
                                        <span style="color: var(--secondary-color); font-weight: 700;">{{ $groomer->skill_2_percentage ?? 0 }}%</span>
                                    </div>
                                    <div class="progress" style="height: 10px; background: #e9ecef; border-radius: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $groomer->skill_2_percentage ?? 0 }}%; background: var(--secondary-color); border-radius: 10px;" aria-valuenow="{{ $groomer->skill_2_percentage ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                @endif
                                
                                @if($groomer->skill_3)
                                <li class="mb-3" style="margin-bottom: 1.5rem;">
                                    <div class="d-flex justify-content-between mb-2" style="margin-bottom: 0.5rem;">
                                        <span style="font-weight: 600; font-size: 1rem; color: #000;">{{ $groomer->skill_3 }}</span>
                                        <span style="color: var(--secondary-color); font-weight: 700;">{{ $groomer->skill_3_percentage ?? 0 }}%</span>
                                    </div>
                                    <div class="progress" style="height: 10px; background: #e9ecef; border-radius: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $groomer->skill_3_percentage ?? 0 }}%; background: var(--secondary-color); border-radius: 10px;" aria-valuenow="{{ $groomer->skill_3_percentage ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                        @endif
                        
                        {{-- <div class="social-icons mt-5" style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid rgba(0,0,0,0.1);">
                            <a href="#" style="color: var(--secondary-color); font-size: 1.5rem; margin-right: 1rem; transition: all 0.3s;">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="#" style="color: var(--secondary-color); font-size: 1.5rem; margin-right: 1rem; transition: all 0.3s;">
                                <i data-feather="facebook"></i>
                            </a>
                            <a href="#" style="color: var(--secondary-color); font-size: 1.5rem; transition: all 0.3s;">
                                <i data-feather="instagram"></i>
                            </a>
                        </div> --}}
                        
                        <div class="mt-5" style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid rgba(0,0,0,0.1);">
                            <a href="{{ route('grooming') }}#booking-form" class="btn-theme bg-orange btn-shadow text-capitalize" style="padding: 0.75rem 2rem;color: #FFF;">
                                <i data-feather="calendar"></i> Book Appointment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Single Details End -->

    <!-- Appointment Modal -->
    <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="appointmentModalLabel">Book Grooming Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('appointment.store') }}" id="appointmentForm">
                    @csrf
                    <input type="hidden" name="groomer_id" value="">
                    <div class="modal-body">
                        @if (session('booking_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="icofont-check-circled"></i> {{ session('booking_success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="pet_name" class="form-label">Pet Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="pet_name" name="pet_name" value="{{ old('pet_name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="pet_type" class="form-label">Pet Type <span class="text-danger">*</span></label>
                            <select class="form-control" id="pet_type" name="pet_type_display" required onchange="toggleCustomPetType(this.value)">
                                <option value="">Select Pet Type</option>
                                <option value="Dog" {{ old('pet_type') == 'Dog' ? 'selected' : '' }}>Dog</option>
                                <option value="Cat" {{ old('pet_type') == 'Cat' ? 'selected' : '' }}>Cat</option>
                                <option value="Other" {{ old('pet_type') == 'Other' || (!in_array(old('pet_type'), ['Dog', 'Cat']) && old('pet_type')) ? 'selected' : '' }}>Other</option>
                            </select>
                            <input type="hidden" id="pet_type_hidden" name="pet_type" value="{{ old('pet_type') }}">
                        </div>

                        <div class="mb-3" id="custom_pet_type_container" style="display: none;">
                            <!-- Appointment Modal and modal scripts removed. Use the direct booking form on the grooming page. -->
                            <input type="text" class="form-control" id="custom_pet_type" name="custom_pet_type" value="{{ old('custom_pet_type', old('pet_type') && !in_array(old('pet_type'), ['Dog', 'Cat', 'Other']) ? old('pet_type') : '') }}" placeholder="Enter pet type (e.g., Rabbit, Bird, etc.)">
