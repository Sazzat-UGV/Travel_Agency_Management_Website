@extends('admin.layout.master')
@section('title')
    Home Page Item
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', ['main_page' => 'Home Page Item', 'sub_page' => ''])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('admin.homeItemUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h4>Destination Section</h4>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="destination_heading">Destination Heading<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('destination_heading')
                                    is-invalid
                                    @enderror"
                                    id="destination_heading" placeholder="Enter destination heading"
                                    name="destination_heading"
                                    value="{{ old('destination_heading', $home_item->destination_heading) }}">
                                @error('destination_heading')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="destination_subheading">Destination Subheading<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('destination_subheading')
                                    is-invalid
                                    @enderror"
                                    id="destination_subheading" placeholder="Enter destination subheading"
                                    name="destination_subheading"
                                    value="{{ old('destination_subheading', $home_item->destination_subheading) }}">
                                @error('destination_subheading')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="destination_status">Destination Status</label>
                                <select name="destination_status" id="destination_status"
                                    class="form-select @error('destination_status')
                            is-invalid
                            @enderror">
                                    <option value="Active"
                                        {{ $home_item->destination_status == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive"
                                        {{ $home_item->destination_status == 'Inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('destination_status')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4>Feature Section</h4>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="feature_heading">Feature Heading<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('feature_heading')
                                    is-invalid
                                    @enderror"
                                    id="feature_heading" placeholder="Enter feature heading" name="feature_heading"
                                    value="{{ old('feature_heading', $home_item->feature_heading) }}">
                                @error('feature_heading')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="feature_subheading">Feature Subheading<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('feature_subheading')
                                    is-invalid
                                    @enderror"
                                    id="feature_subheading" placeholder="Enter feature subheading" name="feature_subheading"
                                    value="{{ old('feature_subheading', $home_item->feature_subheading) }}">
                                @error('feature_subheading')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="feature_status">Feature Status</label>
                                <select name="feature_status" id="feature_status"
                                    class="form-select @error('feature_status')
                                    is-invalid
                                    @enderror">
                                    <option value="Active" {{ $home_item->feature_status == 'Active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="Inactive"
                                        {{ $home_item->feature_status == 'Inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('feature_status')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4>Package Section</h4>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="package_heading">Package Heading<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('package_heading')
                                    is-invalid
                                    @enderror"
                                    id="package_heading" placeholder="Enter package heading" name="package_heading"
                                    value="{{ old('package_heading', $home_item->package_heading) }}">
                                @error('package_heading')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="package_subheading">Package Subheading<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('package_subheading')
                                    is-invalid
                                    @enderror"
                                    id="package_subheading" placeholder="Enter package subheading"
                                    name="package_subheading"
                                    value="{{ old('package_subheading', $home_item->package_subheading) }}">
                                @error('package_subheading')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="package_status">Package Status</label>
                                <select name="package_status" id="package_status"
                                    class="form-select @error('package_status')
                            is-invalid
                            @enderror">
                                    <option value="Active" {{ $home_item->package_status == 'Active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="Inactive"
                                        {{ $home_item->package_status == 'Inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('package_status')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4>Testimonial Section</h4>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="testimonial_heading">Testimonial Heading<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('testimonial_heading')
                                    is-invalid
                                    @enderror"
                                    id="testimonial_heading" placeholder="Enter testimonial heading"
                                    name="testimonial_heading"
                                    value="{{ old('testimonial_heading', $home_item->testimonial_heading) }}">
                                @error('testimonial_heading')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="testimonial_subheading">Testimonial Subheading<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('testimonial_subheading')
                                    is-invalid
                                    @enderror"
                                    id="testimonial_subheading" placeholder="Enter testimonial subheading"
                                    name="testimonial_subheading"
                                    value="{{ old('testimonial_subheading', $home_item->testimonial_subheading) }}">
                                @error('testimonial_subheading')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="testimonial_status">Testimonial Status</label>
                                <select name="testimonial_status" id="testimonial_status"
                                    class="form-select @error('testimonial_status')
                            is-invalid
                            @enderror">
                                    <option value="Active"
                                        {{ $home_item->testimonial_status == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive"
                                        {{ $home_item->testimonial_status == 'Inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('testimonial_status')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4>Blog Section</h4>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="blog_heading">Blog Heading<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('blog_heading')
                                    is-invalid
                                    @enderror"
                                    id="blog_heading" placeholder="Enter blog heading" name="blog_heading"
                                    value="{{ old('blog_heading', $home_item->blog_heading) }}">
                                @error('blog_heading')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="blog_subheading">Blog Subheading<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('blog_subheading')
                                    is-invalid
                                    @enderror"
                                    id="blog_subheading" placeholder="Enter blog subheading" name="blog_subheading"
                                    value="{{ old('blog_subheading', $home_item->blog_subheading) }}">
                                @error('blog_subheading')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="blog_status">Blog Status</label>
                                <select name="blog_status" id="blog_status"
                                    class="form-select @error('blog_status')
                            is-invalid
                            @enderror">
                                    <option value="Active" {{ $home_item->blog_status == 'Active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="Inactive"
                                        {{ $home_item->blog_status == 'Inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('blog_status')
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
