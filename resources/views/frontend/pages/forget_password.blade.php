@extends('frontend.layout.master')
@section('title')
    Forget Password
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_name' => 'Forget Password',
    ])

    <div class="contact-page pt-30 mb-30">
        <div class="container">
            <div class="row g-lg-4 gy-5 justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="contact-form-area">
                        <form action="{{ route('forget_password_submit') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-12 mb-20">
                                    <div class="form-inner">
                                        <label for="email">Email<span class="text-danger">*</span></label>
                                        <input type="email" id="email" placeholder="Enter your email" name="email"
                                            value="{{ old('email') }}"
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
