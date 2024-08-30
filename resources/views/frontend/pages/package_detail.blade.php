@extends('frontend.layout.master')
@section('title')
    Package Detail
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_heading' => $package->name,
        'parent_page_name' => 'Packages',
        'parent_page_link' => '#',
        'page_name' => $package->name,
    ])

    <div class="package-details-area pt-120 mb-120 position-relative">
        <div class="container">
            <div class="row">


                <div class="co-lg-12">
                    <div class="package-img-group mb-50">
                        <div class="row align-items-center g-3">
                            <div
                                class="@if ($package_photos->count() > 0) col-lg-6
                                @elseif ($package_videos->count() > 0)
                                col-lg-6
                                @else
                                col-lg-12 @endif">
                                <div class="gallery-img-wrap">
                                    <img src="{{ asset('uploads/package') }}/{{ $package->featured_photo }}"
                                        alt="featured photo">
                                    <a data-fancybox="gallery-01"
                                        href="{{ asset('uploads/package') }}/{{ $package->featured_photo }}"><i
                                            class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 h-100">
                                <div class="row g-3 h-100">
                                    @if ($package_photos->count() > 3)
                                        @foreach ($package_photos->take(2) as $package_photo)
                                            <div class="col-6">
                                                <div class="gallery-img-wrap">
                                                    <img src="{{ asset('uploads/package/' . $package_photo->photo) }}"
                                                        alt="package photo">
                                                    <a data-fancybox="gallery-01"
                                                        href="{{ asset('uploads/package/' . $package_photo->photo) }}">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="col-6">
                                            <div class="gallery-img-wrap active">
                                                <img src="{{ asset('uploads/package/' . $package_photos->skip(2)->first()->photo) }}"
                                                    alt="package photo">
                                                <a data-fancybox="gallery-01"
                                                    href="{{ asset('uploads/package/' . $package_photos->skip(2)->first()->photo) }}">
                                                    <i class="bi bi-plus-lg"></i> View More Images
                                                </a>
                                            </div>
                                        </div>

                                        {{-- Hidden links for all other images to be included in the Fancybox gallery --}}
                                        @foreach ($package_photos->skip(2) as $package_photo)
                                            <a data-fancybox="gallery-01"
                                                href="{{ asset('uploads/package/' . $package_photo->photo) }}"
                                                style="display: none;"></a>
                                        @endforeach
                                    @elseif ($package_photos->count() == 3)
                                        @foreach ($package_photos as $package_photo)
                                            <div class="col-6">
                                                <div class="gallery-img-wrap">
                                                    <img src="{{ asset('uploads/package/' . $package_photo->photo) }}"
                                                        alt="package photo">
                                                    <a data-fancybox="gallery-01"
                                                        href="{{ asset('uploads/package/' . $package_photo->photo) }}">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if ($package_videos->isNotEmpty())
                                        @php
                                            $firstVideo = $package_videos->first();
                                            $thumbnailUrl = "https://img.youtube.com/vi/{$firstVideo->video}/hqdefault.jpg";
                                        @endphp

                                        <div class="col-6">
                                            <div class="gallery-img-wrap active">
                                                <img src="{{ $thumbnailUrl }}" alt="Video Thumbnail">
                                                <a data-fancybox="video-gallery"
                                                    href="https://www.youtube.com/watch?v={{ $firstVideo->video }}">
                                                    <i class="bi bi-play-circle"></i> Watch Video
                                                </a>
                                            </div>
                                        </div>

                                        {{-- Hidden links for other videos to show in the Fancybox gallery --}}
                                        @foreach ($package_videos->skip(1) as $video)
                                            @php
                                                // Generate thumbnail URL for each video
                                                $thumbnailUrl = "https://img.youtube.com/vi/{$video->video}/hqdefault.jpg";
                                            @endphp
                                            <a data-fancybox="video-gallery"
                                                href="https://www.youtube.com/watch?v={{ $video->video }}"
                                                style="display: none;">
                                                <img src="{{ $thumbnailUrl }}" alt="Video Thumbnail">
                                            </a>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-xl-4 gy-5">
                <div class="col-xl-8">
                    <h2>{{ $package->name }}</h2>
                    <div class="tour-price">
                        <h3>${{ $package->price }}/</h3><span>per person</span>
                    </div>
                    <ul class="tour-info-metalist">

                        <li>
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 7C7.92826 7 8.8185 6.63125 9.47487 5.97487C10.1313 5.3185 10.5 4.42826 10.5 3.5C10.5 2.57174 10.1313 1.6815 9.47487 1.02513C8.8185 0.368749 7.92826 0 7 0C6.07174 0 5.1815 0.368749 4.52513 1.02513C3.86875 1.6815 3.5 2.57174 3.5 3.5C3.5 4.42826 3.86875 5.3185 4.52513 5.97487C5.1815 6.63125 6.07174 7 7 7ZM14 12.8333C14 14 12.8333 14 12.8333 14H1.16667C1.16667 14 0 14 0 12.8333C0 11.6667 1.16667 8.16667 7 8.16667C12.8333 8.16667 14 11.6667 14 12.8333Z">
                                </path>
                            </svg>
                            Max People : 40
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14 0.43748C14 0.372778 13.9856 0.308889 13.9579 0.250418C13.9302 0.191947 13.8898 0.140348 13.8398 0.0993396C13.7897 0.0583312 13.7312 0.0289339 13.6684 0.0132656C13.6057 -0.00240264 13.5402 -0.00395173 13.4768 0.00872996L9.1875 0.86623L4.89825 0.00872996C4.84164 -0.00258444 4.78336 -0.00258444 4.72675 0.00872996L0.35175 0.88373C0.252608 0.903546 0.163389 0.957088 0.099263 1.03525C0.0351366 1.11342 6.10593e-05 1.21138 0 1.31248L0 13.5625C3.90711e-05 13.6272 0.0144289 13.6911 0.0421328 13.7495C0.0698367 13.808 0.110165 13.8596 0.160212 13.9006C0.210259 13.9416 0.268779 13.971 0.331556 13.9867C0.394332 14.0024 0.459803 14.0039 0.52325 13.9912L4.8125 13.1337L9.10175 13.9912C9.15836 14.0025 9.21664 14.0025 9.27325 13.9912L13.6482 13.1162C13.7474 13.0964 13.8366 13.0429 13.9007 12.9647C13.9649 12.8865 13.9999 12.7886 14 12.6875V0.43748ZM4.375 12.3287V0.97123L4.8125 0.88373L5.25 0.97123V12.3287L4.89825 12.2587C4.84165 12.2474 4.78335 12.2474 4.72675 12.2587L4.375 12.3287ZM8.75 13.0287V1.67123L9.10175 1.74123C9.15836 1.75254 9.21664 1.75254 9.27325 1.74123L9.625 1.67123V13.0287L9.1875 13.1162L8.75 13.0287Z">
                                </path>
                            </svg>
                            {{ $package->destination->country }}
                        </li>
                    </ul>
                    <p>{!! $package->description !!}</p>
                    @if ($package_amenity_include->count() > 0 || $package_amenity_exclude->count() > 0)
                        <h4>Included @if ($package_amenity_exclude->count() > 0)
                                and Excluded
                            @endif
                        </h4>
                        <div class="includ-and-exclud-area mb-20">
                            <ul>
                                @foreach ($package_amenity_include as $include)
                                    <li><i class="bi bi-check-lg"></i> {{ $include->amenity->name }}</li>
                                @endforeach
                            </ul>
                            <ul class="exclud">
                                @foreach ($package_amenity_exclude as $exclude)
                                    <li><i class="bi bi-x-lg"></i> {{ $exclude->amenity->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($package_itineraries->count() > 0)
                        <h4>Itinerary</h4>
                        <div class="accordion tour-plan" id="tourPlan">
                            @foreach ($package_itineraries as $index => $itinerary)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne-{{ $index }}" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <span>Day {{ $itinerary->day }} :</span> {{ $itinerary->name }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne-{{ $index }}" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#tourPlan">
                                        <div class="accordion-body">
                                            {!! $itinerary->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if ($package->map)
                        <div class="tour-location">
                            <h4>Location Map</h4>
                            <div class="map-area mb-30">
                                {!! $package->map !!}
                            </div>
                        </div>
                    @endif
                    @if ($package_faqs->count() > 0)
                        <div class="faq-content-wrap mb-80">
                            <div class="faq-content-title mb-20">
                                <h4>Frequently Asked &amp; Question</h4>
                            </div>
                            <div class="faq-content">
                                <div class="accordion" id="accordionTravel">
                                    @foreach ($package_faqs as $index => $faq)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="travelheadingOne-{{ $index }}">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#travelcollapseOne-{{ $index }}"
                                                    aria-expanded="true" aria-controls="travelcollapseOne">
                                                    {{ $index + 1 }}. {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <div id="travelcollapseOne-{{ $index }}"
                                                class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                                aria-labelledby="travelheadingOne-{{ $index }}"
                                                data-bs-parent="#accordionTravel">
                                                <div class="accordion-body ">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                    @endif
                </div>


                <div class="review-wrapper">
                    <h4>Customer Review</h4>
                    <div class="review-box">
                        <div class="total-review">
                            <h2>9.5</h2>
                            <div class="review-wrap">
                                <ul class="star-list">
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-fill"></i></li>
                                    <li><i class="bi bi-star-half"></i></li>
                                </ul>
                                <span>2590 Reviews</span>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"><i class="bi bi-x-lg"></i></button>
                                        <div class="row g-2">
                                            <div class="col-lg-8">
                                                <div class="review-from-wrapper">
                                                    <h4>Write Your Review</h4>
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-20">
                                                                <div class="form-inner">
                                                                    <label>Name</label>
                                                                    <input type="text" placeholder="Enter Your Name:">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-20">
                                                                <div class="form-inner">
                                                                    <label>Email</label>
                                                                    <input type="email" placeholder="Enter Your Email:">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-20">
                                                                <div class="form-inner">
                                                                    <label>Review*</label>
                                                                    <textarea name="message" placeholder="Enter Your Review..."></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-40">
                                                                <div class="star-rating-wrapper">
                                                                    <ul class="star-rating-list">
                                                                        <li>
                                                                            <div class="rating-container" data-rating="0">
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                            </div>
                                                                            <span>Overall</span>
                                                                        </li>
                                                                        <li>
                                                                            <div class="rating-container" data-rating="0">
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                            </div>
                                                                            <span>Transport</span>
                                                                        </li>
                                                                        <li>
                                                                            <div class="rating-container" data-rating="0">
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                            </div>
                                                                            <span>Food</span>
                                                                        </li>
                                                                        <li>
                                                                            <div class="rating-container" data-rating="0">
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                            </div>
                                                                            <span>Destination</span>
                                                                        </li>
                                                                        <li>
                                                                            <div class="rating-container" data-rating="0">
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                                <i class="bi bi-star-fill star-icon"></i>
                                                                            </div>
                                                                            <span>Hospitality</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <button type="submit" class="primary-btn1">Submit
                                                                    Now</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 d-lg-flex d-none">
                                                <div class="modal-form-image">
                                                    <img src="{{ asset('assets/frontend') }}/img/innerpage/form-image.jpg"
                                                        alt="image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="primary-btn1" data-bs-toggle="modal" href="#exampleModalToggle" role="button">GIVE A
                            RATING</a>
                    </div>
                    <div class="review-area">
                        <ul class="comment">
                            <li>
                                <div class="single-comment-area">
                                    <div class="author-img">
                                        <img src="{{ asset('assets/frontend') }}/img/innerpage/comment-author-01.jpg"
                                            alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="author-name-deg">
                                            <h6>Mr. Bowmik Haldar,</h6>
                                            <span>05 June, 2023</span>
                                        </div>
                                        <ul class="review-item-list">
                                            <li>
                                                <span>Overall</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Transport</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Food</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Destination</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Hospitality</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <p>A solution that we came up with is to think of sanitary pads packaging as you
                                            would tea. Tea comes individually packaged </p>
                                        <div class="replay-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11"
                                                viewBox="0 0 14 11">
                                                <path
                                                    d="M8.55126 1.11188C8.52766 1.10118 8.50182 1.09676 8.47612 1.09903C8.45042 1.1013 8.42569 1.11018 8.40419 1.12486C8.3827 1.13954 8.36513 1.15954 8.35311 1.18304C8.34109 1.20653 8.335 1.23276 8.33539 1.25932V2.52797C8.33539 2.67388 8.2791 2.81381 8.17889 2.91698C8.07868 3.02016 7.94277 3.07812 7.80106 3.07812C7.08826 3.07812 5.64984 3.08362 4.27447 3.98257C3.2229 4.66916 2.14783 5.9191 1.50129 8.24735C2.59132 7.16575 3.83632 6.57929 4.92635 6.2679C5.59636 6.07737 6.28492 5.96444 6.97926 5.93121C7.26347 5.91835 7.54815 5.92129 7.83205 5.94001H7.84594L7.85129 5.94111L7.80106 6.48906L7.85449 5.94111C7.98638 5.95476 8.10864 6.01839 8.19751 6.11966C8.28638 6.22092 8.33553 6.35258 8.33539 6.48906V7.75771C8.33539 7.87654 8.45294 7.95136 8.55126 7.90515L12.8088 4.67796C12.8233 4.66692 12.8383 4.65664 12.8537 4.64715C12.8769 4.63278 12.8962 4.61245 12.9095 4.58816C12.9229 4.56386 12.9299 4.53643 12.9299 4.50851C12.9299 4.4806 12.9229 4.45316 12.9095 4.42887C12.8962 4.40458 12.8769 4.38425 12.8537 4.36988C12.8382 4.36039 12.8233 4.35011 12.8088 4.33907L8.55126 1.11188ZM7.26673 7.02381C7.19406 7.02381 7.11391 7.02711 7.02842 7.03041C6.56462 7.05242 5.92342 7.12504 5.21169 7.32859C3.79464 7.7335 2.11684 8.65116 1.00115 10.7175C0.940817 10.8291 0.844683 10.9155 0.729224 10.9621C0.613765 11.0087 0.486168 11.0124 0.368304 10.9728C0.250441 10.9331 0.149648 10.8525 0.0831985 10.7447C0.0167484 10.6369 -0.011219 10.5086 0.0040884 10.3819C0.499949 6.29981 2.01959 4.15202 3.70167 3.05391C5.03215 2.18467 6.40218 2.01743 7.26673 1.98552V1.25932C7.26663 1.03273 7.32593 0.810317 7.43839 0.615545C7.55084 0.420773 7.71227 0.260866 7.90565 0.152696C8.09902 0.0445258 8.31717 -0.00789584 8.53707 0.000962485C8.75698 0.00982081 8.97048 0.0796305 9.15506 0.203025L13.4233 3.43792C13.5998 3.55133 13.7453 3.7091 13.8462 3.8964C13.9471 4.08369 14 4.29434 14 4.50851C14 4.72269 13.9471 4.93333 13.8462 5.12063C13.7453 5.30792 13.5998 5.4657 13.4233 5.57911L9.15506 8.814C8.97048 8.9374 8.75698 9.00721 8.53707 9.01607C8.31717 9.02492 8.09902 8.9725 7.90565 8.86433C7.71227 8.75616 7.55084 8.59626 7.43839 8.40148C7.32593 8.20671 7.26663 7.9843 7.26673 7.75771V7.02381Z">
                                                </path>
                                            </svg>
                                            Reply (01)
                                        </div>
                                    </div>
                                </div>
                                <ul class="comment-replay">
                                    <li>
                                        <div class="single-comment-area">
                                            <div class="author-img">
                                                <img src="{{ asset('assets/frontend') }}/img/innerpage/comment-author-02.jpg"
                                                    alt="">
                                            </div>
                                            <div class="comment-content">
                                                <div class="author-name-deg">
                                                    <h6>Author Response,</h6>
                                                    <span>05 June, 2023</span>
                                                </div>
                                                <p>Thanks for your review.</p>
                                                <div class="replay-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11"
                                                        viewBox="0 0 14 11">
                                                        <path
                                                            d="M8.55126 1.11188C8.52766 1.10118 8.50182 1.09676 8.47612 1.09903C8.45042 1.1013 8.42569 1.11018 8.40419 1.12486C8.3827 1.13954 8.36513 1.15954 8.35311 1.18304C8.34109 1.20653 8.335 1.23276 8.33539 1.25932V2.52797C8.33539 2.67388 8.2791 2.81381 8.17889 2.91698C8.07868 3.02016 7.94277 3.07812 7.80106 3.07812C7.08826 3.07812 5.64984 3.08362 4.27447 3.98257C3.2229 4.66916 2.14783 5.9191 1.50129 8.24735C2.59132 7.16575 3.83632 6.57929 4.92635 6.2679C5.59636 6.07737 6.28492 5.96444 6.97926 5.93121C7.26347 5.91835 7.54815 5.92129 7.83205 5.94001H7.84594L7.85129 5.94111L7.80106 6.48906L7.85449 5.94111C7.98638 5.95476 8.10864 6.01839 8.19751 6.11966C8.28638 6.22092 8.33553 6.35258 8.33539 6.48906V7.75771C8.33539 7.87654 8.45294 7.95136 8.55126 7.90515L12.8088 4.67796C12.8233 4.66692 12.8383 4.65664 12.8537 4.64715C12.8769 4.63278 12.8962 4.61245 12.9095 4.58816C12.9229 4.56386 12.9299 4.53643 12.9299 4.50851C12.9299 4.4806 12.9229 4.45316 12.9095 4.42887C12.8962 4.40458 12.8769 4.38425 12.8537 4.36988C12.8382 4.36039 12.8233 4.35011 12.8088 4.33907L8.55126 1.11188ZM7.26673 7.02381C7.19406 7.02381 7.11391 7.02711 7.02842 7.03041C6.56462 7.05242 5.92342 7.12504 5.21169 7.32859C3.79464 7.7335 2.11684 8.65116 1.00115 10.7175C0.940817 10.8291 0.844683 10.9155 0.729224 10.9621C0.613765 11.0087 0.486168 11.0124 0.368304 10.9728C0.250441 10.9331 0.149648 10.8525 0.0831985 10.7447C0.0167484 10.6369 -0.011219 10.5086 0.0040884 10.3819C0.499949 6.29981 2.01959 4.15202 3.70167 3.05391C5.03215 2.18467 6.40218 2.01743 7.26673 1.98552V1.25932C7.26663 1.03273 7.32593 0.810317 7.43839 0.615545C7.55084 0.420773 7.71227 0.260866 7.90565 0.152696C8.09902 0.0445258 8.31717 -0.00789584 8.53707 0.000962485C8.75698 0.00982081 8.97048 0.0796305 9.15506 0.203025L13.4233 3.43792C13.5998 3.55133 13.7453 3.7091 13.8462 3.8964C13.9471 4.08369 14 4.29434 14 4.50851C14 4.72269 13.9471 4.93333 13.8462 5.12063C13.7453 5.30792 13.5998 5.4657 13.4233 5.57911L9.15506 8.814C8.97048 8.9374 8.75698 9.00721 8.53707 9.01607C8.31717 9.02492 8.09902 8.9725 7.90565 8.86433C7.71227 8.75616 7.55084 8.59626 7.43839 8.40148C7.32593 8.20671 7.26663 7.9843 7.26673 7.75771V7.02381Z">
                                                        </path>
                                                    </svg>
                                                    Reply
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="single-comment-area">
                                    <div class="author-img">
                                        <img src="{{ asset('assets/frontend') }}/img/innerpage/comment-author-04.jpg"
                                            alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="author-name-deg">
                                            <h6>Srileka Panday,</h6>
                                            <span>05 June, 2023</span>
                                        </div>
                                        <ul class="review-item-list">
                                            <li>
                                                <span>Overall</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Transport</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Food</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Destination</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Hospitality</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <p>A solution that we came up with is to think of sanitary pads packaging as you
                                            would tea. Tea comes individually packaged </p>
                                        <div class="replay-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11"
                                                viewBox="0 0 14 11">
                                                <path
                                                    d="M8.55126 1.11188C8.52766 1.10118 8.50182 1.09676 8.47612 1.09903C8.45042 1.1013 8.42569 1.11018 8.40419 1.12486C8.3827 1.13954 8.36513 1.15954 8.35311 1.18304C8.34109 1.20653 8.335 1.23276 8.33539 1.25932V2.52797C8.33539 2.67388 8.2791 2.81381 8.17889 2.91698C8.07868 3.02016 7.94277 3.07812 7.80106 3.07812C7.08826 3.07812 5.64984 3.08362 4.27447 3.98257C3.2229 4.66916 2.14783 5.9191 1.50129 8.24735C2.59132 7.16575 3.83632 6.57929 4.92635 6.2679C5.59636 6.07737 6.28492 5.96444 6.97926 5.93121C7.26347 5.91835 7.54815 5.92129 7.83205 5.94001H7.84594L7.85129 5.94111L7.80106 6.48906L7.85449 5.94111C7.98638 5.95476 8.10864 6.01839 8.19751 6.11966C8.28638 6.22092 8.33553 6.35258 8.33539 6.48906V7.75771C8.33539 7.87654 8.45294 7.95136 8.55126 7.90515L12.8088 4.67796C12.8233 4.66692 12.8383 4.65664 12.8537 4.64715C12.8769 4.63278 12.8962 4.61245 12.9095 4.58816C12.9229 4.56386 12.9299 4.53643 12.9299 4.50851C12.9299 4.4806 12.9229 4.45316 12.9095 4.42887C12.8962 4.40458 12.8769 4.38425 12.8537 4.36988C12.8382 4.36039 12.8233 4.35011 12.8088 4.33907L8.55126 1.11188ZM7.26673 7.02381C7.19406 7.02381 7.11391 7.02711 7.02842 7.03041C6.56462 7.05242 5.92342 7.12504 5.21169 7.32859C3.79464 7.7335 2.11684 8.65116 1.00115 10.7175C0.940817 10.8291 0.844683 10.9155 0.729224 10.9621C0.613765 11.0087 0.486168 11.0124 0.368304 10.9728C0.250441 10.9331 0.149648 10.8525 0.0831985 10.7447C0.0167484 10.6369 -0.011219 10.5086 0.0040884 10.3819C0.499949 6.29981 2.01959 4.15202 3.70167 3.05391C5.03215 2.18467 6.40218 2.01743 7.26673 1.98552V1.25932C7.26663 1.03273 7.32593 0.810317 7.43839 0.615545C7.55084 0.420773 7.71227 0.260866 7.90565 0.152696C8.09902 0.0445258 8.31717 -0.00789584 8.53707 0.000962485C8.75698 0.00982081 8.97048 0.0796305 9.15506 0.203025L13.4233 3.43792C13.5998 3.55133 13.7453 3.7091 13.8462 3.8964C13.9471 4.08369 14 4.29434 14 4.50851C14 4.72269 13.9471 4.93333 13.8462 5.12063C13.7453 5.30792 13.5998 5.4657 13.4233 5.57911L9.15506 8.814C8.97048 8.9374 8.75698 9.00721 8.53707 9.01607C8.31717 9.02492 8.09902 8.9725 7.90565 8.86433C7.71227 8.75616 7.55084 8.59626 7.43839 8.40148C7.32593 8.20671 7.26663 7.9843 7.26673 7.75771V7.02381Z">
                                                </path>
                                            </svg>
                                            Reply
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-comment-area">
                                    <div class="author-img">
                                        <img src="{{ asset('assets/frontend') }}/img/innerpage/comment-author-05.jpg"
                                            alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="author-name-deg">
                                            <h6>Mr. Bowmik Haldar,</h6>
                                            <span>05 June, 2023</span>
                                        </div>
                                        <ul class="review-item-list">
                                            <li>
                                                <span>Overall</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Transport</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Food</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Destination</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span>Hospitality</span>
                                                <ul class="star-list">
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <p>However, here are some well-regarded car dealerships known for their customer
                                            service, inventory, and overall reputation. It's always a good idea to
                                            research and read reviews specific...</p>
                                        <div class="replay-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11"
                                                viewBox="0 0 14 11">
                                                <path
                                                    d="M8.55126 1.11188C8.52766 1.10118 8.50182 1.09676 8.47612 1.09903C8.45042 1.1013 8.42569 1.11018 8.40419 1.12486C8.3827 1.13954 8.36513 1.15954 8.35311 1.18304C8.34109 1.20653 8.335 1.23276 8.33539 1.25932V2.52797C8.33539 2.67388 8.2791 2.81381 8.17889 2.91698C8.07868 3.02016 7.94277 3.07812 7.80106 3.07812C7.08826 3.07812 5.64984 3.08362 4.27447 3.98257C3.2229 4.66916 2.14783 5.9191 1.50129 8.24735C2.59132 7.16575 3.83632 6.57929 4.92635 6.2679C5.59636 6.07737 6.28492 5.96444 6.97926 5.93121C7.26347 5.91835 7.54815 5.92129 7.83205 5.94001H7.84594L7.85129 5.94111L7.80106 6.48906L7.85449 5.94111C7.98638 5.95476 8.10864 6.01839 8.19751 6.11966C8.28638 6.22092 8.33553 6.35258 8.33539 6.48906V7.75771C8.33539 7.87654 8.45294 7.95136 8.55126 7.90515L12.8088 4.67796C12.8233 4.66692 12.8383 4.65664 12.8537 4.64715C12.8769 4.63278 12.8962 4.61245 12.9095 4.58816C12.9229 4.56386 12.9299 4.53643 12.9299 4.50851C12.9299 4.4806 12.9229 4.45316 12.9095 4.42887C12.8962 4.40458 12.8769 4.38425 12.8537 4.36988C12.8382 4.36039 12.8233 4.35011 12.8088 4.33907L8.55126 1.11188ZM7.26673 7.02381C7.19406 7.02381 7.11391 7.02711 7.02842 7.03041C6.56462 7.05242 5.92342 7.12504 5.21169 7.32859C3.79464 7.7335 2.11684 8.65116 1.00115 10.7175C0.940817 10.8291 0.844683 10.9155 0.729224 10.9621C0.613765 11.0087 0.486168 11.0124 0.368304 10.9728C0.250441 10.9331 0.149648 10.8525 0.0831985 10.7447C0.0167484 10.6369 -0.011219 10.5086 0.0040884 10.3819C0.499949 6.29981 2.01959 4.15202 3.70167 3.05391C5.03215 2.18467 6.40218 2.01743 7.26673 1.98552V1.25932C7.26663 1.03273 7.32593 0.810317 7.43839 0.615545C7.55084 0.420773 7.71227 0.260866 7.90565 0.152696C8.09902 0.0445258 8.31717 -0.00789584 8.53707 0.000962485C8.75698 0.00982081 8.97048 0.0796305 9.15506 0.203025L13.4233 3.43792C13.5998 3.55133 13.7453 3.7091 13.8462 3.8964C13.9471 4.08369 14 4.29434 14 4.50851C14 4.72269 13.9471 4.93333 13.8462 5.12063C13.7453 5.30792 13.5998 5.4657 13.4233 5.57911L9.15506 8.814C8.97048 8.9374 8.75698 9.00721 8.53707 9.01607C8.31717 9.02492 8.09902 8.9725 7.90565 8.86433C7.71227 8.75616 7.55084 8.59626 7.43839 8.40148C7.32593 8.20671 7.26663 7.9843 7.26673 7.75771V7.02381Z">
                                                </path>
                                            </svg>
                                            Reply
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="booking-form-wrap mb-40">
                    <h4>Book Your Tour</h4>
                    <p>Reserve your ideal trip early for a hassle-free trip; secure comfort and convenience!</p>
                    <div class="nav nav-pills mb-40" role="tablist">
                        <button class="nav-link show active" id="v-pills-booking-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-booking" type="button" role="tab"
                            aria-controls="v-pills-booking" aria-selected="true">Online Booking</button>
                        <button class="nav-link" id="v-pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-contact" type="button" role="tab"
                            aria-controls="v-pills-contact" aria-selected="false" tabindex="-1">Inquiry
                            Form</button>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent2">
                        <div class="tab-pane fade active show" id="v-pills-booking" role="tabpanel"
                            aria-labelledby="v-pills-booking-tab">
                            <div class="sidebar-booking-form">
                                <form action="{{ route('payment') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="ticket_price" id="ticketPrice"
                                        value="{{ $package->price }}">
                                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                                    <div class="tour-date-wrap mb-50">
                                        <h6>Select Your Tour:</h6>
                                        @foreach ($tours as $index => $tour)
                                            <div class="form-check mb-25">
                                                <input class="form-check-input" type="radio" name="tour_id"
                                                    id="checkIn-{{ $tour->id }}" value="{{ $tour->id }}"
                                                    @if (old('tour_id') == $tour->id || $index == 0) checked @endif>
                                                <label class="form-check-label" for="checkIn-{{ $tour->id }}">
                                                    <span class="tour-date">
                                                        <span class="start-date">
                                                            <span>Tour Number:</span>
                                                            <span>Tour Start:</span>
                                                            <span>Tour End:</span>
                                                            <span>Booking End:</span>
                                                            <span>Total Seat:</span>
                                                            <span>Booked Seat:</span>
                                                            @if ($tour->total_seat != '')
                                                                <span>Available Seat:</span>
                                                            @endif
                                                        </span>
                                                        <i class="bi bi-arrow-right"></i>
                                                        <span class="end-date text-end">
                                                            <span><strong>{{ $index + 1 }}</strong></span>
                                                            <span>{{ date('M d, Y', strtotime($tour->tour_start_date)) }}</span>
                                                            <span>{{ date('M d, Y', strtotime($tour->tour_end_date)) }}</span>
                                                            <span
                                                                class="text-danger text-bold">{{ date('M d, Y', strtotime($tour->booking_end_date)) }}</span>
                                                            <span>
                                                                @if ($tour->total_seat)
                                                                    {{ $tour->total_seat }}
                                                                @else
                                                                    Unlimited
                                                                @endif
                                                            </span>
                                                            <span>
                                                                @if ($tour->bookings_sum_total_person == 0)
                                                                    0
                                                                @else
                                                                    {{ $tour->bookings_sum_total_person }}
                                                            </span>
                                                            @if ($tour->total_seat != '')
                                                                <span>
                                                                    @php
                                                                        $available_seat =
                                                                            $tour->total_seat -
                                                                            $tour->bookings_sum_total_person;
                                                                    @endphp
                                                                    {{ $available_seat }}

                                                                </span>
                                                            @endif
                                        @endif
                                        </span>
                                        </span>
                                        </label>
                                    </div>
                                    @endforeach

                                    <div class="booking-form-item-type mb-35">
                                        <div class="number-input-item children">
                                            <label class="number-input-lable">Number of Person:<span>
                                                </span></label>
                                            <div class="quantity-counter">
                                                <a href="javascript:void(0)" class="quantity__minus"
                                                    onclick="calculateTotal()"><i class="bi bi-dash"></i></a>
                                                <input type="text" class="quantity__input" name="number_of_person"
                                                    value="1" id="numPersons" oninput="calculateTotal()">
                                                <a href="javascript:void(0)" class="quantity__plus"
                                                    onclick="calculateTotal()"><i class="bi bi-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inquery-form">
                                        <div class="form-inner mb-70">
                                            <label>Select Payment Method<span>*</span></label>
                                            <select style="display: none;" name="payment_method">
                                                <option value="PayPal" @if (old('payment_method') == 'PayPal') selected @endif>
                                                    PayPal</option>
                                                <option value="Stripe" @if (old('payment_method') == 'Stripe') selected @endif>
                                                    Stripe</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="booking-form-item-type mb-35">

                            </div>
                            <div class="total-price" id="totalAmount"><span>Total Price:</span>
                                ${{ $package->price }}</div>

                            @auth
                                <button type="submit" class="primary-btn1 two">Book Now</button>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}" class="primary-btn1 two">Login to Book</a>
                            @endguest
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-contact" role="tabpanel"
                        aria-labelledby="v-pills-contact-tab">
                        <div class="sidebar-booking-form">
                            <form action="{{ route('package_inquiry', $package->id) }}" method="POST">
                                @csrf
                                <div class="form-inner mb-20">
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" placeholder="Enter your full name" name="name"
                                        class="@error('name')
                                    is-invalid
                                @enderror"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" style="font-size: 11px;"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-inner mb-20">
                                    <label>Email Address <span>*</span></label>
                                    <input type="email" placeholder="Enter your email address" name="email"
                                        class="@error('email')
                                is-invalid
                            @enderror"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" style="font-size: 11px;"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-inner mb-20">
                                    <label>Phone Number <span>*</span></label>
                                    <input type="text" placeholder="Enter your phone number" name="phone"
                                        class="@error('phone')
                                is-invalid
                            @enderror"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback" style="font-size: 11px;"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-inner mb-30">
                                    <label>Write Your Massage <span>*</span></label>
                                    <textarea placeholder="Write your quiry" name="message"
                                        class="@error('message')
                                is-invalid
                            @enderror">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="invalid-feedback" style="font-size: 11px;"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-inner">
                                    <button type="submit" class="primary-btn1 two">Submit Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection
@push('frontend_script')
    <script>
        function calculateTotal() {
            const ticketPrice = parseFloat(document.getElementById('ticketPrice').value);
            const numPersons = parseInt(document.getElementById('numPersons').value);

            const totalAmount = ticketPrice * numPersons;
            document.getElementById('totalAmount').innerHTML = `<span>Total Price:</span> $${totalAmount}`;
        }

        $(".quantity__minus").on("click", function(e) {
            e.preventDefault();
            var input = $(this).siblings(".quantity__input");
            var value = parseInt(input.val());
            if (value > 1) {
                value--;
            }
            input.val(value);
            calculateTotal();
        });

        $(".quantity__plus").on("click", function(e) {
            e.preventDefault();
            var input = $(this).siblings(".quantity__input");
            var value = parseInt(input.val());
            value++;
            input.val(value);
            calculateTotal();
        });
    </script>
@endpush
