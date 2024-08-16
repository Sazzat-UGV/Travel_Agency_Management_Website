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
                        <h2>Activity</h2>
                        {!! $destination->activity !!}
                    @endif
                    @if ($destination->best_time)
                        <h2>Best Time to Visit</h2>
                        <p>{!! $destination->best_time !!}</p>
                    @endif

                    @if ($destination->visa_requirement)
                        <h2>Visa Requirement</h2>
                        <p>{!! $destination->visa_requirement !!}</p>
                    @endif
                    @if ($destination->health_safety)
                        <h2>Health Safety</h2>
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
            <div class="row">
                <div class="col-12">
                    <div class="contact-map">
                        @if ($destination->map)
                            {!! $destination->map !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('frontend_script')
@endpush
