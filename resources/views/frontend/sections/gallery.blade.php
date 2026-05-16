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
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
                <h1>Gallery</h1>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <section class="wide-tb-100 pb-0">
            <div class="container">
                <div class="row align-items-end mb-4">
                    <div class="col-lg-8">
                        <h1 class="heading-main">
                            <small>Because We Really Care About Your Pets <i class="pethund_repeat_grid"></i></small>
                            <span>Gallery</span> Stories
                        </h1>
                        <p class="mb-0">Browse photos and videos from the same gallery page.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('gallery.photos') }}" class="btn-theme bg-orange btn-shadow me-2">Photos</a>
                        <a href="{{ route('gallery.videos') }}" class="btn-theme bg-navy-blue btn-shadow">Videos</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="photo-gallery" class="wide-tb-100 pt-0 pb-0">
            <div class="container">
                <h1 class="heading-main center">
                    <small>Because We Really Care About Your Pets <i class="pethund_repeat_grid"></i></small>
                    <span>Photo</span> Gallery
                </h1>
                <div class="row">
                    <div class="col-md-12">
                        <ul id="portfolio-flters" class="list-unstyled">
                            <li data-filter="*" class="filter-active"><a href="javascript:void(0)">All</a></li>
                            <li data-filter=".bird"><a href="javascript:void(0)">Birds</a></li>
                            <li data-filter=".cat"><a href="javascript:void(0)">Cats</a></li>
                            <li data-filter=".dog"><a href="javascript:void(0)">Dogs</a></li>
                            <li data-filter=".kitten"><a href="javascript:void(0)">Kittens</a></li>
                        </ul>
                    </div>
                </div>
                <div class="isotope-gallery captured-img-gallery row">
                    @forelse($galleries as $gallery)
                        @if ($gallery->primary_image)
                            <div class="gallery-item mb-4 col-md-6 col-lg-4 col-12 {{ $gallery->filter_class }}">
                                <div class="captured-gallery-item">
                                    <div class="gallery-content">
                                        <a href="{{ asset($gallery->primary_image) }}" title="{{ $gallery->pet_name }}"><i class="icofont-plus"></i></a>
                                        <h3><a href="javascript:void(0)">{{ $gallery->pet_name }}</a></h3>
                                        <h5>{{ $gallery->category_label }}</h5>
                                        @if ($gallery->image_count > 1)
                                            <small>{{ $gallery->image_count }} photos</small>
                                        @endif
                                    </div>
                                    <img src="{{ asset($gallery->primary_image) }}" class="rounded" alt="{{ $gallery->pet_name }}">
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="mb-0">No gallery photos available yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="video-gallery" class="wide-tb-100">
            <div class="container">
                <h1 class="heading-main center">
                    <small>Short clips from our pet care team <i class="pethund_repeat_grid"></i></small>
                    <span>Video</span> Gallery
                </h1>

                <div class="row">
                    @forelse($videos as $video)
                        @if ($video->video)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="captured-gallery-item video-item" data-video="{{ asset($video->video) }}" style="cursor:pointer; position:relative;">
                                    <div class="gallery-content">
                                        <span><i class="icofont-play"></i></span>
                                        <h3>{{ $video->pet_name ?? 'Pet Video' }}</h3>
                                        <h5>{{ \Illuminate\Support\Str::headline($video->pet_type ?? 'Pet') }}</h5>
                                    </div>

                                    <video muted class="rounded w-100" style="height:220px; object-fit:cover;">
                                        <source src="{{ asset($video->video) }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="mb-0">No videos available yet.</p>
                        </div>
                    @endforelse
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('gallery.videos') }}" class="btn-theme bg-orange btn-shadow">Open Full Video Gallery</a>
                </div>
            </div>
        </section>

        <div id="videoModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.9); z-index:9999; justify-content:center; align-items:center;">
            <span id="closeVideo" style="position:absolute; top:20px; right:30px; font-size:30px; color:#fff; cursor:pointer;">&times;</span>
            <video id="modalVideo" controls autoplay style="max-width:80%; max-height:80%; border-radius:10px;">
                <source src="" type="video/mp4">
            </video>
        </div>

    </main>

@endsection
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.video-item');
    const modal = document.getElementById('videoModal');
    const modalVideo = document.getElementById('modalVideo');
    const closeBtn = document.getElementById('closeVideo');

    if (!items.length || !modal || !modalVideo || !closeBtn) {
        return;
    }

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

    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.style.display = 'none';
            modalVideo.pause();
            modalVideo.src = '';
        }
    });
});
</script>
@endsection