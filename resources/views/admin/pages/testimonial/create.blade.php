@extends('admin.layout.master')
@section('title')
    Add New Testimonial
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
        'main_page' => 'Testimonials',
        'sub_page' => 'Add New Testimonial',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('testimonial.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Testimonials
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('name')
                            is-invalid
                            @enderror"
                                    id="name" placeholder="Enter testimonial name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="location">Location<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('location')
                            is-invalid
                            @enderror"
                                    id="location" placeholder="Enter testimonial location" name="location"
                                    value="{{ old('location') }}">
                                @error('location')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="comment">Comment<span class="text-danger">*</span></label>
                                <textarea name="comment" id="" cols="30" rows="3"
                                    class="form-control @error('comment')
                        is-invalid
                        @enderror"
                                    placeholder="Enter testimonial comment" id="comment">{{ old('comment') }}</textarea>
                                @error('comment')
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
                                    id="defaultFormControlInput" name="photo" aria-describedby="defaultFormControlHelp">
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
