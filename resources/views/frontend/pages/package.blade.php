@extends('frontend.layout.master')
@section('title')
    Package Detail
@endsection
@push('frontend_style')
@endpush
@section('content')
@include('frontend.layout.inc.breadcrumb', [
    'page_heading' => 'Package Detail',
    'parent_page_name' => '',
    'parent_page_link' => '',
    'page_name' => 'Package Detail',
])


@endsection
@push('frontend_script')
@endpush
