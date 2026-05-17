    @extends('layouts.layout')
@section('styles')
@endsection

@section('content')
    <section class="breadcrumbs-page-wrap">
        <div class="bg-navy-blue bg-fixed pos-rel breadcrumbs-page">
            <img class="ptt-png" src="{{ asset('frontend/assets/images/Dot-Shape.png') }}" alt="png">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Photo Gallery</li>
                    </ol>
                </nav>
                <h1>Photo Gallery</h1>
            </div>
        </div>
    </section>

    <main id="body-content">
        <section class="wide-tb-100 pb-0">
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

                <div class="text-center mt-4 mb-4">
                    <a href="{{ route('gallery') }}" class="btn-theme bg-navy-blue btn-shadow">Back to Gallery</a>
                </div>
            </div>
        </section>
    </main>
@endsection