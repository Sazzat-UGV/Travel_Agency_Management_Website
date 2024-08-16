@extends('admin.layout.master')
@section('title')
    Settings
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
        integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 26px;
        }
    </style>
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', ['main_page' => 'Settings', 'sub_page' => ''])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('admin.settingUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" name="phone" placeholder="Enter phone"
                                value="{{ old('phone', $setting->phone) }}"
                                class="form-control   @error('phone')
                            is-invalid
                            @enderror">
                            @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" placeholder="Enter email"
                                value="{{ old('email', $setting->email) }}"
                                class="form-control   @error('email')
                            is-invalid
                            @enderror">
                            @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" name="address" placeholder="Enter address"
                                value="{{ old('address', $setting->address) }}"
                                class="form-control   @error('address')
                            is-invalid
                            @enderror">
                            @error('address')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="form-label">Facebook</label>
                            <input type="text" name="facebook" placeholder="Enter facebook link"
                                value="{{ old('facebook', $setting->facebook) }}"
                                class="form-control   @error('facebook')
                            is-invalid
                            @enderror">
                            @error('facebook')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="form-label">Twitter</label>
                            <input type="text" name="twitter" placeholder="Enter twitter link"
                                value="{{ old('twitter', $setting->twitter) }}"
                                class="form-control   @error('twitter')
                            is-invalid
                            @enderror">
                            @error('twitter')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label for="" class="form-label">Youtube</label>
                            <input type="text" name="youtube" placeholder="Enter youtube link"
                                value="{{ old('youtube', $setting->youtube) }}"
                                class="form-control   @error('youtube')
                            is-invalid
                            @enderror">
                            @error('youtube')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Linkedin</label>
                            <input type="text" name="linkedin" placeholder="Enter linkedin link"
                                value="{{ old('linkedin', $setting->linkedin) }}"
                                class="form-control   @error('linkedin')
                            is-invalid
                            @enderror">
                            @error('linkedin')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Instagram</label>
                            <input type="text" name="instagram" placeholder="Enter instagram link"
                                value="{{ old('instagram', $setting->instagram) }}"
                                class="form-control   @error('instagram')
                            is-invalid
                            @enderror">
                            @error('instagram')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Copyright</label>
                            <input type="text" name="copyright" placeholder="Enter copyright information"
                                value="{{ old('copyright', $setting->copyright) }}"
                                class="form-control   @error('copyright')
                            is-invalid
                            @enderror">
                            @error('copyright')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Logo</label>
                            <input type="file" name="logo"
                                data-default-file="{{ asset('uploads/setting') }}/{{ $setting->logo }}"
                                class="form-control dropify  @error('logo')
                            is-invalid
                            @enderror">
                            @error('logo')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Favicon</label>
                            <input type="file" name="favicon"
                                data-default-file="{{ asset('uploads/setting') }}/{{ $setting->favicon }}"
                                class="form-control dropify  @error('favicon')
                            is-invalid
                            @enderror">
                            @error('favicon')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Banner</label>
                            <input type="file" name="banner"
                                data-default-file="{{ asset('uploads/setting') }}/{{ $setting->banner }}"
                                class="form-control dropify  @error('banner')
                            is-invalid
                            @enderror">
                            @error('banner')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endpush
