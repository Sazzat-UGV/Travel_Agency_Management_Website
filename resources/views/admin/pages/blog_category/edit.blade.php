@extends('admin.layout.master')
@section('title')
    Edit Category
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'Blog Categories',
        'sub_page' => 'Edit Category',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('blog_category.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Categories
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('blog_category.update', $blog_category) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('name')
                            is-invalid
                            @enderror"
                                    id="name" placeholder="Enter blog category name" name="name"
                                    value="{{ old('name', $blog_category->name) }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
@endpush
