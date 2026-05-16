<!doctype html>
<html lang="en">

<!-- Mirrored from mannatstudio.com/html/pethund/home-vet.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Oct 2025 11:55:34 GMT -->
<head>
    <!-- xxx Basics xxx -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- xxx Change With Your Information xxx -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    <title>Animal Pride</title>
    <meta name="author" content="Mannat Studio">
    <meta name="description"
        content="PetHund is a Responsive HTML5 Template for Animals Shop & Veterinary related services.">
    <meta name="keywords"
        content="PetHund, animal care, cats, Dog grooming, dogs, pet, pet care, pet center, pet services, pet shelter, pet shop, shelter, vet clinic, vet store, veterinarian, veterinary">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.ico') }}">


    <!-- Main Style CSSS -->
    <link href="{{ asset('frontend/assets/css/theme-plugins.min.css') }}" rel="stylesheet">
    <!-- Main Theme CSS -->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <!-- Responsive Theme CSS -->
    <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">

    <!-- REVOLUTION NAVIGATION STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/revolution/css/navigation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/revolution/fonts/font-awesome/css/font-awesome.css') }}">
		
    @yield('styles')    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
    @include('frontend.sections.header')

    @yield('content')

    @include('frontend.sections.footer')

    @yield('script')

<!-- Jquery Library JS -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/theme-plugins.min.js') }}"></script>    
<!-- Theme Custom FIle -->
<script src="{{ asset('frontend/assets/js/site-custom.js') }}"></script>

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="{{ asset('frontend/assets/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->	
<script type="text/javascript" src="{{ asset('frontend/assets/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>

<script type="text/javascript">
    
    var tpj=jQuery;
    var revapi26;
    tpj(document).ready(function() {
        if(tpj("#rev_slider_26_1").revolution == undefined){
            revslider_showDoubleJqueryError("#rev_slider_26_1");
        }else{
            revapi26 = tpj("#rev_slider_26_1").show().revolution({
                sliderType:"standard",
                jsFileLocation:"{{ asset('frontend/assets/revolution/js') }}/",
                sliderLayout:"auto",
                dottedOverlay:"black",
                delay:9000,
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                     mouseScrollReverse:"default",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        touchOnDesktop:"off",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                    ,
                    arrows: {
                        style:"metis",
                        enable:false,
                        hide_onmobile:true,
                        hide_under:778,
                        hide_onleave:false,
                        tmp:'',
                        left: {
                            h_align:"left",
                            v_align:"center",
                            h_offset:15,
                            v_offset:0
                        },
                        right: {
                            h_align:"right",
                            v_align:"center",
                            h_offset:15,
                            v_offset:0
                        }
                    }
                    ,
                    bullets: {
                        enable:true,
                        hide_onmobile:false,
                        style:"zeus",
                        hide_onleave:false,
                        direction:"horizontal",
                        h_align:"center",
                        v_align:"bottom",
                        h_offset:0,
                        v_offset:30,
                        space:5,
                        tmp:''
                    }
                },
                responsiveLevels:[1400,1200,991,480],
                visibilityLevels:[1400,1200,991,480],
                gridwidth:[1400,1200,991,480],
                gridheight:[600,700,700,600],
                lazyType:"none",
                parallax: {
                    type:"scroll",
                    origo:"slidercenter",
                    speed:2000,
                    levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55],
                },
                shadow:0,
                spinner:"spinner0",
                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,
                shuffle:"off",
                autoHeight:"on",
                fullScreenAutoWidth:"off",
                fullScreenAlignForce:"off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "0px",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            });
        }
    });	/*ready*/
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"64224fc8786846928480d180dfc466bd","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>

    @yield('scripts')

</body>

<!-- Mirrored from demo.awaikenthemes.com/html-preview/movein/index-slider.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Aug 2025 11:39:23 GMT -->
</html>