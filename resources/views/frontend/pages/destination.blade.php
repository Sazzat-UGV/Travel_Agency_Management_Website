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
