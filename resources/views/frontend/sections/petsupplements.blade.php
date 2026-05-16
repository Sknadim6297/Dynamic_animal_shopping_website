@extends('layouts.layout')

@section('styles')
    <style>
        .pet-supplements-hero {
            background: linear-gradient(135deg, rgba(31, 63, 91, 0.96), rgba(58, 112, 140, 0.92));
            color: #fff;
        }

        .pet-supplements-card {
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(12, 26, 44, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            height: 100%;
        }

        .pet-supplements-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 50px rgba(12, 26, 44, 0.14);
        }

        .pet-supplements-card img {
            width: 100%;
            height: 220px;
        }

        .pet-supplements-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.14);
            backdrop-filter: blur(6px);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-size: 0.78rem;
            font-weight: 700;
        }

        .pet-supplements-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(12, 26, 44, 0.08);
        }

        .pet-supplements-list li:last-child {
            border-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <section class="breadcrumbs-page-wrap">
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page pet-supplements-hero">
            <img class="ptt-png" src="{{ asset('frontend/assets/images/Dot-Shape.png') }}" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('services') }}">Our Offerings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pet Supplements</li>
                    </ol>
                </nav>
                <h1>Pet Supplements</h1>
                <p class="mb-0">Support products for joints, skin, coat, digestion, and general wellness.</p>
            </div>
        </div>
    </section>

    <main id="body-content">
        <section class="wide-tb-100 bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <span class="pet-supplements-badge mb-3">Our Offerings</span>
                        <h2 class="mb-3">Pet Supplements</h2>
                        <p class="mb-0">Just as healthy diets provide essential vitamins and nutrients for people, supplements can help support specific nutritional needs in pets when used appropriately alongside a balanced diet.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-supplements-card">
                            <img src="{{ asset('frontend/assets/images/offerings/medicine.png') }}" alt="Hip and Joint Supplements">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Hip &amp; Joint</h3>
                                <p class="mb-0">Useful for older dogs and pets with joint stiffness or discomfort. Joint support supplements can help maintain mobility and comfort for active and aging pets.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-supplements-card">
                            <img src="{{ asset('frontend/assets/images/offerings/accessories.png') }}" alt="Skin and Coat Supplements">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Skin &amp; Coat</h3>
                                <p class="mb-0">Designed to help maintain healthy skin and a glossy coat while reducing dryness and flaking. These formulas often focus on skin comfort and overall coat quality.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-supplements-card">
                            <img src="{{ asset('frontend/assets/images/offerings/vetfood.png') }}" alt="Multivitamins and Biotics">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">MultiVitamins &amp; Biotics</h3>
                                <p class="mb-0">Support daily wellness with multivitamins and digestive support products that help round out a complete nutritional routine for pets.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="bg-white rounded shadow-sm p-4 p-lg-5 h-100">
                            <h3 class="mb-4">How supplements help</h3>
                            <p>Supplements are not a replacement for good food, but they can support specific needs such as joints, skin, coat, digestion, and overall wellness. The right product depends on your pet's age, breed, lifestyle, and any health concerns.</p>
                            <p class="mb-0">Speak with your veterinarian before starting any supplement routine so the product and dosage fit your pet's needs.</p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-white rounded shadow-sm p-4 h-100">
                            <h4 class="mb-4">Popular categories</h4>
                            <ul class="list-unstyled pet-supplements-list mb-0">
                                <li>Hip and joint support</li>
                                <li>Skin and coat support</li>
                                <li>Multivitamins</li>
                                <li>Probiotics and biotics</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection