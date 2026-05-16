@extends('layouts.layout')

@section('styles')
    <style>
        .pet-accessories-hero {
            background: linear-gradient(135deg, rgba(18, 58, 86, 0.96), rgba(66, 115, 145, 0.92));
            color: #fff;
        }

        .pet-accessories-card {
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(12, 26, 44, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            height: 100%;
        }

        .pet-accessories-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 50px rgba(12, 26, 44, 0.14);
        }

        .pet-accessories-card img {
            width: 100%;
            height: 220px;
        }

        .pet-accessories-badge {
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

        .pet-accessories-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(12, 26, 44, 0.08);
        }

        .pet-accessories-list li:last-child {
            border-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <section class="breadcrumbs-page-wrap">
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page pet-accessories-hero">
            <img class="ptt-png" src="{{ asset('frontend/assets/images/Dot-Shape.png') }}" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('services') }}">Our Offerings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pet Accessories</li>
                    </ol>
                </nav>
                <h1>Pet Accessories</h1>
                <p class="mb-0">Essential accessories, supplies, and companion items for everyday pet care.</p>
            </div>
        </div>
    </section>

    <main id="body-content">
        <section class="wide-tb-100 bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <span class="pet-accessories-badge mb-3">Our Offerings</span>
                        <h2 class="mb-3">Pet Accessories</h2>
                        <p class="mb-0">A pet shop or pet store sells a wide variety of animal supplies and accessories, including food, treats, toys, collars, leashes, cat litter, cages, and aquariums.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-accessories-card">
                            <img src="{{ asset('frontend/assets/images/offerings/accessories.png') }}" alt="Collars and Leashes">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Collars &amp; Leashes</h3>
                                <p class="mb-0">Useful for daily walks, handling, and identification. These basics help keep pets safe and make outdoor routines more convenient for owners.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-accessories-card">
                            <img src="{{ asset('frontend/assets/images/offerings/trainingtreats.jpg') }}" alt="Toys and Enrichment">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Toys &amp; Enrichment</h3>
                                <p class="mb-0">Toys and enrichment items help pets stay active, mentally engaged, and entertained while supporting healthy everyday behavior.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-accessories-card">
                            <img src="{{ asset('frontend/assets/images/offerings/aquariums.png') }}" alt="Housing and Aquariums">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Cages &amp; Aquariums</h3>
                                <p class="mb-0">From cages to aquariums, proper housing accessories help create a secure, comfortable environment for different types of companion animals.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="bg-white rounded shadow-sm p-4 p-lg-5 h-100">
                            <h3 class="mb-4">Why accessories matter</h3>
                            <p>Accessories support daily pet care beyond food and treats. They help with comfort, safety, enrichment, and habitat setup, whether the pet is a dog, cat, or small companion animal.</p>
                            <p class="mb-0">Choosing the right accessory depends on your pet's species, size, behavior, and living environment.</p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-white rounded shadow-sm p-4 h-100">
                            <h4 class="mb-4">Popular categories</h4>
                            <ul class="list-unstyled pet-accessories-list mb-0">
                                <li>Collars and leashes</li>
                                <li>Toys and enrichment items</li>
                                <li>Cages and crates</li>
                                <li>Aquariums and habitat supplies</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection