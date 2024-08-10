@extends('frontend.layout.master')
@section('title')
    Reset Password
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', ['page_name' => 'Reset Password'])

    <div class="contact-page pt-30 mb-30">
        <div class="container">
            <div class="row g-lg-4 gy-5 justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="contact-form-area">
                        <form action="{{ route('reset_password_submit', [$token, $email]) }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-12 mb-20">
                                    <div class="form-inner">
                                        <label for="password">Password<span class="text-danger">*</span></label>
                                        <input type="password" id="password" placeholder="Enter your password"
                                            name="password"
                                            class="form-control @error('password')
                                            is-invalid
                                        @enderror">
                                        @error('password')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-20">
                                    <div class="form-inner">
                                        <label for="retype_password">Retype Password<span
                                                class="text-danger">*</span></label>
                                        <input type="retype_password" id="retype_password"
                                            placeholder="Enter retype password" name="retype_password"
                                            class="form-control @error('retype_password')
                                            is-invalid
                                        @enderror">
                                        @error('retype_password')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-inner d-block text-center mb-10">
                                    <button class="primary-btn1 btn-hover" type="submit" style="text-align: center;">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('frontend_script')
@endpush
