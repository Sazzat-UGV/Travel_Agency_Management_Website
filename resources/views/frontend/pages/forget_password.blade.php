@extends('frontend.layout.master')
@section('title')
    Forget Password
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
                        <h1>Forget Password</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>Forget Password</li>
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
                                
                                <div class="form-inner d-block text-center mb-10">
                                    <button class="primary-btn1 btn-hover" type="submit" style="text-align: center;">
                                        Sent Reset Link
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
