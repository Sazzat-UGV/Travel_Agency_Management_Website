@extends('frontend.layout.master')
@section('title')
    Home Page
@endsection
@push('frontend_style')
@endpush
@section('content')
    <!-- slider section start-->
    <div class="home2-banner-area">
        <div class="swiper home1-banner-slider">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="home2-banner-wrapper"
                            style="background-image: linear-gradient(180deg, rgba(16, 12, 8, 0.4) 0%, rgba(16, 12, 8, 0.4) 100%), url({{ asset('uploads/slider') }}/{{ $slider->photo }});">
                            <div class="slide-text">
                                <h2>{{ $slider->heading }}</h2>
                                <p>{{ $slider->text }}</p>
                                @if ($slider->button_name)
                                    <a href="{{ $slider->button_link }}" target="blank"
                                        class="primary-btn1 text-center">{{ $slider->button_name }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="slider-btn-grp">
                <div class="slider-btn home1-banner-prev">
                    <i class="bi bi-arrow-left"></i>
                </div>
                <div class="slider-btn home1-banner-next">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- slider section end-->


    <!-- welcome section start-->
    @if ($welcome_item->status == 'Show')
        <div class="home2-about-section pt-120 mb-120">
            <div class="container">
                <div class="row mb-90">
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title2 mb-30">
                                <h2 style="color: #63AB45">{{ $welcome_item->heading }}</h2>
                                <p>{!! $welcome_item->description !!}</p>
                            </div>
                            <div class="content-bottom-area">
                                @if ($welcome_item->button_name)
                                    <a href="{{ $welcome_item->button_link }}" class="primary-btn3"
                                        target="blank">{{ $welcome_item->button_name }}</a>
                                @endif
                                @if ($welcome_item->video)
                                    <a data-fancybox="popup-video"
                                        href="https://www.youtube.com/watch?v={{ $welcome_item->video }}&amp;ab_channel=eidelchteinadvogados"
                                        class="video-area">
                                        <div class="icon">
                                            <svg class="video-circle" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="51px"
                                                viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;"
                                                xml:space="preserve">
                                                <circle class="circle" stroke-miterlimit="10" cx="103" cy="103"
                                                    r="100">
                                                </circle>
                                                <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10"
                                                    d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                <path class="circle-half bottom-half" stroke-width="4"
                                                    stroke-miterlimit="10"
                                                    d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53">
                                                </path>
                                            </svg>
                                            <i class="bi bi-play"></i>
                                        </div>
                                        <h6>Watch Video</h6>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="about-img-wrap">
                            <div class="about-img">
                                <img src="{{ asset('uploads/welcome_item') }}/{{ $welcome_item->photo }}"
                                    alt="welcome photo" class="about-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- welcome section end-->


    <!-- popular destinations section start-->
    @if ($home_item->destination_status == 'Active')
        <div class="destination-card2-slider-section mb-120">
            <div class="container">
                <div class="row mb-50">
                    <div class="col-lg-12">
                        <div class="section-title2 text-center">
                            <div class="eg-section-tag">
                                <span>{{ $home_item->destination_heading }}</span>
                            </div>
                            <h2>{{ $home_item->destination_subheading }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="swiper destination-card2-slider mb-50 swiper-initialized swiper-horizontal swiper-backface-hidden">
                            <div class="swiper-wrapper" id="swiper-wrapper-279217fd3ac76513" aria-live="polite">
                                @foreach ($destinations as $destination)
                                    <div class="swiper-slide" style="width: 267.75px; margin-right: 15px;" role="group"
                                        aria-label="4 / 8">
                                        <div class="destination-card2">
                                            <a href="{{ route('destination', $destination->slug) }}"
                                                class="destination-card-img"><img
                                                    src="{{ asset('uploads/destination') }}/{{ $destination->featured_photo }}"
                                                    alt="Destination Photo"></a>
                                            <div class="destination-card2-content">
                                                <span>Travel To</span>
                                                <h4><a
                                                        href="{{ route('destination', $destination->slug) }}">{{ $destination->name }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <div class="slide-and-view-btn-grp">
                            <div class="slider-btn-grp3 two">
                                <div class="slider-btn destination-card2-prev swiper-button-disabled" tabindex="-1"
                                    role="button" aria-label="Previous slide"
                                    aria-controls="swiper-wrapper-279217fd3ac76513" aria-disabled="true">
                                    <i class="bi bi-arrow-left"></i>
                                    <span>PREV</span>
                                </div>
                                <div class="slider-btn destination-card2-next" tabindex="0" role="button"
                                    aria-label="Next slide" aria-controls="swiper-wrapper-279217fd3ac76513"
                                    aria-disabled="false">
                                    <span>NEXT</span>
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                            <a href="{{ route('destinations') }}" class="secondary-btn2">View All Destination</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- popular destinations section end-->


    <!-- feature section start-->
    @if ($home_item->feature_status == 'Active')
        <div class="feature-card-section mb-120">
            <img src="{{ asset('assets/frontend') }}/img/home1/section-vector4.png" alt=""
                class="section-vector4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-60">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16"
                                    viewBox="0 0 15 16">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z">
                                    </path>
                                </svg>
                                {{ $home_item->feature_heading }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16"
                                    viewBox="0 0 15 16">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z">
                                    </path>
                                </svg>
                            </span>
                            <h2>{{ $home_item->feature_subheading }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-md-4 gy-5">
                    @foreach ($features as $index => $feature)
                        @php
                            $classes = ['one', 'two', 'three'];
                            $randomClass = $classes[$index % 3];
                        @endphp
                        <div class="col-xl-4 col-md-6">
                            <div class="feature-card {{ $randomClass }}">
                                <div class="feature-card-icon">
                                    {!! $feature->icon !!}
                                </div>
                                <div class="feature-card-content">
                                    <h6>{{ $feature->heading }}</h6>
                                    <p>{{ $feature->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- feature section end-->

    <!-- package section start-->
    @if ($home_item->package_status == 'Active')
        @if ($packages->count() > 0)
            <div class="package-card-section pt-120 mb-120">
                <img src="{{ asset('assets/frontend') }}/img/home1/section-vector1.png" alt=""
                    class="section-vector1">
                <img src="{{ asset('assets/frontend') }}/img/home1/section-vector3.png" alt=""
                    class="section-vector3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-40">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16"
                                        viewBox="0 0 15 16">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z">
                                        </path>
                                    </svg>
                                    {{ $home_item->package_heading }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16"
                                        viewBox="0 0 15 16">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z">
                                        </path>
                                    </svg>
                                </span>
                                <h2>{{ $home_item->package_subheading }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row g-lg-4 gy-5 mb-70">
                        @foreach ($packages as $package)
                            <div class="col-lg-4 col-md-6">
                                <div class="package-card">
                                    <div class="package-card-img-wrap">
                                        <a href="{{ route('package', $package->slug) }}" class="card-img"><img
                                                src="{{ asset('uploads/package') }}/{{ $package->featured_photo }}"
                                                alt=""></a>
                                        <div class="batch">

                                        </div>
                                    </div>
                                    <div class="package-card-content">
                                        <div class="card-content-top">
                                            <h5><a href="{{ route('package', $package->slug) }}">{{ $package->name }}</a>
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
                                            <a href="{{ route('package', $package->slug) }}" class="primary-btn2">Book a
                                                Trip
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 18 18" fill="none">
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
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <a href="{{ route('packages') }}" class="secondary-btn1">View All Package</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    <!-- package section end-->

    <!-- testimonial section start-->
    @if ($home_item->testimonial_status == 'Active')
        <div class="testimonial-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-60">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16"
                                    viewBox="0 0 15 16">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.92556 7.69046C2.35744 7.63298 2.78906 7.57563 3.21925 7.51077C4.14925 7.37065 5.08588 7.29138 6.01763 7.21249L6.01888 7.21243C6.15888 7.20055 6.29875 7.18874 6.43844 7.17668C7.50663 6.968 8.58732 6.89083 9.66644 6.94628C10.7733 7.06837 11.8592 7.41421 12.8857 7.97163L12.8857 8.23655C11.8592 8.79397 10.7733 9.13981 9.66644 9.26191C8.58732 9.31735 7.50663 9.24018 6.43844 9.03151C5.36831 8.93932 4.29813 8.82412 3.21925 8.69742C2.14031 8.57065 1.07012 8.42092 -6.78702e-07 8.23655L-7.01862e-07 7.97163C0.639938 7.86135 1.28306 7.77588 1.92556 7.69046ZM10.7633 15.8502C10.9332 15.4596 11.12 15.0855 11.3061 14.7127C11.389 14.5468 11.4717 14.3811 11.5527 14.2144C11.8159 13.6729 12.1141 13.1545 12.4299 12.6477C12.5448 12.4632 12.64 12.2604 12.7336 12.061C12.8972 11.7124 13.056 11.3741 13.3071 11.1616C13.7816 10.7768 14.3283 10.5734 14.886 10.574L15 10.7353C14.9945 11.4677 14.8235 12.1813 14.5088 12.7859C14.3311 13.1802 14.0336 13.4059 13.7358 13.6317C13.6073 13.7292 13.4787 13.8268 13.3597 13.9379C12.965 14.3066 12.5615 14.6637 12.1492 15.0093C11.7369 15.3549 11.3159 15.689 10.8685 16L10.7633 15.8502ZM11.7543 0.665536C11.4882 0.436859 11.2226 0.208798 10.9388 -1.5523e-06L10.816 0.149784C11.0528 0.725784 11.3072 1.27877 11.5703 1.82018C11.8335 2.3616 12.1142 2.89157 12.3949 3.40997C12.4795 3.56628 12.5538 3.73514 12.628 3.90394C12.8 4.29501 12.9718 4.68572 13.2721 4.91908C13.7312 5.33563 14.2754 5.56049 14.8334 5.56418L14.9562 5.4144C14.9651 4.68055 14.8095 3.95951 14.5089 3.3408C14.3471 3.01108 14.0894 2.80252 13.824 2.58763C13.6722 2.46474 13.5178 2.33975 13.3773 2.1888C12.9914 1.77409 12.6142 1.3824 12.1931 1.0368C12.0446 0.91489 11.8994 0.790152 11.7543 0.665536Z">
                                    </path>
                                </svg>
                                {{ $home_item->testimonial_heading }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16"
                                    viewBox="0 0 15 16">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.0744 8.30954C12.6426 8.36702 12.2109 8.42437 11.7807 8.48923C10.8507 8.62935 9.91412 8.70862 8.98237 8.78751L8.98112 8.78757C8.84112 8.79945 8.70125 8.81126 8.56156 8.82332C7.49337 9.032 6.41268 9.10917 5.33356 9.05372C4.22669 8.93163 3.14081 8.58578 2.11432 8.02837V7.76345C3.14081 7.20603 4.22669 6.86018 5.33356 6.73809C6.41268 6.68265 7.49337 6.75982 8.56156 6.96849C9.63169 7.06068 10.7019 7.17588 11.7807 7.30259C12.8597 7.42935 13.9299 7.57908 15 7.76345V8.02837C14.3601 8.13865 13.7169 8.22412 13.0744 8.30954ZM4.23673 0.14976C4.06677 0.540388 3.88 0.914468 3.69388 1.28726C3.61104 1.45317 3.52831 1.61887 3.44728 1.78561C3.18413 2.32705 2.88589 2.84546 2.57011 3.35234C2.45519 3.5368 2.36002 3.73958 2.26642 3.939C2.10282 4.28757 1.94402 4.62593 1.69294 4.83843C1.21844 5.2232 0.671682 5.42665 0.114031 5.42597L0 5.26468C0.00551875 4.53235 0.176481 3.81866 0.491219 3.2141C0.6689 2.81982 0.966407 2.59414 1.26418 2.36828C1.39271 2.27078 1.52129 2.17324 1.64031 2.06209C2.03504 1.69345 2.43853 1.33633 2.8508 0.990726C3.26307 0.645126 3.68411 0.31104 4.13147 0L4.23673 0.14976ZM3.24568 15.3345C3.51184 15.5631 3.77735 15.7912 4.06123 16L4.18404 15.8502C3.9472 15.2742 3.69281 14.7212 3.42966 14.1798C3.16651 13.6384 2.88581 13.1084 2.60511 12.59C2.52048 12.4337 2.44621 12.2649 2.37198 12.0961C2.19999 11.705 2.02816 11.3143 1.72794 11.0809C1.26879 10.6644 0.7246 10.4395 0.166563 10.4358L0.0437562 10.5856C0.0348937 11.3194 0.190456 12.0405 0.491113 12.6592C0.652919 12.9889 0.910556 13.1975 1.17597 13.4124C1.32782 13.5353 1.48222 13.6602 1.62268 13.8112C2.00863 14.2259 2.38582 14.6176 2.80686 14.9632C2.95538 15.0851 3.10063 15.2098 3.24568 15.3345Z">
                                    </path>
                                </svg>
                            </span>
                            <h2>{{ $home_item->testimonial_subheading }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-wrapper">

                <div class="testimonial-card-slider-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="allreview" role="tabpanel"
                                        aria-labelledby="allreview-tab">
                                        <div
                                            class="swiper testimonial-card-slider swiper-initialized swiper-horizontal swiper-backface-hidden">
                                            <div class="swiper-wrapper" id="swiper-wrapper-3531ea6f29ee9242"
                                                aria-live="off"
                                                style="transition-duration: 1500ms; transform: translate3d(-859.333px, 0px, 0px);">
                                                @foreach ($testimonials as $testimonial)
                                                    <div class="swiper-slide swiper-slide-next"
                                                        style="width: 414.667px; margin-right: 15px;" role="group"
                                                        aria-label="4 / 6" data-swiper-slide-index="3">
                                                        <div class="tesimonial-card-wrapper">
                                                            <div class="tesimonial-card">
                                                                <div class="testimonial-content">
                                                                    <p>“{{ $testimonial->comment }}”</p>
                                                                </div>
                                                                <div class="testimonial-bottom justify-content-center">

                                                                    <div class="quote">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="74" height="51"
                                                                            viewBox="0 0 74 51">
                                                                            <g>
                                                                                <path
                                                                                    d="M34.6075 16.7875C34.5735 16.4389 34.5054 16.0817 34.4202 15.733C33.6625 6.92252 26.2643 0 17.2484 0C7.72178 0 0 7.71343 0 17.2298C0 26.474 7.28758 33.9918 16.4311 34.417C14.2261 37.8953 10.676 40.7102 6.34258 42.0369L6.19785 42.0794C4.18866 42.6917 2.80095 44.6477 2.98825 46.8248C3.20109 49.3336 5.40609 51.1961 7.9261 50.9835C15.3414 50.3541 22.7567 46.5697 27.7967 40.4211C30.3252 37.3595 32.2833 33.7537 33.4752 29.8247C34.6756 25.9042 35.0843 21.669 34.6756 17.4934L34.6075 16.7875Z">
                                                                                </path>
                                                                                <path
                                                                                    d="M73.1681 16.7875C73.134 16.4389 73.0659 16.0817 72.9808 15.733C72.2231 6.92252 64.8248 0 55.809 0C46.2823 0 38.5605 7.71343 38.5605 17.2298C38.5605 26.474 45.8481 33.9918 54.9917 34.417C52.7867 37.8953 49.2365 40.7102 44.9031 42.0369L44.7584 42.0794C42.7492 42.6917 41.3615 44.6477 41.5488 46.8248C41.7616 49.3336 43.9666 51.1961 46.4866 50.9835C53.9019 50.3541 61.3172 46.5697 66.3572 40.4211C68.8858 37.3595 70.8439 33.7537 72.0358 29.8247C73.2362 25.9042 73.6448 21.669 73.2362 17.4934L73.1681 16.7875Z">
                                                                                </path>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="author-area">
                                                                <div class="author-img">
                                                                    <img src="{{ asset('uploads/testimonial') }}/{{ $testimonial->photo }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="author-content">
                                                                    <h5>{{ $testimonial->name }}</h5>
                                                                    <span>{{ $testimonial->location }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <span class="swiper-notification" aria-live="assertive"
                                                aria-atomic="true"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-btn-grp2">
                                <div class="slider-btn testimonial-card-tab-prev" tabindex="0" role="button"
                                    aria-label="Previous slide" aria-controls="swiper-wrapper-93b10269e10d68eea7">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17"
                                        viewBox="0 0 9 17">
                                        <path
                                            d="M8.83399 0.281832L8.72217 0.16683L0.500652 8.50016L8.72217 16.8335L8.83398 16.7185L8.83398 13.0602L4.33681 8.50016L8.83399 3.94016L8.83399 0.281832Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="slider-btn testimonial-card-tab-next" tabindex="0" role="button"
                                    aria-label="Next slide" aria-controls="swiper-wrapper-93b10269e10d68eea7">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="17"
                                        viewBox="0 0 9 17" fill="none">
                                        <path
                                            d="M0.166016 16.7182L0.277828 16.8332L8.49935 8.49984L0.277828 0.166504L0.166016 0.281504V3.93984L4.66319 8.49984L0.166016 13.0598V16.7182Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- testimonial section end-->


    <!-- blog section start-->
    @if ($home_item->blog_status == 'Active')
        @if ($blogs->count() > 0)
            <section>
                <div class="home5-blog-section mb-120">
                    <div class="container">
                        <div class="row mb-50">
                            <div class="col-lg-12">
                                <div class="section-title4 text-center">
                                    <div class="eg-section-tag">
                                        <span>{{ $home_item->blog_heading }}
                                        </span>
                                    </div>
                                    <h2>{{ $home_item->blog_subheading }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="blod-grid-section ">
                            <div class="container">
                                <div class="row g-md-4 gy-5 mb-70">
                                    @foreach ($blogs as $blog)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="blog-card">
                                                <div class="blog-card-img-wrap">
                                                    <a href="{{ route('blog_details', $blog->slug) }}"
                                                        class="card-img"><img
                                                            src="{{ asset('uploads/blog') }}/{{ $blog->photo }}"
                                                            alt="Blog Photo"></a>
                                                    <a href="blog-grid.html" class="date">
                                                        <span><strong>{{ $blog->created_at->format('d') }}</strong> <br>
                                                            {{ $blog->created_at->format('F') }}</span>
                                                    </a>
                                                </div>
                                                <div class="blog-card-content">
                                                    <h5><a
                                                            href="{{ route('blog_details', $blog->slug) }}">{{ $blog->title }}</a>
                                                    </h5>
                                                    <p class="text-black">
                                                        {{ Str::words($blog->short_description, 100, '...') }}
                                                    </p>
                                                    <div class="bottom-area">
                                                        <a href="{{ route('blog_details', $blog->slug) }}">View Post
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="12" viewBox="0 0 14 12" fill="none">
                                                                    <path d="M2.07617 8.73272L12.1899 2.89355"
                                                                        stroke-linecap="round"></path>
                                                                    <path
                                                                        d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105"
                                                                        stroke-linecap="round"></path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
    <!-- blog section end-->

@endsection
@push('frontend_script')
@endpush
