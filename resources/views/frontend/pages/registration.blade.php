@extends('frontend.layout.master')
@section('title')
    SignUp
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_name' => 'SignUp',
    ])

    <div class="contact-page pt-30 mb-30">
        <div class="container">
            <div class="row g-lg-4 gy-5 justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="contact-form-area">
                        <form action="{{ route('registration_submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-20">
                                    <div class="form-inner">
                                        <label for="name">Name<span class="text-danger">*</span></label>
                                        <input type="text" id="name" placeholder="Enter your name"
                                            value="{{ old('name') }}" name="name"
                                            class="form-control @error('name')
                                            is-invalid
                                        @enderror">
                                        @error('name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-20">
                                    <div class="form-inner">
                                        <label for="email">Email<span class="text-danger">*</span></label>
                                        <input type="email" id="email" placeholder="Enter your email"
                                            value="{{ old('email') }}" name="email"
                                            class="form-control @error('email')
                                            is-invalid
                                        @enderror">
                                        @error('email')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-20">
                                    <div class="form-inner">
                                        <label for="password">Password<span class="text-danger">*</span></label>
                                        <input type="password" id="password" placeholder="Enter password" name="password"
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
                                        <label for="confirm_password">Confirm Password<span
                                                class="text-danger">*</span></label>
                                        <input type="password" id="confirm_password" placeholder="Enter confirm password"
                                            name="confirm_password"
                                            class="form-control @error('confirm_password')
                                            is-invalid
                                        @enderror">
                                        @error('confirm_password')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-inner d-block text-center mb-10">
                                    <button class="primary-btn1 btn-hover" type="submit" style="text-align: center;">
                                        SignUp
                                    </button>
                                </div>

                                <div class="col-12">
                                    <p class="d-inline-block mb-0">Already have an account?</p>
                                    <a href="{{ route('login') }}" class="d-inline-block ml-2">Login</a>
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
