@extends('layouts.layout')

@section('styles')
    <style>
        .aquariums-hero {
            background: linear-gradient(135deg, rgba(11, 51, 80, 0.96), rgba(28, 102, 145, 0.92));
            color: #fff;
        }

        .aquarium-card {
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(12, 26, 44, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            height: 100%;
        }

        .aquarium-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 50px rgba(12, 26, 44, 0.14);
        }

        .aquarium-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .aquarium-badge {
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

        .aquarium-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(12, 26, 44, 0.08);
        }

        .aquarium-list li:last-child {
            border-bottom: 0;
        }

    </style>
@endsection

@section('content')
    <section class="breadcrumbs-page-wrap">
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page aquariums-hero">
            <img class="ptt-png" src="{{ asset('frontend/assets/images/Dot-Shape.png') }}" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('services') }}">Our Offerings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Aquariums &amp; Accessories</li>
                    </ol>
                </nav>
                <h1>Aquariums &amp; Accessories</h1>
                <p class="mb-0">Aquarium equipment and decorative accessories for healthy, well-maintained fish tanks.</p>
            </div>
        </div>
    </section>

    <main id="body-content">
        <section class="wide-tb-100 bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <span class="aquarium-badge mb-3">Our Offerings</span>
                        <h2 class="mb-3">Aquariums</h2>
                        <p class="mb-0">An aquarium is a place where fish and other aquatic animals are kept by humans. It can be a small tank or a larger display, and the right accessories help keep the tank healthy and visually appealing.</p>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card aquarium-card">
                            <img src="{{ asset('frontend/assets/images/offerings/pump.jpg') }}" alt="Pumps">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Pumps</h3>
                                <p class="mb-0">It is one of the most important fish tank accessories that help the fish to survive and stay healthy in the tank. The pump helps to circulate oxygen in the water.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card aquarium-card">
                            <img src="{{ asset('frontend/assets/images/offerings/filter.jpg') }}" alt="Filters">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Filters</h3>
                                <p class="mb-0">Every fish tank requires a filter system which can filter the water in the tank so that it is free from contaminants and impurity. There are various types of filters made available today so it is important to choose products according to the size of the tanks and the number of fish in it.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card aquarium-card">
                            <img src="{{ asset('frontend/assets/images/offerings/ornaments.jpg') }}" alt="Ornaments">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Ornaments</h3>
                                <p class="mb-0">There are a huge plethora of ornaments or embellishments that can be added to the fish tank to enhance its overall appearance. Most of these ornaments can be bought even from online stores at affordable prices.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card aquarium-card">
                            <img src="{{ asset('frontend/assets/images/offerings/plants.jpg') }}" alt="Plants">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Plants</h3>
                                <p class="mb-0">Using living plants in a fish tank has many beneficial features. Various types of plants can be used in these tanks to add to the beauty of the tank and the health of the fish.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card aquarium-card">
                            <img src="{{ asset('frontend/assets/images/offerings/wateractivities.jpg') }}" alt="Water Additives">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Water Additives</h3>
                                <p class="mb-0">There are various types of additives which can be used in the fish tank so that it remains healthy. However, different types of solutions are used for different types of water.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card aquarium-card">
                            <img src="{{ asset('frontend/assets/images/offerings/rocks.jpg') }}" alt="Rocks">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Rocks</h3>
                                <p class="mb-0">Another variety of embellishment is the rocks which are specifically manufactured for these tanks. Most of the online and offline stores showcase a huge plethora of rocks in different sizes, shapes, colors and styles to suit different types of tanks.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card aquarium-card">
                            <img src="{{ asset('frontend/assets/images/offerings/lights.jpg') }}" alt="Lights">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Lights</h3>
                                <p class="mb-0">Proper lighting is another important aspect to consider while installing tanks. Today there are various options to consider such as LED lights, fluorescent lights and so forth.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="bg-white rounded shadow-sm p-4 p-lg-5 h-100">
                            <h3 class="mb-4">A balanced aquarium setup</h3>
                            <p>Good aquarium care combines water circulation, filtration, lighting, decoration, and the right additives. These components help create a stable environment for fish and other aquatic pets.</p>
                            <p class="mb-0">Choosing the right accessories based on tank size and species is the easiest way to keep the aquarium healthy and attractive.</p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-white rounded shadow-sm p-4 h-100">
                            <h4 class="mb-4">Popular categories</h4>
                            <ul class="list-unstyled aquarium-list mb-0">
                                <li>Pumps</li>
                                <li>Filters</li>
                                <li>Ornaments</li>
                                <li>Plants</li>
                                <li>Water additives</li>
                                <li>Rocks and lighting</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection