@extends('frontend.layout.master')
@section('title')
    Team Member Details
@endsection
@push('frontend_style')
    <style>
        .fa-2x {
            font-size: 25px !important;
            margin-right: 10px;
        }
    </style>
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_name' => 'Team Member Details',
    ])

    <div class="package-details-area pt-120 mb-120">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="booking-form-wrap mb-30">
                        <img src="{{ asset('uploads/team_member') }}/{{ $team_member->photo }}"  alt="Member Photo">
                        <ul class="d-flex mt-3 justify-content-center">
                            <li>
                                @if ($team_member->facebook)
                                    <div class="div"> <a href="{{ $team_member->facebook }}"><i
                                                class="fab fa-facebook-f fa-2x" style="color: #3b5998;"></i></a>
                                    </div>
                                @endif
                            </li>
                            <li>
                                @if ($team_member->twitter)
                                    <div class="div"><a href="{{ $team_member->twitter }}"><i
                                                class="fab fa-twitter fa-2x" style="color: #55acee;"></i></a>
                                    </div>
                                @endif
                            </li>
                            <li>
                                @if ($team_member->instagram)
                                    <div class="div"> <a href="{{ $team_member->instagram }}"><i
                                                class="fab fa-instagram fa-2x" style="color: #ac2bac;"></i></a>
                                    </div>
                                @endif
                            </li>
                            <li>
                                @if ($team_member->linkedin)
                                    <div class="div"> <a href="{{ $team_member->linkedin }}"><i
                                                class="fab fa-linkedin-in fa-2x" style="color: #0082ca;"></i></a>
                                    </div>
                                @endif

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $team_member->name }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Designation</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $team_member->designation }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $team_member->email }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $team_member->phone }}
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $team_member->address }}
                            </div>
                          </div>
                        </div>
                </div>
                </div>
                <div class="col-12 mt-3">
                    @if ($team_member->biography)
                    <div class="eg-tag2">
                        <span>Biography</span>
                    </div>

                    <p>{!! $team_member->biography !!}</p>
                @endif
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
@push('frontend_script')
@endpush
