    <!-- Page loader Start -->
    <div id="pageloader">
        <div class="loader-item">
            <div class="loader-item-content">
                <i class="icofont-paw"></i>
            </div>
        </div>
    </div>
    <!-- Page loader End -->

    <b class="screen-overlay"></b>

    @php
        $headerSettings = \App\Models\HeaderSettings::first();
    @endphp

    <header class="home-vet header-anim">
        @php
            $phoneNumbers = $headerSettings && $headerSettings->phone
                ? preg_split('/[\r\n,]+/', $headerSettings->phone, -1, PREG_SPLIT_NO_EMPTY)
                : [];
        @endphp
        <div class="top-bar-right d-flex align-items-center text-md-left">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col d-flex align-items-center contact-info">
                        @if ($headerSettings && $headerSettings->address)
                            <div>
                                <i data-feather="map-pin"></i> {{ $headerSettings->address }}
                            </div>
                        @endif
                        @if ($headerSettings && $headerSettings->email)
                            <div>
                                <i data-feather="mail"></i> <a
                                    href="mailto:{{ $headerSettings->email }}">{{ $headerSettings->email }}</a>
                            </div>
                        @endif
                        @if (!empty($phoneNumbers))
                            @php
                                $phoneLinks = collect($phoneNumbers)->map(function($p) {
                                    $tel = preg_replace('/[^0-9+]/', '', $p);
                                    return '<a href="tel:'. $tel .'">'. e(trim($p)) .'</a>';
                                })->implode(' / ');
                            @endphp
                            <div>
                                <i data-feather="smartphone"></i>
                                {!! $phoneLinks !!}
                            </div>
                        @endif
                    </div>

                    <div class="col-md-auto">
                        <div class="social-icons">
                            @if ($headerSettings && $headerSettings->social_text)
                                <span>{{ $headerSettings->social_text }}</span>
                            @else
                                <span>We are social</span>
                            @endif
                            @if ($headerSettings && $headerSettings->facebook_url)
                                <a href="{{ $headerSettings->facebook_url }}" target="_blank"><i
                                        data-feather="facebook"></i></a>
                            @else
                                <a href="#"><i data-feather="facebook"></i></a>
                            @endif
                            @if ($headerSettings && $headerSettings->twitter_url)
                                <a href="{{ $headerSettings->twitter_url }}" target="_blank"><i
                                        data-feather="twitter"></i></a>
                            @else
                                <a href="#"><i data-feather="twitter"></i></a>
                            @endif
                            @if ($headerSettings && $headerSettings->instagram_url)
                                <a href="{{ $headerSettings->instagram_url }}" target="_blank"><i
                                        data-feather="instagram"></i></a>
                            @else
                                <a href="#"><i data-feather="instagram"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Navigation Start -->
        <nav class="navbar navbar-expand-lg header-fullpage">
            <div class="container-fluid">
                <div class="d-flex align-items-center logo-brand">
                    <a class="navbar-brand rounded-bottom light-bg" href="{{ route('home') }}">
                        @if ($headerSettings && $headerSettings->logo_dark)
                            <img src="{{ asset($headerSettings->logo_dark) }}" alt=""
                                style="max-width: 200px; height: auto;">
                        @else
                            <img src="{{ asset('frontend/assets/images/logo_dark.svg') }}" alt=""
                                style="max-width: 200px; height: auto;">
                        @endif
                    </a>
                </div>
                <!-- Topbar Request Quote Start -->
                <div class="d-inline-flex order-lg-last col-auto align-items-center ps-lg-3">
                    <!-- Toggle Button Start -->
                    <button class="navbar-toggler x collapsed icon-lines" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Toggle Button End -->
                </div>
                <!-- Topbar Request Quote End -->

                <div class="navbar-collapse offcanvas offcanvas-start offcanvas-collapse" id="navbarCollapse">
                    <!-- Mobile Logo -->
                    <div class="offcanvas-header">
                        <a href="{{ route('home') }}" class="logo-small">
                            @if ($headerSettings && $headerSettings->logo_white)
                                <img src="{{ asset($headerSettings->logo_white) }}" alt=""
                                    style="max-width: 180px; height: auto;">
                            @else
                                <img src="{{ asset('frontend/assets/images/logo_white.svg') }}" alt=""
                                    style="max-width: 180px; height: auto;">
                            @endif
                        </a>
                        <button class="navbar-toggler x collapsed" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="icofont-close-line"></i>
                        </button>
                    </div>
                    <!-- Mobile Logo -->
                    <!-- Mobile Menu -->
                    <div class="offcanvas-body" data-lenis-prevent>
                        <ul class="navbar-nav" style="padding-left: 20px;">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About Us</a>
                            </li>
                            <li class="nav-item dropdown">
                                <div class="d-flex align-items-center">
                                    <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                                    <a class="nav-link dropdown-toggle dropdown-toggle-split ms-0" href="#" id="galleryDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                        <span class="visually-hidden">Toggle Gallery Dropdown</span>
                                    </a>
                                </div>

                                <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('gallery.photos') }}">
                                            Photo Gallery
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('gallery.videos') }}">
                                            Video Gallery
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <div class="d-flex align-items-center">
                                    <a class="nav-link" href="{{ route('services') }}">Our Services</a>
                                    <a class="nav-link dropdown-toggle dropdown-toggle-split ms-0" href="#"
                                        id="servicesDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" aria-haspopup="true">
                                        <span class="visually-hidden">Toggle Services Dropdown</span>
                                    </a>
                                </div>

                                <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('grooming') }}">
                                            Pet Grooming
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('petclinic') }}">
                                            Pet Clinic
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="offeringsDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Our Offerings
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="offeringsDropdown">
                                    <li><a class="dropdown-item" href="{{ route('pet.food') }}">Pet Food</a></li>
                                    <li><a class="dropdown-item" href="{{ route('pet.treats') }}">Pet Treats</a></li>
                                    <li><a class="dropdown-item" href="{{ route('pet.supplements') }}">Pet Supplements</a></li>
                                    <li><a class="dropdown-item" href="{{ route('pet.accessories') }}">Pet Accessories</a></li>
                                    <li><a class="dropdown-item" href="{{ route('pet.aquariums') }}">Aquariums & Accessories</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Mobile Menu -->
                    <!-- Main Navigation End -->
                </div>
            </div>
        </nav>
        <!-- Main Navigation End -->
    </header>

    <style>
        /* ===== HEADER HEIGHT FIX ===== */
        header.home-vet {
            padding: 0 !important;
        }

        /* ===== TOP BAR COMPACT ===== */
        .top-bar-right {
            padding: 5px 0 !important;
            font-size: 13px;
        }

        .top-bar-right .contact-info div {
            margin-right: 15px;
            font-size: 13px;
        }

        /* Reduce icon size */
        .top-bar-right i {
            width: 14px;
            height: 14px;
        }

        /* ===== NAVBAR HEIGHT FIX ===== */
        .navbar.header-fullpage {
            padding: 6px 0 !important;
            min-height: auto !important;
        }

        /* Remove extra spacing from container */
        .navbar .container-fluid {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        /* ===== LOGO SIZE REDUCE ===== */
        .logo-brand .navbar-brand img {
            max-width: 120px !important;
            /* ↓ reduced from 200px */
            height: auto !important;
        }

        /* Mobile logo */
        .logo-small img {
            max-width: 110px !important;
        }

        /* ===== REMOVE EXTRA GAP ===== */
        .navbar-brand {
            padding: 0 !important;
            margin: 0 !important;
        }

        /* ===== MENU ALIGNMENT FIX ===== */
        .navbar-nav {
            align-items: center;
        }

        .navbar-nav .nav-link {
            padding: 8px 12px !important;
            font-size: 14px;
        }

        /* ===== SOCIAL ICONS ===== */
        .social-icons span {
            font-size: 13px;
            margin-right: 8px;
        }

        .social-icons a {
            margin-left: 5px;
        }

        /* ===== TOGGLER BUTTON FIX ===== */
        .navbar-toggler {
            padding: 5px 8px !important;
        }

        /* ===== REMOVE LARGE WHITE SPACE ===== */
        .header-fullpage,
        .navbar {
            margin-bottom: 0 !important;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {

            .top-bar-right {
                font-size: 12px;
            }

            .logo-brand .navbar-brand img {
                max-width: 95px !important;
            }

            .logo-small img {
                max-width: 90px !important;
            }

            .navbar-nav .nav-link {
                font-size: 13px;
            }
        }
    </style>
