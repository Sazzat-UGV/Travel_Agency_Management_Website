@extends('admin.layout.master')
@section('title')
    Add New Slider
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
    @include('admin.layout.inc.breadcumb', ['main_page' => 'Sliders', 'sub_page' => 'Add New Slider'])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('slider.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Sliders
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="heading">Heading<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('heading')
                            is-invalid
                            @enderror"
                                    id="heading" placeholder="Enter slider heading" name="heading"
                                    value="{{ old('heading') }}">
                                @error('heading')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="text">Text<span class="text-danger">*</span></label>
                                <textarea name="text" id="" cols="30" rows="4"
                                    class="form-control @error('text')
                                is-invalid
                                @enderror"
                                    placeholder="Enter slider text" id="text">{{ old('text') }}</textarea>
                                @error('text')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="button name">Button Name</label>
                                <input type="text"
                                    class="form-control @error('button name')
                            is-invalid
                            @enderror"
                                    id="button name" placeholder="Enter slider button name" name="button_name"
                                    value="{{ old('button_name') }}">
                                @error('button name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="button_link">Button Link</label>
                                <input type="text"
                                    class="form-control @error('button_link')
                            is-invalid
                            @enderror"
                                    id="button_link" placeholder="Enter slider button link" name="button_link"
                                    value="{{ old('button_link') }}">
                                @error('button_link')
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
