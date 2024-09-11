@extends('admin.layout.master')
@section('title')
    User Create
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'Users',
        'sub_page' => 'User Create',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('admin.users') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Users
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.userCreateSubmit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('name')
                            is-invalid
                            @enderror"
                                    id="name" placeholder="Enter user name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="email">Email<span class="text-danger">*</span></label>
                                <input type="email"
                                    class="form-control @error('email')
                            is-invalid
                            @enderror"
                                    id="email" placeholder="Enter user email" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="phone">Phone<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('phone')
                            is-invalid
                            @enderror"
                                    id="phone" placeholder="Enter user phone" name="phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="country">Country<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('country')
                            is-invalid
                            @enderror"
                                    id="country" placeholder="Enter user country" name="country"
                                    value="{{ old('country') }}">
                                @error('country')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="mb-3">
                                <label class="form-label" for="address">Address<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('address')
                            is-invalid
                            @enderror"
                                    id="address" placeholder="Enter user address" name="address"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label" for="zip">Zip<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('zip')
                            is-invalid
                            @enderror"
                                    id="zip" placeholder="Enter user zip" name="zip" value="{{ old('zip') }}">
                                @error('zip')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="state">State<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('state')
                            is-invalid
                            @enderror"
                                    id="state" placeholder="Enter user state" name="state"
                                    value="{{ old('state') }}">
                                @error('state')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="city">City<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('city')
                            is-invalid
                            @enderror"
                                    id="city" placeholder="Enter user city" name="city"
                                    value="{{ old('city') }}">
                                @error('city')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="password">Password<span
                                        class="text-danger">*</span></label>
                                <input type="password"
                                    class="form-control @error('password')
                            is-invalid
                            @enderror"
                                    id="password" placeholder="Enter user password" name="password"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" id="status"
                                    class="form-select @error('status')
                                    is-invalid
                                    @enderror">
                                    <option value="1">
                                        Active</option>
                                    <option value="0">
                                        Inactive</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>





                        <div class="col-12">
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Photo<span
                                        class="text-danger">*</span></label>
                                <input type="file"
                                    class="form-control dropify @error('photo')
                                    is-invalid
                                @enderror"
                                    id="defaultFormControlInput" name="photo"
                                    aria-describedby="defaultFormControlHelp">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                <span class="text-danger fs-tiny">Upload JPG, PNG, JPEG. Not more than 10 MB</span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save</button>

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
