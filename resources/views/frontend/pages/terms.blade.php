@extends('frontend.layout.master')
@section('title')
    Terms of Use
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_heading' => 'Terms of Use',
        'parent_page_name' => '',
        'parent_page_link' => '',
        'page_name' => 'Terms of Use',
    ])
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! $term_privacy_item->term !!}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('frontend_script')
@endpush
