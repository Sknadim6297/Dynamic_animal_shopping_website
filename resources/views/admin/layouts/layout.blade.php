<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/lava-admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Nov 2025 05:11:23 GMT -->
<head>
    <title>Animal Pride - Admin Panel </title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--== FAV ICON ==-->
    <link rel="shortcut icon" href="{{ asset('admin/images/fav.ico') }}">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Quicksand:300,400,500" rel="stylesheet">

    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">

    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/mob.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/materialize.css') }}" />
    @yield('styles')
</head>

<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        @include('admin.sections.header')
    </div>

    <div class="container-fluid sb2">
        <div class="row">
            @include('admin.sections.sidebar')
            @yield('content')
        </div>
    </div>



    @yield('script')

    <!--======== SCRIPT FILES =========-->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/materialize.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>

</body>
</html>