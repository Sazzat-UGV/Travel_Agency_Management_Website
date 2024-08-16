@extends('admin.layout.master')
@section('title')
    Add New Package
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
        'main_page' => 'Packages',
        'sub_page' => 'Add New Package',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('package.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Packages
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('name')
                            is-invalid
                            @enderror"
                                    id="name" placeholder="Enter package name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="description">Description<span
                                        class="text-danger">*</span></label>
                                <textarea name="description" cols="30" rows="3"
                                    class="form-control @error('description')
                        is-invalid
                        @enderror"
                                    placeholder="Enter package description" id="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="price">Price<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('price')
                            is-invalid
                            @enderror"
                                    id="price" placeholder="Enter package price" name="price"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="old_price">Old Price</label>
                                <input type="text"
                                    class="form-control @error('old_price')
                            is-invalid
                            @enderror"
                                    id="old_price" placeholder="Enter package old price" name="old_price"
                                    value="{{ old('old_price') }}">
                                @error('old_price')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            <label class="form-label" for="destination">Select Destination<span
                                        class="text-danger">*</span></label>
                                <select
                                    class="form-select @error('destination')
                                is-invalid
                                @enderror"
                                    id="destination" name="destination">
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}"
                                            {{ old('destination') == $destination->id ? 'selected' : '' }}>{{ $destination->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('destination')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                        </div>
                       
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="map">Map (ifram Code)</label>
                                <textarea name="map" cols="30" rows="3"
                                    class="form-control @error('map')
                        is-invalid
                        @enderror"
                                    placeholder="Enter package map">{{ old('map') }}</textarea>
                                @error('map')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Featured Photo<span
                                        class="text-danger">*</span></label>
                                <input type="file"
                                    class="form-control dropify @error('featured_photo')
                            is-invalid
                        @enderror"
                                    id="defaultFormControlInput" name="featured_photo"
                                    aria-describedby="defaultFormControlHelp">
                                @error('featured_photo')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
        $('.dropify').dropify();
    </script>
@endpush
