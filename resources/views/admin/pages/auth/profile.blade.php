@extends('admin.layout.master')
@section('title')
    Profile
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
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('uploads/user/') }}/{{ Auth::guard('admin')->user()->photo }}" alt="Admin"
                        class="rounded-circle" width="150">
                    <div class="mt-3">
                        <h4>{{ Auth::guard('admin')->user()->name }}</h4>
                        <p class="text-secondary mb-1">{{ Auth::guard('admin')->user()->email }}</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Change Photo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Change Image</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.profile_image_submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Image<span
                                    class="text-danger">*</span></label>
                            <input type="file"
                                class="form-control dropify @error('photo')
                            is-invalid
                           @enderror"
                                id="defaultFormControlInput" name="photo"
                                data-default-file="{{ asset('uploads/user/') }}/{{ Auth::guard('admin')->user()->photo }}"
                                aria-describedby="defaultFormControlHelp">
                            @error('photo')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <span class="text-danger fs-tiny">Upload JPG, PNG. Not more than 10 MB</span>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('admin.profile_submit') }}" method="POST">
                    @csrf
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Name<span
                                class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control @error('name')
                        is-invalid
                       @enderror"
                            id="defaultFormControlInput" placeholder="Enter your name" name="name"
                            value="{{ old('name', Auth::guard('admin')->user()->name) }}"
                            aria-describedby="defaultFormControlHelp">
                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Email<span
                                class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control  @error('email')
                        is-invalid
                       @enderror"
                            value="{{ old('email', Auth::guard('admin')->user()->email) }}" id="defaultFormControlInput"
                            placeholder="Enter your email" name="email" aria-describedby="defaultFormControlHelp">
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Password</label>
                        <input type="password"
                            class="form-control  @error('password')
                        is-invalid
                       @enderror"
                            id="defaultFormControlInput" placeholder="Enter your password" name="password"
                            aria-describedby="defaultFormControlHelp">
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Retype
                            Password</label>
                        <input type="password"
                            class="form-control  @error('retype_password')
                        is-invalid
                       @enderror"
                            id="defaultFormControlInput" placeholder="Retype password" name="retype_password"
                            aria-describedby="defaultFormControlHelp">
                        @error('retype_password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </div>
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
