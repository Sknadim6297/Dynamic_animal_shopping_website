@extends('layouts.layout')
@section('styles')
@endsection

@section('content')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page">
            <img class="ptt-png" src="{{ asset('frontend/assets/images/Dot-Shape.png') }}" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Video Gallery</li>
                    </ol>
                </nav>
                <h1>Video Gallery</h1>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <main id="body-content">

        <section class="wide-tb-100 pb-0">
            <div class="container">
                <h1 class="heading-main center">
                    <small>Because We Really Care About Your Pets <i class="pethund_repeat_grid"></i></small>
                    <span>Our Pet</span> Gallery
                </h1>

                <div class="row">

                    @forelse($videos as $video)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="captured-gallery-item video-item" data-video="{{ asset($video->video) }}"
                                style="cursor:pointer; position:relative;">

                                <div class="gallery-content">
                                    <span><i class="icofont-play"></i></span>
                                    <h3>{{ $video->pet_name ?? 'Pet Video' }}</h3>
                                    <h5>{{ ucfirst($video->pet_type ?? 'Pet') }}</h5>
                                </div>

                                <!-- Thumbnail (use video preview or fallback image) -->
                                <video muted class="rounded w-100" style="height:220px; object-fit:cover;">
                                    <source src="{{ asset($video->video) }}" type="video/mp4">
                                </video>

                            </div>
                        </div>

                    @empty
                        <div class="col-12 text-center">
                            <p>No videos available</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>
        <div id="videoModal"
            style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.9); z-index:9999; justify-content:center; align-items:center;">

            <span id="closeVideo"
                style="position:absolute; top:20px; right:30px; font-size:30px; color:#fff; cursor:pointer;">&times;</span>

            <video id="modalVideo" controls autoplay style="max-width:80%; max-height:80%; border-radius:10px;">
                <source src="" type="video/mp4">
            </video>

        </div>

    </main>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {

    const items = document.querySelectorAll('.video-item');
    const modal = document.getElementById('videoModal');
    const modalVideo = document.getElementById('modalVideo');
    const closeBtn = document.getElementById('closeVideo');

    items.forEach(item => {
        item.addEventListener('click', function () {
            const videoSrc = this.getAttribute('data-video');

            modal.style.display = 'flex';
            modalVideo.src = videoSrc;
            modalVideo.play();
        });
    });

    closeBtn.addEventListener('click', function () {
        modal.style.display = 'none';
        modalVideo.pause();
        modalVideo.src = '';
    });

    // click outside to close
    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.style.display = 'none';
            modalVideo.pause();
            modalVideo.src = '';
        }
    });

});
</script>