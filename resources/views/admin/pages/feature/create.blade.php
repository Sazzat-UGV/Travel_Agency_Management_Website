@extends('admin.layout.master')
@section('title')
    Add New Feature
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@section('content')
@include('admin.layout.inc.breadcumb', ['main_page' => 'Features', 'sub_page' => 'Add New Feature'])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('feature.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Features
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('feature.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="icon">Icon<Strong> (Font Awesome Icon)</Strong><span
                                class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control @error('icon')
                            is-invalid
                            @enderror"
                            id="icon" placeholder="Enter feature icon" name="icon" value="{{ old('icon') }}">
                        @error('icon')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="heading">Heading<span class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control @error('heading')
                            is-invalid
                            @enderror"
                            id="heading" placeholder="Enter feature heading" name="heading" value="{{ old('heading') }}">
                        @error('heading')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Description<span class="text-danger">*</span></label>
                        <textarea name="description" id="" cols="30" rows="3"
                            class="form-control @error('description')
                        is-invalid
                        @enderror"
                            placeholder="Enter feature description" id="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save</button>

                </form>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
@endpush
