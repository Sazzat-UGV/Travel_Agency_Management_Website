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
        <!-- slider section end-->






        {{-- <div class="destination-card2-slider-section mb-120">
    <div class="container">
        <div class="row mb-50">
            <div class="col-lg-12">
                <div class="section-title2 text-center">
                    <div class="eg-section-tag">
                        <span>Journey TripRex</span>
                    </div>
                    <h2>Trendy Travel Locations</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper destination-card2-slider mb-50">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="destination-card2">
                                <a href="destination-details.html" class="destination-card-img"><img
                                        src="{{ asset('assets/frontend') }}/img/home2/destination-card2-img1.jpg"
                                        alt></a>
                                <div class="batch">
                                    <span>5 Tour</span>
                                </div>
                                <div class="destination-card2-content">
                                    <span>Travel To</span>
                                    <h4><a href="destination-details.html">New York</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="destination-card2">
                                <a href="destination-details.html" class="destination-card-img"><img
                                        src="{{ asset('assets/frontend') }}/img/home2/destination-card2-img2.jpg"
                                        alt></a>
                                <div class="batch">
                                    <span>8 Tour</span>
                                </div>
                                <div class="destination-card2-content">
                                    <span>Travel To</span>
                                    <h4><a href="destination-details.html">Switzerland</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="destination-card2">
                                <a href="destination-details.html" class="destination-card-img"><img
                                        src="{{ asset('assets/frontend') }}/img/home2/destination-card2-img3.jpg"
                                        alt></a>
                                <div class="batch">
                                    <span>4 Tour</span>
                                </div>
                                <div class="destination-card2-content">
                                    <span>Travel To</span>
                                    <h4><a href="destination-details.html">Saudi Arab</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="destination-card2">
                                <a href="destination-details.html" class="destination-card-img"><img
                                        src="{{ asset('assets/frontend') }}/img/home2/destination-card2-img4.jpg"
                                        alt></a>
                                <div class="batch">
                                    <span>6 Tour</span>
                                </div>
                                <div class="destination-card2-content">
                                    <span>Travel To</span>
                                    <h4><a href="destination-details.html">Indonesia</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="destination-card2">
                                <a href="destination-details.html" class="destination-card-img"><img
                                        src="{{ asset('assets/frontend') }}/img/home2/destination-card2-img5.jpg"
                                        alt></a>
                                <div class="batch">
                                    <span>7 Tour</span>
                                </div>
                                <div class="destination-card2-content">
                                    <span>Travel To</span>
                                    <h4><a href="destination-details.html">Brazil</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="destination-card2">
                                <a href="destination-details.html" class="destination-card-img"><img
                                        src="{{ asset('assets/frontend') }}/img/home2/destination-card2-img6.jpg"
                                        alt></a>
                                <div class="batch">
                                    <span>8 Tour</span>
                                </div>
                                <div class="destination-card2-content">
                                    <span>Travel To</span>
                                    <h4><a href="destination-details.html">Japan</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="destination-card2">
                                <a href="destination-details.html" class="destination-card-img"><img
                                        src="{{ asset('assets/frontend') }}/img/home2/destination-card2-img7.jpg"
                                        alt></a>
                                <div class="batch">
                                    <span>3 Tour</span>
                                </div>
                                <div class="destination-card2-content">
                                    <span>Travel To</span>
                                    <h4><a href="destination-details.html">Australia</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="destination-card2">
                                <a href="destination-details.html" class="destination-card-img"><img
                                        src="{{ asset('assets/frontend') }}/img/home2/destination-card2-img4.jpg"
                                        alt></a>
                                <div class="batch">
                                    <span>6 Tour</span>
                                </div>
                                <div class="destination-card2-content">
                                    <span>Travel To</span>
                                    <h4><a href="destination-details.html">Indonesia</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-and-view-btn-grp">
                    <div class="slider-btn-grp3 two">
                        <div class="slider-btn destination-card2-prev">
                            <i class="bi bi-arrow-left"></i>
                            <span>PREV</span>
                        </div>
                        <div class="slider-btn destination-card2-next">
                            <span>NEXT</span>
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                    <a href="destination2.html" class="secondary-btn2">View All Destination</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    @endsection
    @push('frontend_script')
    @endpush
