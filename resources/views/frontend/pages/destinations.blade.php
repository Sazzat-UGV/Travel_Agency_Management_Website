@extends('frontend.layout.master')
@section('title')
    Destinations
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_heading' => 'Destinations',
        'parent_page_name' => '',
        'parent_page_link' => '',
        'page_name' => 'Destinations',
    ])
    <div class="destination-section pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5 mb-70">
                @foreach ($destinations as $destination)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="destination-card2">
                            <a href="{{ route('destination',$destination->slug) }}" class="destination-card-img"><img
                                    src="{{ asset('uploads/destination') }}/{{ $destination->featured_photo }}" alt=""></a>
                            <div class="destination-card2-content">
                                <span>Travel To</span>
                                <h4><a href="{{ route('destination',$destination->slug) }}">{{ $destination->name }}</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <nav class="inner-pagination-area">
                        {{ $destinations->links('vendor.pagination.custom') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('frontend_script')
@endpush
