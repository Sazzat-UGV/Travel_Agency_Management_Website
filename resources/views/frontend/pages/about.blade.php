@extends('frontend.layout.master')
@section('title')
    About Us
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', ['page_name' => 'About Us'])

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


    <!-- feature section start-->
    <div class="feature-card-section mb-120">
        <img src="{{ asset('assets/frontend') }}/img/home1/section-vector4.png" alt="" class="section-vector4">
        <div class="container">
            <div class="row g-md-4 gy-5">
                @foreach ($features as $index => $feature)
                    <div class="col-xl-4 col-md-6">
                        <div class="feature-card {{ $index % 2 == 0 ? 'two' : 'three' }}">
                            <div class="feature-card-icon">
                                <i class="{{ $feature->icon }}" style="font-size:35px; color: #495E57"></i>
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
    <!-- feature section end-->
@endsection
@push('frontend_script')
@endpush
