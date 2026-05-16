    <!-- Main Footer Start -->
    <footer class="footer-vet">
        <div class="footer-vet-inner">
            <div class="container footer-top-shops">
                <div class="row text-center text-md-start">

                    @foreach ($footerAddresses as $item)
                        <div class="col-md-4 col-12 shop-box">
                            <h5>{{ $item->shop_name }}</h5>

                            <p>
                                <i class="icofont-location-pin"></i>
                                {{ $item->address }}
                            </p>

                            <p>
                                <i class="icofont-phone"></i>
                                <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                            </p>

                            <p>
                                <i class="icofont-email"></i>
                                <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
        <div class="container">
            <div class="row">
                <!-- Column First -->
                <div class="col-lg-4 col-md-6 me-auto">
                    <div class="logo-footer">
                        @php
                            $headerSettings = \App\Models\HeaderSettings::first();
                        @endphp
                        @if ($headerSettings && $headerSettings->logo_footer)
                            <img src="{{ asset($headerSettings->logo_footer) }}" alt="">
                        @else
                            <img src="{{ asset('frontend/assets/images/logo_white_orange.svg') }}" alt="">
                        @endif
                    </div>
                    <p>We provide professional pet care services with experienced groomers and veterinarians dedicated
                        to keeping your pets healthy and happy.</p>
                    <div class="txt-white fw-7">
                        Emergency:
                    </div>
                    <div class="emergency-number">
                        @php
                            $footerPhones = [];
                            if (!empty($headerSettings->phone)) {
                                $footerPhones = preg_split('/[\r\n,]+/', $headerSettings->phone, -1, PREG_SPLIT_NO_EMPTY);
                            }
                        @endphp
                        @if (!empty($footerPhones))
                            @foreach($footerPhones as $fphone)
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $fphone) }}" class="footer-phone">{{ trim($fphone) }}</a>
                            @endforeach
                        @else
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', '(123) 456-789') }}" class="footer-phone">(123) 456-789</a>
                        @endif
                    </div>
                </div>
                <!-- Column First -->

                <!-- Column Second -->
                <div class="col-lg-2 col-md-6">
                    <h3 class="footer-heading">Explore</h3>
                    <div class="footer-widget-menu">
                        <ul class="list-unstyled">
                            <li><a href="{{ route('about') }}"><i class="icofont-simple-right"></i> <span>About
                                        Us</span></a></li>
                            <li><a href="{{ route('services') }}"><i class="icofont-simple-right"></i>
                                    <span>Services</span></a></li>
                            <li><a href="{{ route('grooming') }}"><i class="icofont-simple-right"></i> <span>Our
                                        Team</span></a></li>
                            <li><a href="{{ route('gallery') }}"><i class="icofont-simple-right"></i>
                                    <span>Gallery</span></a></li>
                            <li><a href="{{ route('blog') }}"><i class="icofont-simple-right"></i>
                                    <span>Blog</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Column Second -->

                <!-- Column Third -->
                <div class="col-lg-2 col-md-6">
                    <h3 class="footer-heading">Useful links</h3>
                    <div class="footer-widget-menu">
                        <ul class="list-unstyled">
                            <li><a href="{{ route('grooming') }}"><i class="icofont-simple-right"></i> <span>Grooming
                                        Booking</span></a></li>
                            <li><a href="{{ route('contact') }}"><i class="icofont-simple-right"></i> <span>Contact
                                        Us</span></a></li>
                            <li><a href="{{ route('home') }}"><i class="icofont-simple-right"></i>
                                    <span>Home</span></a></li>
                            @if ($headerSettings && $headerSettings->facebook_url)
                                <li><a href="{{ $headerSettings->facebook_url }}" target="_blank"><i
                                            class="icofont-simple-right"></i> <span>Facebook</span></a></li>
                            @endif
                            @if ($headerSettings && $headerSettings->instagram_url)
                                <li><a href="{{ $headerSettings->instagram_url }}" target="_blank"><i
                                            class="icofont-simple-right"></i> <span>Instagram</span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- Column Third -->

                <!-- Column Fourth -->
                <div class="col-lg-3 ms-auto col-md-6">
                    <h3 class="footer-heading">Our Photostream</h3>
                    <ul id="basicuse" class="photo-thumbs">
                        @php
                            $galleryImages = \App\Models\Gallery::latest()->get();
                            $photoCount = 0;
                        @endphp
                        @forelse($galleryImages as $gallery)
                            @if($gallery->images && is_array($gallery->images))
                                @foreach($gallery->images as $image)
                                    @if($photoCount < 6)
                                        <li>
                                            <a href="{{ asset($image) }}" title="{{ $gallery->pet_name ?? 'Pet Gallery' }}" data-lightbox="gallery">
                                                <img src="{{ asset($image) }}" alt="{{ $gallery->pet_name ?? 'Pet Gallery Image' }}" style="width: 100%; height: auto; display: block;" />
                                            </a>
                                        </li>
                                        @php $photoCount++; @endphp
                                    @endif
                                @endforeach
                            @endif
                        @empty
                            <li>
                                <p style="color: #ccc; font-size: 12px;">No photos available</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <!-- Column Fourth -->
            </div>
        </div>
    </footer>

    <div class="copyright-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div>Copyrights <span id="yearText"></span> <span class="txt-orange">Animal Pride</span> All Rights Reserved.</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Footer End -->

    <!-- Search Popup Start -->
    <div class="overlay overlay-hugeinc">
        <form class="form-inline mt-2 mt-md-0">
            <div class="form-inner">
                <div class="form-inner-div d-inline-flex align-items-center g-0">
                    <div class="col-md-1">
                        <i class="icofont-search"></i>
                    </div>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="overlay-close link-oragne"><i class="icofont-close-line"></i></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Search Popup End -->

    <!-- Back To Top Start -->
    <a id="mkdf-back-to-top" href="#" class="off"><i class="icofont-rounded-up"></i></a>
    <!-- Back To Top End -->

    <style>
        /* Top shop section */
        .footer-top-shops {
            padding: 40px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        /* Each shop box */
        .footer-top-shops .shop-box {
            padding: 15px 20px;
        }

        /* Title */
        .footer-top-shops h5 {
            color: #fff;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* Text */
        .footer-top-shops p {
            color: #ccc;
            margin-bottom: 6px;
            font-size: 14px;
        }

        /* Links - White Color */
        .footer-top-shops a {
            color: #fff;
            text-decoration: none;
        }

        .footer-top-shops a:hover {
            color: #ff7f00;
            /* theme orange */
        }

        /* Icons */
        .footer-top-shops i {
            margin-right: 6px;
            color: #ff7f00;
        }

        /* Responsive spacing */
        @media (max-width: 767px) {
            .footer-top-shops .shop-box {
                text-align: center;
                margin-bottom: 20px;
            }
        }

        /* Photo Thumbs Gallery Styling */
        .photo-thumbs {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
        }

        .photo-thumbs li {
            margin: 0;
            padding: 0;
            overflow: hidden;
            border-radius: 4px;
        }

        .photo-thumbs a {
            display: block;
            overflow: hidden;
            background: #000;
            aspect-ratio: 1;
        }

        .photo-thumbs img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
            display: block;
        }

        .photo-thumbs a:hover img {
            transform: scale(1.1);
        }
    </style>
    <style>
        .emergency-number .footer-phone {
            display: block;
            color: inherit;
            text-decoration: none;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .emergency-number .footer-phone:last-child {
            margin-bottom: 0;
        }
    </style>
