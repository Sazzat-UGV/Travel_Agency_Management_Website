@extends('admin.layout.master')
@section('title')
    Edit Blog
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
        'main_page' => 'Blogs',
        'sub_page' => 'Edit Blog',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('blog.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Blogs
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('blog.update', $blog) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('title')
                            is-invalid
                            @enderror"
                                    id="title" placeholder="Enter blog title" name="title"
                                    value="{{ old('title', $blog->title) }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="category">Select Category<span
                                        class="text-danger">*</span></label>
                                <select
                                    class="form-select @error('category')
                                is-invalid
                                @enderror"
                                    id="category" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == $blog->blog_category_id) selected
                                            @elseif (old('category') == $category->id)
                                            selected @endif>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="short_description">Short Description<span
                                        class="text-danger">*</span></label>
                                <textarea name="short_description" id="" cols="30" rows="3"
                                    class="form-control @error('short_description')
                        is-invalid
                        @enderror"
                                    placeholder="Enter short description" id="short_description">{{ old('short_description', $blog->short_description) }}</textarea>
                                @error('short_description')
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
                                    placeholder="Enter description" id="editor">{{ old('description', $blog->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">

                            <div>
                                <label for="defaultFormControlInput" class="form-label">Photo<span
                                        class="text-danger">*</span></label>
                                <input type="file" data-default-file="{{ asset('uploads/blog') }}/{{ $blog->photo }}"
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
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        $('.dropify').dropify();
    </script>
@endpush
