@extends('admin.layout.master')
@section('title')
    Dashboard
@endsection
@push('admin_style')
@endpush
@section('content')
    <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card ">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="menu-icon tf-icons bx bx-slider"></i>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Sliders</span>
                <h3 class="card-title mb-2">{{ $total_slider }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card ">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="menu-icon tf-icons bx bx-comment"></i>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Testimonials</span>
                <h3 class="card-title mb-2">{{ $total_testimonial }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card ">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="menu-icon tf-icons bx bx-user-circle"></i>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Team Members</span>
                <h3 class="card-title mb-2">{{ $total_team_member }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card ">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="menu-icon tf-icons bx bx-podcast"></i>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Posts</span>
                <h3 class="card-title mb-2">{{ $total_blog_post }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card ">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="menu-icon tf-icons bx bx-current-location"></i>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Destinations</span>
                <h3 class="card-title mb-2">{{ $total_destination }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card ">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="menu-icon tf-icons bx bx-package"></i>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Packages</span>
                <h3 class="card-title mb-2">{{ $total_package }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card ">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Users</span>
                <h3 class="card-title mb-2">{{ $total_user }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card ">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Subscribers</span>
                <h3 class="card-title mb-2">{{ $total_subscriber }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card ">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <i class="menu-icon tf-icons bx bxs-plane"></i>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Tours</span>
                <h3 class="card-title mb-2">{{ $total_tour }}</h3>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
@endpush
