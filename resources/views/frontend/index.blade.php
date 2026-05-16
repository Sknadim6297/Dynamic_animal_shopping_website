@extends('layouts.layout')
@section('styles')
@endsection
@section('content')

    <style>
        #blog-slider-services .blog-wrap-modern {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        #blog-slider-services .blog-wrap-modern .img img {
            width: 100%;
            height: 420px;
            /* fixed image height */
            object-fit: cover;
        }

        #blog-slider-services .blog-wrap-modern .content {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        #blog-slider-services .blog-wrap-modern .description {
            flex-grow: 1;
        }

        #blog-slider-services .blog-wrap-modern .bottom-content {
            margin-top: auto;
        }
    </style>

    <section class="home-vet-slider">
        <div class="container-fluid">
            <div id="rev_slider_26_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="mask-showcase"
                data-source="gallery" style="background:#aaaaaa;padding:0px;">
                <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                <div id="rev_slider_26_1" class="rev_slider fullscreenbanner tiny_bullet_slider" style="display:none;"
                    data-version="5.4.1">
                    <ul>
                        @forelse($banners as $index => $banner)
                            <!-- SLIDE {{ $index + 1 }} -->
                            <li data-index="rs-{{ $banner->id }}" data-transition="fade" data-slotamount="default"
                                data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                data-easeout="default" data-masterspeed="300" data-thumb="" data-rotate="0"
                                data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3=""
                                data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                                data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="{{ asset($banner->banner_image) }}" data-kenburns="on" data-duration="5000"
                                    data-ease="Power3.easeInOut" data-scalestart="110" data-scaleend="100"
                                    data-rotatestart="0"
                                    style='background:linear-gradient(90deg, rgba(134,143,150,1) 0%, rgba(89,97,100,1) 100%)'
                                    alt="{{ $banner->heading ?? 'Banner' }}" data-bgposition="center center"
                                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg"
                                    data-no-retina>
                                <!-- LAYERS -->

                                @if ($banner->heading)
                                    <!-- LAYER NR. 1 - Main Heading (Large) -->
                                    <div class="tp-caption tp-resizeme" id="slide-{{ $banner->id }}-layer-1"
                                        data-x="['left','left','left','left']" data-hoffset="['750','650','550','150']"
                                        data-y="['middle','middle','middle','middle']"
                                        data-voffset="['-110','-110','-120','-100']" data-fontsize="['70','70','70','50']"
                                        data-lineheight="['70','70','70','50']" data-width="['320','320','320','320']"
                                        data-height="['90','90','90','90']" data-whitespace="normal" data-type="text"
                                        data-responsive_offset="on"
                                        data-frames='[{"delay":200,"speed":750,"sfxcolor":"#27304b","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]'
                                        data-textAlign="['left','left','left','left']" data-paddingtop="[20,20,20,20]"
                                        data-paddingright="[20,20,20,20]" data-paddingbottom="[30,30,30,30]"
                                        data-paddingleft="[20,20,20,20]"
                                        style="z-index: 8; font-family: 'Changa', sans-serif; min-width: 650px; max-width: 650px; white-space : normal; font-size: 80px; line-height: 70px; font-weight: 400; color: #ffffff; letter-spacing: -2px; font-weight: 700;">
                                        {{ $banner->heading }} </div>
                                @endif

                                @if ($banner->mid_heading)
                                    <!-- LAYER NR. 2 - Mid Heading -->
                                    <div class="tp-caption tp-resizeme" id="slide-{{ $banner->id }}-layer-2"
                                        data-x="['left','left','left','left']" data-hoffset="['770','670','570','170']"
                                        data-y="['middle','middle','middle','middle']"
                                        data-voffset="['-30','-30','-50','-50']" data-width="['440','180','180','100']"
                                        data-fontsize="['40','40','40','30']" data-whitespace="nowrap" data-type="text"
                                        data-responsive_offset="on"
                                        data-frames='[{"delay":400,"speed":750,"sfxcolor":"#27304b","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]'
                                        data-textAlign="['inherit','inherit','inherit','inherit']"
                                        data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                        style="z-index: 6; color: #191919; font-size: 40px; font-weight: 700; font-family: 'Changa', sans-serif;">
                                        {{ $banner->mid_heading }} </div>
                                @endif

                                @if ($banner->description)
                                    <!-- LAYER NR. 3 - Description -->
                                    <div class="tp-caption tp-resizeme" id="slide-{{ $banner->id }}-layer-3"
                                        data-x="['left','left','left','left']" data-hoffset="['750','650','550','150']"
                                        data-y="['middle','middle','middle','middle']" data-voffset="['20','30','10','0']"
                                        data-width="['470','480','400','300']" data-fontsize="['20','20','20','16']"
                                        data-height="none" data-whitespace="normal" data-type="text"
                                        data-responsive_offset="on"
                                        data-frames='[{"delay":300,"speed":750,"sfxcolor":"#27304b","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]'
                                        data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]"
                                        data-paddingright="[20,20,20,20]" data-paddingbottom="[10,10,10,10]"
                                        data-paddingleft="[20,20,20,20]"
                                        style="z-index: 7; white-space: normal; font-size: 20px; line-height: 20px; font-weight: 400; color: #ffffff; font-family:'Karla', sans-serif;">
                                        {{ $banner->description }} </div>
                                @endif

                                <!-- LAYER NR. 4 - Button -->
                                <div class="tp-caption btn-theme bg-orange btn-shadow"
                                    id="slide-{{ $banner->id }}-layer-4" data-x="['left','left','left','left']"
                                    data-hoffset="['770','670','570','170']"
                                    data-y="['middle','middle','middle','middle']" data-voffset="['100','100','80','80']"
                                    data-width="['180','180','180','150']" data-height="none" data-whitespace="normal"
                                    data-type="button" data-responsive_offset="on"
                                    data-frames='[{"delay":500,"speed":1000,"sfxcolor":"#27304b","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(0,0,0);bg:rgb(255,255,255);"}]'
                                    data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[30,30,30,20]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[30,30,30,20]" data-fontsize="['18','18','18','14']"
                                    style="z-index: 5; white-space: normal; font-size: 18px; line-height: 50px; font-weight: 400; color: #191919; font-family:'Karla', sans-serif;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; font-weight: 600; text-transform: uppercase; box-shadow: 0px 4px 13px 0px rgb(152 203 70 / 50%); background: #FFF;">
                                </div>
                            </li>
                        @empty
                            <!-- Default slide if no banners found -->
                            <li data-index="rs-default" data-transition="fade" data-slotamount="default"
                                data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                data-easeout="default" data-masterspeed="300" data-thumb="" data-rotate="0"
                                data-saveperformance="off" data-title="Slide" data-description="">
                                <img src="{{ asset('frontend/assets/images/slider/slider_h21.jpg') }}" data-kenburns="on"
                                    data-duration="5000" data-ease="Power3.easeInOut" data-scalestart="110"
                                    data-scaleend="100"
                                    style='background:linear-gradient(90deg, rgba(134,143,150,1) 0%, rgba(89,97,100,1) 100%)'
                                    alt="Default Banner" data-bgposition="center center" data-bgfit="cover"
                                    data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                            </li>
                        @endforelse
                    </ul>
                    <div class="tp-bannertimer tp-bottom" style="height: 5px; background: rgba(255, 255, 255, 0.15);">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Welcome To PetHund Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="home-vet-welcome">
                            <h1 class="heading-main wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
                                <small>Our success story <i class="pethund_repeat_grid"></i></small>
                                @if (isset($homeAbout) && $homeAbout->section_heading)
                                    <span>{{ $homeAbout->section_heading }}</span>
                                @else
                                    <span>Experience Vet </span> Clinic & Services
                                @endif
                            </h1>
                            @if (isset($homeAbout) && $homeAbout->year_of_experience)
                                <div class="year-gone wow fadeInRight" data-wow-duration="0" data-wow-delay="0s">
                                    <span>{{ $homeAbout->year_of_experience }} Years</span> Experience
                                </div>
                            @else
                                <div class="year-gone wow fadeInRight" data-wow-duration="0" data-wow-delay="0s">
                                    <span>25 Years</span> Experience
                                </div>
                            @endif
                            @if (isset($homeAbout) && $homeAbout->description)
                                <p>{{ $homeAbout->description }}</p>
                            @else
                                <p>At Pethund, the ambition is that you should always feel welcome both as an advertiser and
                                    a visitor. A modern and easy-to-manage page makes it easier for Users to maneuver
                                    forward. or then randomised words which don't look even slightly believable you need to
                                    be sure there isn't anything embarrassing vestibu lum at eros.</p>
                            @endif

                            <a href="{{ route('about') }}" class="btn-theme bg-navy-blue btn-shadow mt-4">Discover
                                More</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wide-tb-80">
                            @php
                                $rightSections = [];
                                if (isset($homeAbout)) {
                                    for ($i = 1; $i <= 4; $i++) {
                                        $heading = trim((string) ($homeAbout->{'right_heading_' . $i} ?? ''));
                                        $description = trim((string) ($homeAbout->{'right_description_' . $i} ?? ''));
                                        if ($heading !== '' || $description !== '') {
                                            $rightSections[] = [
                                                'heading' => $heading,
                                                'description' => $description,
                                            ];
                                        }
                                    }
                                }
                            @endphp

                            @if (count($rightSections) > 0)
                                @foreach ($rightSections as $section)
                                    @if ($section['heading'] !== '')
                                        <h4>{{ $section['heading'] }}</h4>
                                    @endif

                                    @if ($section['description'] !== '')
                                        @php
                                            $lines = preg_split('/\r\n|\r|\n/', $section['description']);
                                            $lines = array_values(array_filter(array_map('trim', $lines), fn($line) => $line !== ''));
                                            $isBulletList = count($lines) > 1 && collect($lines)->every(fn($line) => str_starts_with($line, '-') || str_starts_with($line, '*'));
                                        @endphp

                                        @if ($isBulletList)
                                            <ul>
                                                @foreach ($lines as $line)
                                                    <li>{{ ltrim(substr($line, 1)) }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>{!! nl2br(e($section['description'])) !!}</p>
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                <h4>PET STORE</h4>

                                <h4>PET GROOMING</h4>

                                <h4>CLINICAL SERVICES OFFERED:</h4>

                                <p><strong>PET OPD SERVICES:</strong></p>
                                <ul>
                                    <li>Doctor Consultation</li>
                                    <li>Vaccination by Registered Veterinary Practitioner</li>
                                    <li>Clinical Procedures</li>
                                    <li>Pharmacy</li>
                                    <li>Vet Nutritional Food / Supplements</li>
                                </ul>

                                <p><strong>PET DIAGNOSTICS:</strong></p>
                                <ul>
                                    <li>Basic to Advance Biochemistry Blood Tests</li>
                                    <li>Haematology Tests</li>
                                    <li>Hemoprotozoa Kit Tests</li>
                                    <li>Urine Routine Analysis</li>
                                </ul>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Welcome To PetHund End -->

        <!-- Quality & Experience Start -->
        @php
            $bgUrl = isset($homeService) && !empty($homeService->background_image) ? asset('storage/' . $homeService->background_image) : null;
        @endphp
        <section class="wide-tb-100 home-service-section" style="background-image: url('{{ $bgUrl }}');">
            <div class="bg-overlay" style="background: linear-gradient(90deg, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.15) 60%); position: absolute; inset: 0;"></div>
            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="heading-main light-mode wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
                            <small>Quality & Experience <i class="pethund_repeat_grid"></i></small>
                            @if (isset($homeService) && $homeService->heading)
                                {!! $homeService->heading !!}
                            @else
                                Best Pet <span class="txt-blue">Care Service</span>
                            @endif
                        </h1>

                        @if (isset($homeService) && $homeService->description)
                            <p class="txt-white">{{ $homeService->description }}</p>
                        @else
                            <p class="txt-white">Trusted pet care services designed for comfort, safety, and happiness. Our experienced team provides professional grooming, daycare, and home care solutions tailored for your pets.</p>
                        @endif

                        <div class="mt-4">
                            <a href="{{ route('grooming') }}#booking-form" class="btn-theme bg-navy-blue capusle mt-2 btn-shadow">Book Appointment</a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <!-- Right side intentionally left empty: background image covers this area -->
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        @if (isset($homeService) && ($homeService->video_file || $homeService->video))
                            <div class="mt-3">
                                @if($homeService->video_file)
                                    <video controls style="width:100%; max-height:420px; border-radius:12px; background:#000;">
                                        <source src="{{ asset('storage/' . $homeService->video_file) }}" type="video/mp4">
                                    </video>
                                @else
                                    <a href="{{ $homeService->video }}" class="popup-video"><i class="icofont-play"></i></a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <style>
                .home-service-section {
                    background-size: cover;
                    background-position: right center;
                    position: relative;
                    color: #fff;
                }

                .home-service-section .bg-overlay {
                    pointer-events: none;
                }

                @media (max-width: 991px) {
                    .home-service-section { background-position: center center; }
                    .home-service-section .col-lg-6 { text-align: left; }
                }
            </style>
        </section>
        <!-- Quality & Experience End -->

        <!-- Meet Our Groomers Start -->
        {{-- <section class="wide-tb-100">
            <div class="container">
                <h1 class="heading-main center wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
                    <small>Our perfect staff <i class="pethund_repeat_grid"></i></small>
                    <span>Meet Our</span> Groomers
                </h1>
                <div class="owl-carousel owl-theme" id="team-slider-about">
                    @forelse($groomers as $groomer)
                        <!-- Team Wrap -->
                        <div class="item">
                            <div class="team-section-wrap">
                                <div class="img">
                                    <div class="social-icons">
                                        <a href="#"><i data-feather="twitter"></i></a>
                                        <a href="#"><i data-feather="facebook"></i></a>
                                        <a href="#"><i data-feather="instagram"></i></a>
                                    </div>
                                    @if ($groomer->image)
                                        <img src="{{ asset($groomer->image) }}" alt="{{ $groomer->name ?? 'Groomer' }}">
                                    @else
                                        <img src="{{ asset('frontend/assets/images/team/team-1.jpg') }}"
                                            alt="{{ $groomer->name ?? 'Groomer' }}">
                                    @endif
                                </div>
                                <div class="team-name">
                                    <h4><a
                                            href="{{ route('groomer.details', $groomer->id) }}">{{ $groomer->name ?? 'N/A' }}</a>
                                    </h4>
                                    <div><strong>{{ $groomer->profession ?? 'Groomer' }}</strong></div>
                                </div>
                                <a href="{{ route('groomer.details', $groomer->id) }}" class="read-more-arrow">
                                    Read More <span> <i class="icofont-simple-right"></i></span>
                                </a>
                            </div>
                        </div>
                        <!-- Team Wrap -->
                    @empty
                        <!-- Default Team Members if no groomers -->
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="item">
                                <div class="team-section-wrap">
                                    <div class="img">
                                        <div class="social-icons">
                                            <a href="#"><i data-feather="twitter"></i></a>
                                            <a href="#"><i data-feather="facebook"></i></a>
                                            <a href="#"><i data-feather="instagram"></i></a>
                                        </div>
                                        <img src="{{ asset('frontend/assets/images/team/team-' . $i . '.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="team-name">
                                        <h4><a href="team-single.html">Team Member {{ $i }}</a></h4>
                                        <div><strong>Pet Trainer</strong></div>
                                    </div>
                                    <a href="team-single.html" class="read-more-arrow">
                                        Read More <span> <i class="icofont-simple-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        @endfor
                    @endforelse
                </div>

                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="text-center">
                            <strong>Meet our professionals</strong>
                            <p>We have an experienced qualified team to take care of your best friend</p>
                            <a href="{{ route('grooming') }}#booking-form" class="btn-theme bg-orange capusle bordered">View All
                                Team</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Meet Our Groomers End -->

        <!-- Pets Healthcare Tips Start -->
        {{-- <section class="wide-tb-150 pb-0 healthcare_tips">
            <div class="container">
                <h1 class="heading-main light-mode wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
                    <small>Care for your Pets <i class="pethund_repeat_grid"></i></small>
                    @if (isset($healthcare) && $healthcare->section_heading_main)
                        {!! $healthcare->section_heading_main !!}
                    @else
                        <span>Pets</span> Healthcare Tips
                    @endif
                </h1>

                <div class="row">
                    @if (isset($healthcare))
                        @if ($healthcare->heading_1)
                            <!-- Icon Boxes One Style -->
                            <div class="col-sm-6 col-lg-3 col-md-6">
                                <div class="icon-box-with-img">
                                    <div class="img">
                                        @if ($healthcare->image_1)
                                            <img src="{{ asset($healthcare->image_1) }}"
                                                alt="{{ $healthcare->heading_1 ?? '' }}">
                                        @else
                                            <img src="{{ asset('frontend/assets/images/icon-box-img-3.jpg') }}"
                                                alt="{{ $healthcare->heading_1 ?? '' }}">
                                        @endif
                                    </div>
                                    <div class="text">
                                        <h3>{{ $healthcare->heading_1 }}</h3>
                                        <p>{{ $healthcare->description_1 ?? '' }}</p>
                                        <a href="#" class="read-more-arrow">
                                            Read More <span> <i class="icofont-simple-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Icon Boxes One Style -->
                        @endif

                        @if ($healthcare->heading_2)
                            <!-- Icon Boxes One Style -->
                            <div class="col-sm-6 col-lg-3 col-md-6">
                                <div class="icon-box-with-img">
                                    <div class="img">
                                        @if ($healthcare->image_2)
                                            <img src="{{ asset($healthcare->image_2) }}"
                                                alt="{{ $healthcare->heading_2 ?? '' }}">
                                        @else
                                            <img src="{{ asset('frontend/assets/images/icon-box-img-2.jpg') }}"
                                                alt="{{ $healthcare->heading_2 ?? '' }}">
                                        @endif
                                    </div>
                                    <div class="text">
                                        <h3>{{ $healthcare->heading_2 }}</h3>
                                        <p>{{ $healthcare->description_2 ?? '' }}</p>
                                        <a href="#" class="read-more-arrow">
                                            Read More <span> <i class="icofont-simple-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Icon Boxes One Style -->
                        @endif
                    @else
                        <!-- Default Icon Boxes if no data -->
                        <!-- Icon Boxes One Style -->
                        <div class="col-sm-6 col-lg-3 col-md-6">
                            <div class="icon-box-with-img">
                                <div class="img">
                                    <img src="{{ asset('frontend/assets/images/icon-box-img-3.jpg') }}" alt="">
                                </div>
                                <div class="text">
                                    <h3>Pet Vaccination</h3>
                                    <p>Te feugiat recteque eloquentiam est. Sed at audire ornatus incorrupte.</p>
                                    <a href="#" class="read-more-arrow">
                                        Read More <span> <i class="icofont-simple-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Icon Boxes One Style -->

                        <!-- Icon Boxes One Style -->
                        <div class="col-sm-6 col-lg-3 col-md-6">
                            <div class="icon-box-with-img">
                                <div class="img">
                                    <img src="{{ asset('frontend/assets/images/icon-box-img-2.jpg') }}" alt="">
                                </div>
                                <div class="text">
                                    <h3>Healthy Food</h3>
                                    <p>Te feugiat recteque eloquentiam est. Sed at audire ornatus incorrupte.</p>
                                    <a href="#" class="read-more-arrow">
                                        Read More <span> <i class="icofont-simple-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Icon Boxes One Style -->
                    @endif

                    <!-- Spacer For Medium -->
                    <div class="w-100 d-none d-md-block d-lg-none spacer-60"></div>
                    <!-- Spacer For Medium -->

                    <div class="col-lg-6">
                        <div class="tip-veterinary-skills">
                            @if (isset($healthcare) && $healthcare->doctor_image)
                                <img src="{{ asset($healthcare->doctor_image) }}"
                                    alt="{{ $healthcare->doctor_name ?? 'Doctor' }}">
                            @else
                                <img src="{{ asset('frontend/assets/images/healthcare_tips_img.jpg') }}" alt="">
                            @endif
                            <h3 class="txt-orange mb-4 fw-7">
                                @if (isset($healthcare) && $healthcare->doctor_name)
                                    {{ $healthcare->doctor_name }}
                                @else
                                    Our Veterinary Skills
                                @endif
                            </h3>

                            @if (isset($healthcare))
                                @if ($healthcare->skill_1)
                                    <!-- Animated Skillbars Start -->
                                    <div class="skillbar-wrap">
                                        <div class="clearfix">
                                            {{ $healthcare->skill_1 }}
                                        </div>
                                        <div class="skillbar" data-percent="{{ $healthcare->skill_1_percentage ?? 0 }}%">
                                            <div class="skillbar-percent">{{ $healthcare->skill_1_percentage ?? 0 }}%
                                            </div>
                                            <div class="skillbar-bar"><i class="icofont-paw"></i></div>
                                        </div>
                                    </div>
                                    <!-- Animated Skillbars End -->
                                @endif

                                @if ($healthcare->skill_2)
                                    <!-- Animated Skillbars Start -->
                                    <div class="skillbar-wrap">
                                        <div class="clearfix">
                                            {{ $healthcare->skill_2 }}
                                        </div>
                                        <div class="skillbar" data-percent="{{ $healthcare->skill_2_percentage ?? 0 }}%">
                                            <div class="skillbar-percent">{{ $healthcare->skill_2_percentage ?? 0 }}%
                                            </div>
                                            <div class="skillbar-bar"><i class="icofont-paw"></i></div>
                                        </div>
                                    </div>
                                    <!-- Animated Skillbars End -->
                                @endif

                                @if ($healthcare->skill_3)
                                    <!-- Animated Skillbars Start -->
                                    <div class="skillbar-wrap">
                                        <div class="clearfix">
                                            {{ $healthcare->skill_3 }}
                                        </div>
                                        <div class="skillbar" data-percent="{{ $healthcare->skill_3_percentage ?? 0 }}%">
                                            <div class="skillbar-percent">{{ $healthcare->skill_3_percentage ?? 0 }}%
                                            </div>
                                            <div class="skillbar-bar"><i class="icofont-paw"></i></div>
                                        </div>
                                    </div>
                                    <!-- Animated Skillbars End -->
                                @endif
                            @else
                                <!-- Default Skills if no data -->
                                <!-- Animated Skillbars Start -->
                                <div class="skillbar-wrap">
                                    <div class="clearfix">
                                        Pet Dentistry
                                    </div>
                                    <div class="skillbar" data-percent="95%">
                                        <div class="skillbar-percent">85%</div>
                                        <div class="skillbar-bar"><i class="icofont-paw"></i></div>
                                    </div>
                                </div>
                                <!-- Animated Skillbars Start -->

                                <!-- Animated Skillbars Start -->
                                <div class="skillbar-wrap">
                                    <div class="clearfix">
                                        Pet Professionals
                                    </div>
                                    <div class="skillbar" data-percent="90%">
                                        <div class="skillbar-percent">90%</div>
                                        <div class="skillbar-bar"><i class="icofont-paw"></i></div>
                                    </div>
                                </div>
                                <!-- Animated Skillbars Start -->

                                <!-- Animated Skillbars Start -->
                                <div class="skillbar-wrap">
                                    <div class="clearfix">
                                        Overnight Care
                                    </div>
                                    <div class="skillbar" data-percent="65%">
                                        <div class="skillbar-percent">65%</div>
                                        <div class="skillbar-bar"><i class="icofont-paw"></i></div>
                                    </div>
                                </div>
                                <!-- Animated Skillbars Start -->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Pets Healthcare Tips End -->

        <!-- Counter Style Background Image -->
        {{-- <section class="wide-tb-100 bg-fixed bg-img-7 pos-rel counter-img-bg">
            <div class="bg-overlay blue opacity-80"></div>
            <div class="container">
                <div class="row">
                    @if ($counter)
                        @php
                            $icons = [
                                'pethund_pet_belt',
                                'pethund_pet_professional',
                                'pethund_pet_awards',
                                'pethund_pet_salon',
                            ];
                            $animations = ['fadeInLeft', 'fadeInLeft', 'fadeInRight', 'fadeInRight'];
                        @endphp
                        @for ($i = 1; $i <= 4; $i++)
                            <!-- Counter Col Start -->
                            <div class="col col-6 col-lg-3 col-sm-6 wow {{ $animations[$i - 1] }}">
                                <div class="counter-style-box">
                                    <p><i class="{{ $icons[$i - 1] }}"></i></p>
                                    <div class="counter-txt">
                                        <span class="counter">{{ $counter->{'counter_number_' . $i} ?? '0' }}</span>+
                                    </div>
                                    <div>{{ $counter->{'counter_heading_' . $i} ?? 'Counter ' . $i }}</div>
                                </div>
                            </div>
                            <!-- Counter Col End -->
                            @if ($i == 2)
                                <!-- Spacer For Medium -->
                                <div class="w-100 d-none d-md-block d-lg-none spacer-60"></div>
                                <!-- Spacer For Medium -->
                            @endif
                        @endfor
                    @else
                        <!-- Fallback to static content if no counter data -->
                        <!-- Counter Col Start -->
                        <div class="col col-6 col-lg-3 col-sm-6 wow fadeInLeft">
                            <div class="counter-style-box">
                                <p><i class="pethund_pet_belt"></i></p>
                                <div class="counter-txt"><span class="counter">325</span>+</div>
                                <div>Adopted Pets</div>
                            </div>
                        </div>
                        <!-- Counter Col End -->

                        <!-- Counter Col Start -->
                        <div class="col col-6 col-lg-3 col-sm-6 wow fadeInLeft">
                            <div class="counter-style-box">
                                <p><i class="pethund_pet_professional"></i></p>
                                <div class="counter-txt"><span class="counter">20</span>+</div>
                                <div>Professionals</div>
                            </div>
                        </div>
                        <!-- Counter Col End -->

                        <!-- Spacer For Medium -->
                        <div class="w-100 d-none d-md-block d-lg-none spacer-60"></div>
                        <!-- Spacer For Medium -->

                        <!-- Counter Col Start -->
                        <div class="col col-6 col-lg-3 col-sm-6 wow fadeInRight">
                            <div class="counter-style-box">
                                <p><i class="pethund_pet_awards"></i></p>
                                <div class="counter-txt"><span class="counter">14</span>+</div>
                                <div>Pet Awards</div>
                            </div>
                        </div>
                        <!-- Counter Col End -->

                        <!-- Counter Col Start -->
                        <div class="col col-6 col-lg-3 col-sm-6 wow fadeInRight">
                            <div class="counter-style-box">
                                <p><i class="pethund_pet_salon"></i></p>
                                <div class="counter-txt"><span class="counter">795</span>+</div>
                                <div>Pets Gromming</div>
                            </div>
                        </div>
                        <!-- Counter Col End -->
                    @endif
                </div>
            </div>
        </section> --}}
        <!-- Counter Style Background Image -->

        <!-- Image Tour Start -->
        <section class="wide-tb-100">
            <div class="container">
                <h1 class="heading-main center wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
                    <small>Image Tour <i class="pethund_repeat_grid"></i></small>
                    <span>Our</span> Gallery
                </h1>
            </div>

            <div class="owl-carousel owl-theme" id="gallery-sliding">
                @if ($galleries && count($galleries) > 0)
                    @foreach ($galleries as $gallery)
                        @if ($gallery->primary_image)
                            <div class="gallery-item item">
                                <div class="captured-gallery-item">
                                    <div class="gallery-content">
                                        <span href="{{ asset($gallery->primary_image) }}" title="{{ $gallery->pet_name }}"><i
                                                class="icofont-plus"></i></span>
                                        <h3><a href="#">{{ $gallery->pet_name }}</a></h3>
                                        <h5>{{ $gallery->category_label }}</h5>
                                        @if ($gallery->image_count > 1)
                                            <small>{{ $gallery->image_count }} photos</small>
                                        @endif
                                    </div>
                                    <img src="{{ asset($gallery->primary_image) }}" alt="{{ $gallery->pet_name }}">
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <!-- Fallback to static content if no gallery data -->
                    <div class="gallery-item item">
                        <div class="captured-gallery-item">
                            <div class="gallery-content">
                                <span href="{{ asset('frontend/assets/images/gallery/slide_gallery/gallery_img_1.jpg') }}"
                                    title="Sophie Cute"><i class="icofont-plus"></i></span>
                                <h3><a href="gallery-single.html">Sophie Cute</a></h3>
                                <h5>Dog</h5>
                            </div>
                            <img src="{{ asset('frontend/assets/images/gallery/slide_gallery/gallery_img_1.jpg') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="gallery-item item">
                        <div class="captured-gallery-item">
                            <div class="gallery-content">
                                <span href="{{ asset('frontend/assets/images/gallery/slide_gallery/gallery_img_2.jpg') }}"
                                    title="Charlie Happy"><i class="icofont-plus"></i></span>
                                <h3><a href="gallery-single.html">Charlie Happy</a></h3>
                                <h5>Kitten</h5>
                            </div>
                            <img src="{{ asset('frontend/assets/images/gallery/slide_gallery/gallery_img_2.jpg') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="gallery-item item">
                        <div class="captured-gallery-item">
                            <div class="gallery-content">
                                <span href="{{ asset('frontend/assets/images/gallery/slide_gallery/gallery_img_3.jpg') }}"
                                    title="Gizmo Moody"><i class="icofont-plus"></i></span>
                                <h3><a href="gallery-single.html">Gizmo Moody</a></h3>
                                <h5>Dog</h5>
                            </div>
                            <img src="{{ asset('frontend/assets/images/gallery/slide_gallery/gallery_img_3.jpg') }}"
                                alt="">
                        </div>
                    </div>
                @endif
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('gallery') }}" class="btn-theme bg-orange btn-shadow mt-4">View Full Gallery</a>
            </div>
        </section>
        <!-- Image Tour End -->




        <section class="wide-tb-100 bg-snow pos-rel bg-navy-blue pb-0 clients-rounded-wrap home-vet-testimonial">

            <div class="wide-tb-10">
                <div class="container">
                    <div class="row">
                        <!-- Heading Main -->
                        <div class="col-sm-12 wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
                            <h1 class="heading-main light-mode center wow fadeInDown" data-wow-duration="0"
                                data-wow-delay="0s">
                                <small>Feedback From Others <i class="pethund_repeat_grid"></i></small>
                                <span>What Our</span> Clients Say
                            </h1>
                        </div>
                        <!-- Heading Main -->
                    </div>
                    <div class="testimonial-side-img">
                        <div class="owl-carousel owl-theme" id="testimonial-side-img">
                            @forelse($testimonials as $testimonial)
                                <!-- Client Testimonials Slider Item -->
                                <div class="item">
                                    <div class="client-testimonial d-md-flex align-items-center">
                                        <div class="testimonial-rounded">
                                            <div class="quote-icon-green">
                                                <i class="pethund_quotes"></i>
                                            </div>
                                            <div>
                                                @if ($testimonial->review_details)
                                                    {{ $testimonial->review_details }}
                                                @else
                                                    Proin viverra nisi at nisl imperdiet auctor. Donec ornare, est sed
                                                    tincidunt placerat, sem mi suscipit mi.
                                                @endif
                                            </div>
                                        </div>
                                        <div class="client-testimonial-icon order-md-first mt-4 mt-md-0">
                                            @if ($testimonial->image)
                                                <img src="{{ asset($testimonial->image) }}"
                                                    alt="{{ $testimonial->client_name }}">
                                            @else
                                                <img src="{{ asset('frontend/assets/images/testimonial_thumb_large_1.jpg') }}"
                                                    alt="{{ $testimonial->client_name }}">
                                            @endif
                                            <h3>
                                                {{ $testimonial->client_name }}
                                                @if ($testimonial->is_pet_owner)
                                                    <span>Pet Owner</span>
                                                @endif
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Client Testimonials Slider Item -->
                            @empty
                                <!-- Default Testimonials if no data -->
                                <div class="item">
                                    <div class="client-testimonial d-md-flex align-items-center">
                                        <div class="testimonial-rounded">
                                            <div class="quote-icon-green">
                                                <i class="pethund_quotes"></i>
                                            </div>
                                            <div>Proin viverra nisi at nisl imperdiet auctor. Donec ornare, est sed
                                                tincidunt placerat, sem mi suscipit mi.</div>
                                        </div>
                                        <div class="client-testimonial-icon order-md-first mt-4 mt-md-0">
                                            <img src="{{ asset('frontend/assets/images/testimonial_thumb_large_1.jpg') }}"
                                                alt="">
                                            <h3>Tina Cambell <span>Pet Owner</span></h3>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- Recent Blog Post Start -->
        <section class="wide-tb-100">
            <div class="container">
                <h1 class="heading-main center wow fadeInDown" data-wow-duration="0" data-wow-delay="0s">
                    <small>Recent Blog Post <i class="pethund_repeat_grid"></i></small>
                    <span>Latest News </span> & Articles
                </h1>

                <div class="owl-carousel owl-theme" id="blog-slider-services">
                    @forelse($blogs as $blog)
                        <!-- Blog Slides -->
                        <div class="item">
                            <div class="blog-wrap-modern">
                                <div class="img">
                                    <a href="{{ route('blog.details', $blog->id) }}"><img
                                            src="{{ asset($blog->image) }}" alt="{{ $blog->blog_heading }}"></a>
                                </div>
                                <div class="content">
                                    <h3 class="title">
                                        <a href="{{ route('blog.details', $blog->id) }}">{{ $blog->blog_heading }}</a>
                                    </h3>
                                    <div class="description">
                                        <p>{{ Str::limit(strip_tags($blog->blog_details), 100) }}</p>
                                    </div>
                                    <div class="bottom-content">
                                        <div class="thumb-author">
                                            @if ($blog->posted_by_image)
                                                <img src="{{ asset($blog->posted_by_image) }}"
                                                    alt="{{ $blog->posted_by }}">
                                            @else
                                                <img src="{{ asset('frontend/assets/images/testimonial_thumb_large_1.jpg') }}"
                                                    alt="{{ $blog->posted_by }}">
                                            @endif
                                            {{ $blog->posted_by }}
                                        </div>
                                        <div class="date">{{ $blog->posting_date->format('d M') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Blog Slides -->
                    @empty
                        <!-- Default Blog Items if no blogs -->
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="item">
                                <div class="blog-wrap-modern">
                                    <div class="img">
                                        <a href="blog-single.html"><img
                                                src="{{ asset('frontend/assets/images/blog/blog_modern_' . $i . '.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="content">
                                        <h3 class="title">
                                            <a href="blog-single.html">Sample Blog Post {{ $i }}</a>
                                        </h3>
                                        <div class="description">
                                            <p>Proin viverra nisi at nisl imperdiet auctor. Donec ornare, est sed tincidunt
                                                placerat, sem mi suscipit mi.</p>
                                        </div>
                                        <div class="bottom-content">
                                            <div class="thumb-author">
                                                <img src="{{ asset('frontend/assets/images/testimonial_thumb_large_1.jpg') }}"
                                                    alt="">
                                                Admin
                                            </div>
                                            <div class="date">{{ date('d M') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    @endforelse
                </div>
            </div>
        </section>
        <!-- Recent Blog Post End -->


    </main>

@endsection
