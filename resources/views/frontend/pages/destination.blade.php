@extends('frontend.layout.master')
@section('title')
    Destination Detail
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_heading' => $destination->name,
        'parent_page_name' => 'Destinations',
        'parent_page_link' => route('destinations'),
        'page_name' => $destination->name,
    ])
    <div class="destination-details-wrap mb-120 pt-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-8">
                    <h2>Welcome To {{ $destination->name }}</h2>
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="destination-img">
                                <img src="{{ asset('uploads/destination') }}/{{ $destination->featured_photo }}"
                                    alt="photo">
                            </div>
                        </div>
                    </div>
                    <p>{!! $destination->description !!}</p>
                    @if ($destination->activity)
                        <h3>Activity</h3>
                        {!! $destination->activity !!}
                    @endif
                    @if ($destination->best_time)
                        <h3>Best Time to Visit</h3>
                        <p>{!! $destination->best_time !!}</p>
                    @endif

                    @if ($destination->visa_requirement)
                        <h3>Visa Requirement</h3>
                        <p>{!! $destination->visa_requirement !!}</p>
                    @endif
                    @if ($destination->health_safety)
                        <h3>Health Safety</h3>
                        <p>{!! $destination->health_safety !!}</p>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="destination-sidebar">
                        <div class="destination-info mb-30">
                            <div class="single-info">
                                <span>Destination:</span>
                                <h5>{{ $destination->name }}</h5>
                            </div>
                            @if ($destination->country)
                                <div class="single-info">
                                    <span>Country:</span>
                                    <h5>{{ $destination->country }}</h5>
                                </div>
                            @endif
                            @if ($destination->language)
                                <div class="single-info">
                                    <span>Language:</span>
                                    <h5>{{ $destination->language }}</h5>
                                </div>
                            @endif
                            @if ($destination->currency)
                                <div class="single-info">
                                    <span>Currency:</span>
                                    <h5>{{ $destination->currency }}</h5>
                                </div>
                            @endif
                            @if ($destination->area)
                                <div class="single-info">
                                    <span>Area:</span>
                                    <h5>{{ $destination->area }}</h5>
                                </div>
                            @endif
                            @if ($destination->timezone)
                                <div class="single-info">
                                    <span>Time Zone:</span>
                                    <h5>{{ $destination->timezone }}</h5>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            @if ($photos && $photos->count() > 0)
                <div class="destination-location-gallery mb-120">
                    <div class="row">
                        <h3>Photos</h3>
                        <div class="col-lg-12">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="location1" role="tabpanel"
                                    aria-labelledby="location1-tab">
                                    <div class="destination-gallery">
                                        <div class="row g-4">
                                            @foreach ($photos as $photo)
                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="gallery-img-wrap">
                                                        <img src="{{ asset('uploads/destination') }}/{{ $photo->photo }}"
                                                            alt="">
                                                        <a data-fancybox="gallery-01"
                                                            href="{{ asset('uploads/destination') }}/{{ $photo->photo }}"><i
                                                                class="bi bi-eye"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($videos && $videos->count() > 0)
                <div class="destination-location-gallery mb-120">
                    <div class="row">
                        <h3>Videos</h3>
                        @foreach ($videos as $video)
                            <div class="col-3 mb-3">
                                <div class="gallery-img-wrap position-relative">
                                    <!-- Video Thumbnail -->
                                    <img src="https://img.youtube.com/vi/{{ $video->video }}/hqdefault.jpg"
                                        alt="Video Thumbnail" class="img-fluid rounded shadow-sm">

                                    <!-- Play Button Overlay -->
                                    <a data-fancybox="gallery-01"
                                        href="https://www.youtube.com/watch?v={{ $video->video }}"
                                        class="play-button position-absolute top-50 start-50 translate-middle text-white text-center">
                                        <i class="bi bi-play-circle" style="font-size: 40px"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($packages->count() > 0)
                <div class="recommendated-package-area mb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 mb-30 d-flex align-items-center justify-content-between">
                                <div class="desti-title">
                                    <h3>Recommended Package</h3>
                                </div>
                                <div class="slider-btn-grp2 width-100">
                                    <div class="slider-btn package-card-tab-prev" tabindex="0" role="button"
                                        aria-label="Previous slide" aria-controls="swiper-wrapper-b018710fae8286902">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17"
                                            viewBox="0 0 9 17">
                                            <path
                                                d="M8.83399 0.281832L8.72217 0.16683L0.500652 8.50016L8.72217 16.8335L8.83398 16.7185L8.83398 13.0602L4.33681 8.50016L8.83399 3.94016L8.83399 0.281832Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="slider-btn package-card-tab-next" tabindex="0" role="button"
                                        aria-label="Next slide" aria-controls="swiper-wrapper-b018710fae8286902">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17"
                                            viewBox="0 0 9 17" fill="none">
                                            <path
                                                d="M0.166016 16.7182L0.277828 16.8332L8.49935 8.49984L0.277828 0.166504L0.166016 0.281504V3.93984L4.66319 8.49984L0.166016 13.0598V16.7182Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12  mb-50">
                                <div
                                    class="swiper package-card-tab-slider swiper-initialized swiper-horizontal swiper-backface-hidden">
                                    <div class="swiper-wrapper" id="swiper-wrapper-b018710fae8286902" aria-live="off"
                                        style="transition-duration: 0ms; transform: translate3d(-377px, 0px, 0px); transition-delay: 0ms;">
                                        @foreach ($packages as $package)
                                            <div class="swiper-slide" style="width: 362px; margin-right: 15px;"
                                                role="group" aria-label="4 / 6" data-swiper-slide-index="3">
                                                <div class="package-card">
                                                    <div class="package-card-img-wrap">
                                                        <a href="{{ route('package', $package->slug) }}"
                                                            class="card-img"><img
                                                                src="{{ asset('uploads/package') }}/{{ $package->featured_photo }}"
                                                                alt=""></a>

                                                    </div>
                                                    <div class="package-card-content">
                                                        <div class="card-content-top">
                                                            <h5><a
                                                                    href="{{ route('package', $package->slug) }}">{{ $package->name }}</a>
                                                            </h5>

                                                        </div>
                                                        <div class="card-content-bottom">
                                                            <div class="price-area">
                                                                <h6>Starting Form:</h6>
                                                                <span>${{ $package->price }} @if ($package->old_price)
                                                                        <del>${{ $package->old_price }}</del>
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <a href="{{ route('package', $package->slug) }}"
                                                                class="primary-btn2">Book a Trip
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                    height="18" viewBox="0 0 18 18" fill="none">
                                                                    <path
                                                                        d="M8.15624 10.2261L7.70276 12.3534L5.60722 18L6.85097 17.7928L12.6612 10.1948C13.4812 10.1662 14.2764 10.1222 14.9674 10.054C18.1643 9.73783 17.9985 8.99997 17.9985 8.99997C17.9985 8.99997 18.1643 8.26211 14.9674 7.94594C14.2764 7.87745 13.4811 7.8335 12.6611 7.80518L6.851 0.206972L5.60722 -5.41705e-07L7.70276 5.64663L8.15624 7.77386C7.0917 7.78979 6.37132 7.81403 6.37132 7.81403C6.37132 7.81403 4.90278 7.84793 2.63059 8.35988L0.778036 5.79016L0.000253424 5.79016L0.554115 8.91458C0.454429 8.94514 0.454429 9.05483 0.554115 9.08539L0.000253144 12.2098L0.778036 12.2098L2.63059 9.64035C4.90278 10.1523 6.37132 10.1857 6.37132 10.1857C6.37132 10.1857 7.0917 10.2102 8.15624 10.2261Z">
                                                                    </path>
                                                                    <path
                                                                        d="M12.0703 11.9318L12.0703 12.7706L8.97041 12.7706L8.97041 11.9318L12.0703 11.9318ZM12.0703 5.23292L12.0703 6.0714L8.97059 6.0714L8.97059 5.23292L12.0703 5.23292ZM9.97892 14.7465L9.97892 15.585L7.11389 15.585L7.11389 14.7465L9.97892 14.7465ZM9.97892 2.41846L9.97892 3.2572L7.11389 3.2572L7.11389 2.41846L9.97892 2.41846Z">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            @endif
            @if ($destination->map)
                <div class="row">
                    <div class="col-12">
                        <div class="contact-map">
                            {!! $destination->map !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
@push('frontend_script')
@endpush
