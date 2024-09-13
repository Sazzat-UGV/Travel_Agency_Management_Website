@extends('frontend.layout.master')
@section('title')
    Team Members
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_heading' => 'Team Members',
        'parent_page_name' => '',
        'parent_page_link' => '',
        'page_name' => 'Team Members',
    ])
    @if ($team_members->count() > 0)
        <!-- Team member section start-->
        <div class="guide-section pt-120 mb-120">
            <div class="container">
                <div class="row g-lg-4 gy-5">
                    @foreach ($team_members as $team_member)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="teams-card2">
                                <div class="teams-img">
                                    <img src="{{ asset('uploads/team_member') }}/{{ $team_member->photo }}"
                                        alt="Member Photo">
                                    @if (
                                        $team_member->facebook != '' ||
                                            $team_member->twitter != '' ||
                                            $team_member->instagram != '' ||
                                            $team_member->linkedin != '')
                                        <ul class="social-list d-flex justify-content-center">
                                            @if ($team_member->facebook)
                                                <li>
                                                    <a href="{{ $team_member->facebook }}"><i
                                                            class="bx bxl-facebook"></i></a>
                                                </li>
                                            @endif
                                            @if ($team_member->twitter)
                                                <li>
                                                    <a href="{{ $team_member->twitter }}"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                            fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z">
                                                            </path>
                                                        </svg></a>
                                                </li>
                                            @endif
                                            @if ($team_member->instagram)
                                                <li>
                                                    <a href="{{ $team_member->instagram }}"><i
                                                            class="bx bxl-instagram"></i></a>
                                                </li>
                                            @endif
                                            @if ($team_member->linkedin)
                                                <li>
                                                    <a href="{{ $team_member->linkedin }}"><i
                                                            class="bx bxl-linkedin"></i></a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                </div>
                                <div class="teams-content">
                                    <a href="{{ route('team_member', $team_member->slug) }}">
                                        <h4>{{ $team_member->name }}</h4>
                                    </a>
                                    <span>{{ $team_member->designation }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <nav class="inner-pagination-area">
                            {{ $team_members->links('vendor.pagination.custom') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team member section end-->
    @endif
@endsection
@push('frontend_script')
@endpush
