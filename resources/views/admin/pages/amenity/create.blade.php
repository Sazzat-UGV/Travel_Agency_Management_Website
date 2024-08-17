@extends('admin.layout.master')
@section('title')
    Add New Amenity
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'Amenities',
        'sub_page' => 'Add New Amenity',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('amenity.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Amenities
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('amenity.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('name')
                            is-invalid
                            @enderror"
                                    id="name" placeholder="Enter amenity name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
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
@endpush
