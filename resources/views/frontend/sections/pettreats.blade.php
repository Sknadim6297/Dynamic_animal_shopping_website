@extends('layouts.layout')

@section('styles')
    <style>
        .pet-treats-hero {
            background: linear-gradient(135deg, rgba(77, 50, 17, 0.96), rgba(138, 88, 27, 0.92));
            color: #fff;
        }

        .pet-treats-card {
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(12, 26, 44, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            height: 100%;
        }

        .pet-treats-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 50px rgba(12, 26, 44, 0.14);
        }

        .pet-treats-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .pet-treats-badge {
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

        .pet-treats-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(12, 26, 44, 0.08);
        }

        .pet-treats-list li:last-child {
            border-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <section class="breadcrumbs-page-wrap">
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page pet-treats-hero">
            <img class="ptt-png" src="{{ asset('frontend/assets/images/Dot-Shape.png') }}" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('services') }}">Our Offerings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pet Treats</li>
                    </ol>
                </nav>
                <h1>Pet Treats</h1>
                <p class="mb-0">Reward treats, chews, and training snacks for daily use and positive reinforcement.</p>
            </div>
        </div>
    </section>

    <main id="body-content">
        <section class="wide-tb-100 bg-light">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <span class="pet-treats-badge mb-3">Our Offerings</span>
                        <h2 class="mb-3">Pet Treats</h2>
                        <p class="mb-0">Pet treats are made from combinations of meat or meat-derived materials with other ingredients such as starches, vegetables, fruits, cereal flours, fats, oils, and additives. They are ideal for rewarding good behavior and supporting training.</p>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-treats-card">
                            <img src="{{ asset('frontend/assets/images/offerings/crunchytreats.jpg') }}" alt="Crunchy Treats">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Crunchy Treats</h3>
                                <p class="mb-0">Dog treats are excellent rewards for good behavior and useful in training. We keep a range of crunchy options from popular brands to help make learning and rewarding easier.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-treats-card">
                            <img src="{{ asset('frontend/assets/images/offerings/dogtreats.jpg') }}" alt="Soft Treats">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Soft Treats</h3>
                                <p class="mb-0">Soft dog chews are generally chewy treats or freeze-dried treats that are softer in texture than a crunchy biscuit or milk bone-style treat.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-treats-card">
                            <img src="{{ asset('frontend/assets/images/offerings/jerky.jpg') }}" alt="Jerky Treats">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Jerky</h3>
                                <p class="mb-0">Jerky treats are tender strips dog snacks made with a meat-forward recipe and are often enriched with vitamins, minerals, and fatty acids for coat and skin support.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-treats-card">
                            <img src="{{ asset('frontend/assets/images/offerings/chewbones.jpg') }}" alt="Chew and Bones">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Chew &amp; Bones</h3>
                                <p class="mb-0">Chewing helps dogs explore, exercise their jaws, and clean their teeth. Hard chew toys and bones also support healthy daily enrichment.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card pet-treats-card">
                            <img src="{{ asset('frontend/assets/images/offerings/trainingtreats.jpg') }}" alt="Training Treats">
                            <div class="card-body p-4">
                                <h3 class="h4 mb-3">Training Treats</h3>
                                <p class="mb-0">Reward-based training uses treats to reinforce the behaviors you want your dog to repeat. Small, tasty treats work best for frequent positive reinforcement.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="bg-white rounded shadow-sm p-4 p-lg-5 h-100">
                            <h3 class="mb-4">Choosing the right treat</h3>
                            <p>Treats should be selected based on your dog's size, chewing style, and training goals. Chew treats and bones can help with enrichment, while training treats work best when they are small and easy to reward with repeatedly.</p>
                            <p class="mb-0">Always keep treats as part of a balanced diet and adjust portions if your pet receives frequent rewards during the day.</p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-white rounded shadow-sm p-4 h-100">
                            <h4 class="mb-4">Popular options</h4>
                            <ul class="list-unstyled pet-treats-list mb-0">
                                <li>Crunchy treats for reward training</li>
                                <li>Soft treats and chews</li>
                                <li>Jerky snacks</li>
                                <li>Chew and bone treats</li>
                                <li>Training treats for positive reinforcement</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection