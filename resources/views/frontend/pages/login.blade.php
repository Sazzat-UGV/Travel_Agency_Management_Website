@extends('frontend.layout.master')
@section('title')
    Login
@endsection
@push('frontend_style')
@endpush
@section('content')
    <div class="breadcrumb-section"
        style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, 0.3) 101.02%), url({{ asset('assets/frontend') }}/img/innerpage/inner-banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="banner-content">
                        <h1>Login</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-page pt-30 mb-30">
        <div class="container">
            <div class="row g-lg-4 gy-5 justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="contact-form-area">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-12 mb-20">
                                    <div class="form-inner">
                                        <label for="email">Email<span class="text-danger">*</span></label>
                                        <input type="email" id="email" placeholder="Enter your email" name="email"
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

                                <div class="form-inner d-block text-center mb-10">
                                    <button class="primary-btn1 btn-hover" type="submit" style="text-align: center;">
                                        Login
                                    </button>
                                </div>

                                <div
                                    class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-center">
                                    <div class="mb-2 mb-md-0">
                                        <p class="d-inline-block mb-0">Don't have an account?</p>
                                        <a href="{{ route('registration') }}" class="d-inline-block ml-2">SignUp</a>
                                    </div>
                                    <div class="">
                                        <a href="{{ route('forget_password') }}" class="d-inline-block">Forget Password?</a>
                                    </div>
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
