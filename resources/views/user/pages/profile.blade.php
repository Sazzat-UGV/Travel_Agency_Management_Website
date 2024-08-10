@extends('user.layout.master')
@section('title')
    Profile
@endsection
@push('user_style')
@endpush
@section('content')
    <div class="col-xl-12">
        <div class="dashboard-profile-wrapper">
            <div class="dashboard-profile-nav">
                <div class="d-flex flex-column align-items-center text-center">
                    @if (!Auth::user()->photo)
                        <img src="{{ asset('uploads/user/default.jpg') }}" alt="User" class="rounded-circle" width="150">
                    @else
                        <img src="{{ asset('uploads/user') }}/{{ Auth::user()->photo }}" alt="User" class="rounded-circle"
                            width="150">
                    @endif
                    <div class="mt-3">
                        <h4>{{ Auth::guard('web')->user()->name }}</h4>
                    </div>
                </div>
            </div>
            <div class="tab-content w-100" id="pills-tabContent">
                <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="dashboard-profile-tab-content">
                        <form action="{{ route('profile_submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>Name<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter your name" name="name"
                                            value="{{ old('name', Auth::user()->name) }}"
                                            class="@error('name')
                                        is-invalid
                                        @enderror">
                                        @error('name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>Email<span class="text-danger">*</span></label>
                                        <input type="email" placeholder="Enter your email" name="email"
                                            value="{{ old('email', Auth::user()->email) }}"
                                            class="@error('email')
                                        is-invalid
                                        @enderror">
                                        @error('email')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>Phone<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter your phone" name="phone"
                                            value="{{ old('phone', Auth::user()->phone) }}"
                                            class="@error('phone')
                                        is-invalid
                                        @enderror">
                                        @error('phone')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>Country<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter your country" name="country"
                                            value="{{ old('country', Auth::user()->country) }}"
                                            class="@error('country')
                                        is-invalid
                                        @enderror">
                                        @error('country')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>Address<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter your address" name="address"
                                            value="{{ old('address', Auth::user()->address) }}"
                                            class="@error('address')
                                        is-invalid
                                        @enderror">
                                        @error('address')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>State<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter your state" name="state"
                                            value="{{ old('state', Auth::user()->state) }}"
                                            class="@error('state')
                                        is-invalid
                                        @enderror">
                                        @error('state')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>City<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter your city" name="city"
                                            value="{{ old('city', Auth::user()->city) }}"
                                            class="@error('city')
                                        is-invalid
                                        @enderror">
                                        @error('city')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>Zip Code<span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter your zip code" name="zip_code"
                                            value="{{ old('zip_code', Auth::user()->zip) }}"
                                            class="@error('zip_code')
                                        is-invalid
                                        @enderror">
                                        @error('zip_code')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>Password</label>
                                        <input type="password" placeholder="Enter password" name="password"
                                            class="@error('password')
                                        is-invalid
                                        @enderror">
                                        @error('password')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>Retype Password</label>
                                        <input type="password" placeholder="Enter retype password" name="retype_password"
                                            class="@error('retype_password')
                                        is-invalid
                                        @enderror">
                                        @error('retype_password')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-inner mb-30">
                                        <label>Upload Your Image <span style="font-size: 12px; font-weight: 700"
                                                class="text-danger">(JPGE or PNG)</span></label>
                                        <input type="file" name="photo" style="padding-top: 15px"
                                            class="form-control @error('photo')
                                        is-invalid
                                        @enderror">
                                        @error('photo')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="form-inner">
                                <button type="submit" class="primary-btn3">Update Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('user_script')
    @push('user_script')
    @endpush

@endpush
