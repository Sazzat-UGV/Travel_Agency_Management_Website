@extends('frontend.layout.master')
@section('title')
    FAQ
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_name' => 'FAQ',
    ])

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="faq-content">
                        <div class="accordion" id="accordionTravel">
                            @foreach ($faqs as $index => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="travelheadingOne{{ $index }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#travelcollapseOne{{ $index }}" aria-expanded="false"
                                            aria-controls="travelcollapseOne{{ $index }}">
                                            {{ $index + 1 }}. {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="travelcollapseOne{{ $index }}" class="accordion-collapse collapse"
                                        aria-labelledby="travelheadingOne{{ $index }}"
                                        data-bs-parent="#accordionTravel" style="">
                                        <div class="accordion-body">
                                            {{ $faq->answer }}
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
@endsection
@push('frontend_script')
@endpush
