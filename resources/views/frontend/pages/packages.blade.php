@extends('frontend.layout.master')
@section('title')
    Packages
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_heading' => 'Packages',
        'parent_page_name' => '',
        'parent_page_link' => '#',
        'page_name' => 'Packages',
    ])
    <div class="package-grid-with-sidebar-section pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-8">

                    <div class="list-grid-product-wrap mb-70">
                        <div class="row gy-4">
                            @foreach ($packages as $package)
                                <div class="col-md-6 item">
                                    <div class="package-card">
                                        <div class="package-card-img-wrap">
                                            <a href="#" class="card-img"><img
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
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <nav class="inner-pagination-area">
                                {{ $packages->appends($_GET)->links('vendor.pagination.custom') }}
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <form action="{{ route('packages') }}" method="GET">
                        <div class="sidebar-area">
                            <div class="single-widget mb-30">
                                <h5 class="shop-widget-title">Search Package</h5>
                                <div class="range-wrap">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-inner mb-20">
                                                <input type="text" placeholder="Enter package name" name="name"
                                                    value="{{ $package_name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-widget mb-30">
                                <h5 class="shop-widget-title">Price Filter</h5>
                                <div class="range-wrap">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-inner mb-20">
                                                <input type="text" placeholder="Min" name="min_price"
                                                    value="{{ $min_price }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-inner mb-20">
                                                <input type="text" placeholder="Max" name="max_price"
                                                    value="{{ $max_price }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="single-widget mb-30">
                                <h5 class="shop-widget-title">Destination</h5>

                                <div class="range-wrap">
                                    <div class="row">
                                        <div class="col-12">
                                            <select name="destination_id" id="">
                                                <option value="">All</option>
                                                @foreach ($destinations as $destination)
                                                    <option value="{{ $destination->id }}"
                                                        @if ($destination_id == $destination->id) @selected(true) @endif>
                                                        {{ $destination->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-widget mb-30">
                                <h5 class="shop-widget-title">Review</h5>
                                <div class="box">
                                    <div class="form-check form-check-review form-check-review-1">
                                        <input name="review" class="form-check-input" type="radio" id="reviewRadiosAll"
                                            value="all" @if ($review == 'all' || $review == null) checked @endif>
                                        <label class="form-check-label" for="reviewRadiosAll">
                                            All
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" id="reviewRadios1"
                                            value="5" @if ($review == 5) checked @endif>
                                        <label class="form-check-label" for="reviewRadios1">
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" id="reviewRadios2"
                                            value="4.5" @if ($review == 4.5) checked @endif>
                                        <label class="form-check-label" for="reviewRadios2">
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-half star-icon"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" id="reviewRadios3"
                                            value="4" @if ($review == 4) checked @endif>
                                        <label class="form-check-label" for="reviewRadios3">
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" id="reviewRadios4"
                                            value="3.5" @if ($review == 3.5) checked @endif>
                                        <label class="form-check-label" for="reviewRadios4">
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-half star-icon"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" id="reviewRadios5"
                                            value="3" @if ($review == 3) checked @endif>
                                        <label class="form-check-label" for="reviewRadios5">
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" id="reviewRadios6"
                                            value="2.5" @if ($review == 2.5) checked @endif>
                                        <label class="form-check-label" for="reviewRadios6">
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-half star-icon"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" id="reviewRadios7"
                                            value="2" @if ($review == 2) checked @endif>
                                        <label class="form-check-label" for="reviewRadios7">
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-fill star-icon"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" id="reviewRadios8"
                                            value="1.5" @if ($review == 1.5) checked @endif>
                                        <label class="form-check-label" for="reviewRadios8">
                                            <i class="bi bi-star-fill star-icon"></i>
                                            <i class="bi bi-star-half star-icon"></i>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-review">
                                        <input name="review" class="form-check-input" type="radio" id="reviewRadios9"
                                            value="1" @if ($review == 1) checked @endif>
                                        <label class="form-check-label" for="reviewRadios9">
                                            <i class="bi bi-star-fill star-icon"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="primary-btn2 d-block w-100 text-center py-3" style="font-size: 18px"
                            type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('frontend_script')
@endpush
