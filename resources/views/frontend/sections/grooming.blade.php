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

<section class="breadcrumbs-page-wrap">
    <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page">
        <img class="ptt-png" src="{{ asset('frontend/assets/images/Dot-Shape.png') }}" alt="png">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Grooming Booking</li>
                </ol>
            </nav>
            <h1>Grooming Booking</h1>
        </div>
    </div>
</section>

<main id="body-content">
    <section class="wide-tb-100 bg-light" id="booking-form">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-9 text-center">
                    <h1 class="heading-main center wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
                        <small>Quick booking <i class="pethund_repeat_grid"></i></small>
                        <span>Book Your Appointment</span>
                    </h1>
                    <p class="mb-0">Submit the booking request directly on this page. Groomer assignment is handled separately, and the package is optional.</p>
                    <!-- booking button removed per request -->
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg booking-card">
                        <div class="card-body p-4 p-md-5">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('appointment.store') }}" id="appointmentForm">
                                @csrf
                                <input type="hidden" name="service_type" value="grooming">
                                <input type="hidden" id="pet_type_hidden" name="pet_type" value="{{ old('pet_type') }}">

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="pet_name" class="form-label">Pet Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="pet_name" name="pet_name" value="{{ old('pet_name') }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="pet_type" class="form-label">Pet Type <span class="text-danger">*</span></label>
                                        <select class="form-control" id="pet_type" name="pet_type_display" required onchange="toggleCustomPetType(this.value)">
                                            <option value="">Select Pet Type</option>
                                            <option value="Dog" {{ old('pet_type') == 'Dog' ? 'selected' : '' }}>Dog</option>
                                            <option value="Cat" {{ old('pet_type') == 'Cat' ? 'selected' : '' }}>Cat</option>
                                            <option value="Other" {{ old('pet_type') == 'Other' || (!in_array(old('pet_type'), ['Dog', 'Cat']) && old('pet_type')) ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>

                                    <div class="col-12" id="custom_pet_type_container" style="display: none;">
                                        <label for="custom_pet_type" class="form-label">Please specify pet type <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="custom_pet_type" name="custom_pet_type" value="{{ old('custom_pet_type', old('pet_type') && !in_array(old('pet_type'), ['Dog', 'Cat', 'Other']) ? old('pet_type') : '') }}" placeholder="Enter pet type (e.g., Rabbit, Bird, etc.)">
                                    </div>

                                    <div class="col-12">
                                        <label for="price_package" class="form-label">Price Package</label>
                                        <select class="form-control" id="price_package" name="price_package" onchange="togglePackageDescription(this.value)">
                                            <option value="">Select a Package (Optional)</option>
                                            @foreach($packages as $package)
                                                <option value="{{ $package->slug }}" {{ old('price_package') == $package->slug ? 'selected' : '' }}>{{ $package->name }} - Rs.{{ number_format($package->price, 0) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12" id="package_descriptions">
                                        @foreach($packages as $package)
                                            <div id="{{ $package->slug }}-desc" class="package-description" style="display: none; padding: 12px; background-color: #f8f9fa; border-left: 4px solid #28a745; border-radius: 4px;">
                                                <strong>{{ $package->name }}</strong>
                                                <p class="mb-0 mt-2 text-muted">{{ $package->description }}</p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="col-md-6">
                                        <label for="owner_name" class="form-label">Owner Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{ old('owner_name') }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="appointment_date" class="form-label">Appointment Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="appointment_date" name="appointment_date" value="{{ old('appointment_date') }}" min="{{ date('Y-m-d') }}" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="appointment_time" class="form-label">Appointment Time <span class="text-danger">*</span></label>
                                        <input type="time" class="form-control" id="appointment_time" name="appointment_time" value="{{ old('appointment_time') }}" required>
                                    </div>

                                    <div class="col-12">
                                        <label for="special_instructions" class="form-label">Special Instructions</label>
                                        <textarea class="form-control" id="special_instructions" name="special_instructions" rows="4">{{ old('special_instructions') }}</textarea>
                                    </div>

                                    <div class="col-12 text-end pt-2">
                                        <button type="submit" class="btn-theme bg-orange btn-shadow text-capitalize">
                                            <i data-feather="calendar"></i> Book Appointment
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    @if (session('booking_success'))
        document.addEventListener('DOMContentLoaded', function() {
            var overlay = document.createElement('div');
            overlay.className = 'booking-confirmation-overlay';
            overlay.innerHTML = `
                <div class="booking-confirmation-box">
                    <i class="icofont-check-circled success-icon"></i>
                    <h2 class="success-title">Booking Confirmed!</h2>
                    <p class="success-message">{{ session('booking_success') }}</p>
                    <button class="close-btn" onclick="this.closest('.booking-confirmation-overlay').remove()">OK</button>
                </div>
            `;

            document.body.appendChild(overlay);

            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    overlay.remove();
                }
            });

            setTimeout(function() {
                if (overlay && overlay.parentNode) {
                    overlay.remove();
                }
            }, 8000);
        });
    @endif

    function toggleCustomPetType(value) {
        var customPetTypeContainer = document.getElementById('custom_pet_type_container');
        var customPetTypeInput = document.getElementById('custom_pet_type');
        var petTypeHidden = document.getElementById('pet_type_hidden');

        if (!customPetTypeContainer || !customPetTypeInput || !petTypeHidden) {
            return;
        }

        if (value === 'Other') {
            customPetTypeContainer.style.display = 'block';
            customPetTypeInput.required = true;
            petTypeHidden.value = '';
        } else {
            customPetTypeContainer.style.display = 'none';
            customPetTypeInput.required = false;
            customPetTypeInput.value = '';
            petTypeHidden.value = value;
        }
    }

    function togglePackageDescription(value) {
        var descriptions = document.querySelectorAll('.package-description');

        descriptions.forEach(function(desc) {
            desc.style.display = 'none';
        });

        if (value) {
            var selectedDesc = document.getElementById(value + '-desc');
            if (selectedDesc) {
                selectedDesc.style.display = 'block';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var customPetTypeInput = document.getElementById('custom_pet_type');
        var petTypeHidden = document.getElementById('pet_type_hidden');
        var petTypeSelect = document.getElementById('pet_type');
        var pricePackageSelect = document.getElementById('price_package');

        if (customPetTypeInput && petTypeHidden) {
            customPetTypeInput.addEventListener('input', function() {
                if (this.value.trim()) {
                    petTypeHidden.value = this.value.trim();
                }
            });
        }

        if (petTypeSelect) {
            toggleCustomPetType(petTypeSelect.value);
        }

        if (pricePackageSelect) {
            togglePackageDescription(pricePackageSelect.value);
        }

        var appointmentForm = document.getElementById('appointmentForm');
        if (appointmentForm) {
            appointmentForm.addEventListener('submit', function() {
                var selectedPetType = document.getElementById('pet_type');
                var customPetType = document.getElementById('custom_pet_type');
                var hiddenPetType = document.getElementById('pet_type_hidden');

                if (selectedPetType && selectedPetType.value === 'Other' && customPetType && customPetType.value.trim() && hiddenPetType) {
                    hiddenPetType.value = customPetType.value.trim();
                } else if (selectedPetType && selectedPetType.value && hiddenPetType) {
                    hiddenPetType.value = selectedPetType.value;
                }
            });
        }
    });
</script>

<style>
    .booking-card {
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
    }

    .booking-card .form-control,
    .booking-card .form-select {
        min-height: 48px;
    }

    .booking-card textarea.form-control {
        min-height: 130px;
    }

    .booking-card .form-label {
        font-weight: 600;
        color: #1d2a35;
        margin-bottom: 0.45rem;
    }

    .booking-card .btn-theme {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    @media (max-width: 768px) {
        .booking-card .card-body {
            padding: 1.25rem !important;
        }

        .booking-card .text-end {
            text-align: left !important;
        }
    }
</style>

@endsection
