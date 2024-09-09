@extends('frontend.layout.master')
@section('title')
    Privacy Policy
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_heading' => 'Privacy Policy',
        'parent_page_name' => '',
        'parent_page_link' => '',
        'page_name' => 'Privacy Policy',
    ])
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! $term_privacy_item->privacy !!}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('frontend_script')
@endpush
