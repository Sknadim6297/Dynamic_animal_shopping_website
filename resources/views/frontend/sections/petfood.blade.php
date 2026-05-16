@extends('layouts.layout')

@section('styles')
    <style>
        .pet-food-hero {
            background: linear-gradient(135deg, rgba(10, 35, 66, 0.96), rgba(32, 89, 129, 0.92));
            color: #fff;
        }

        .pet-food-card {
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(12, 26, 44, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            height: 100%;
        }

        .pet-food-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 50px rgba(12, 26, 44, 0.14);
        }

        .pet-food-card img {
            width: 100%;
            height: 230px;
        }

        .pet-food-badge {
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

        .pet-food-list li {
            padding: 0.7rem 0;
            border-bottom: 1px solid rgba(12, 26, 44, 0.08);
        }

        .pet-food-list li:last-child {
            border-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <section class="breadcrumbs-page-wrap">
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page pet-food-hero">
            <img class="ptt-png" src="{{ asset('frontend/assets/images/Dot-Shape.png') }}" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('services') }}">Our Offerings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pet Food</li>
                    </ol>
                </nav>
                <h1>Pet Food</h1>
                <p class="mb-0">Nutrition-focused food options for dogs, cats, and other companion animals.</p>
            </div>
        </div>
    </section>

    <main id="body-content">
        <section class="wide-tb-100 bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <span class="pet-food-badge mb-3">Our Offerings</span>
                        <h2 class="mb-3">Pet Food</h2>
                        <p class="mb-0">Pet food is plant or animal material intended for consumption by pets. It is typically sold in pet stores and supermarkets, and it is usually specific to the type of animal, such as dog food or cat food.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-food-card">
                            <img src="{{ asset('frontend/assets/images/offerings/food.png') }}" alt="Dry Food">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Dry Food</h3>
                                <p class="mb-0">Dry pet foods are made by mixing dry and wet ingredients into a dough. The dough is heated under pressure, pushed through a die machine, then dried, cooled, and spray coated.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-food-card">
                            <img src="{{ asset('frontend/assets/images/offerings/wetfood.png') }}" alt="Wet Food">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Wet Food</h3>
                                <p class="mb-0">Wet pet foods have a high moisture content, usually around 70-80%. They are sealed and then cooked at a defined temperature for sterilisation, which helps ensure safety and shelf life.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-food-card">
                            <img src="{{ asset('frontend/assets/images/offerings/vetfood.png') }}" alt="Vet Food">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">VET Food</h3>
                                <p class="mb-0">Products of vegetable or animal origin that are consumed by animals and contribute to energy and nutrients in the animal's diet.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="bg-white rounded shadow-sm p-4 p-lg-5 h-100">
                            <h3 class="mb-4">What to know about pet food</h3>
                            <p>Pet food supports everyday nutrition and should be selected based on species, age, activity level, and health needs. A balanced diet helps support digestion, coat condition, and overall wellbeing.</p>
                            <p class="mb-0">Choose formulas that match your pet's routine and talk to your veterinary team if your pet needs special dietary support.</p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-white rounded shadow-sm p-4 h-100">
                            <h4 class="mb-4">Popular choices</h4>
                            <ul class="list-unstyled pet-food-list mb-0">
                                <li>Dry food for daily feeding</li>
                                <li>Wet food for extra moisture</li>
                                <li>Veterinary diet food</li>
                                <li>Breed and age-specific formulas</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection