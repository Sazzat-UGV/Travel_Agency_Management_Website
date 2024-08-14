@extends('admin.layout.master')
@section('title')
    Add New Team Member
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
        'main_page' => 'Team Member',
        'sub_page' => 'Add New Team Member',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('team_member.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Team Member
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('team_member.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('name')
                            is-invalid
                            @enderror"
                                    id="name" placeholder="Enter team member name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="slug">Slug<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('slug')
                            is-invalid
                            @enderror"
                                    id="slug" placeholder="Enter team member slug" name="slug"
                                    value="{{ old('slug') }}">
                                @error('slug')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="designation">Designation<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('designation')
                            is-invalid
                            @enderror"
                                    id="designation" placeholder="Enter team member designation" name="designation"
                                    value="{{ old('designation') }}">
                                @error('designation')
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
                                    id="email" placeholder="Enter team member email" name="email"
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
                                    id="phone" placeholder="Enter team member phone" name="phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="address">Address<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('address')
                                is-invalid
                                @enderror"
                                    id="address" placeholder="Enter team member address" name="address"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="biography">Biography</label>
                                <textarea name="biography" cols="30" rows="4"
                                    class="form-control @error('biography')
                        is-invalid
                        @enderror"
                                    placeholder="Enter team member biography" id="editor">{{ old('biography') }}</textarea>
                                @error('biography')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="facebook">Facebook <strong><i
                                            class="fa-brands fa-facebook"></i></strong></label>
                                <input type="text"
                                    class="form-control @error('facebook')
                                    is-invalid
                                    @enderror"
                                    id="facebook" placeholder="Enter facebook link" name="facebook"
                                    value="{{ old('facebook') }}">
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="twitter">Twitter <i
                                        class="fa-brands fa-twitter"></i></label>
                                <input type="text"
                                    class="form-control @error('twitter')
                                    is-invalid
                                    @enderror"
                                    id="twitter" placeholder="Enter twitter link" name="twitter"
                                    value="{{ old('twitter') }}">
                                @error('twitter')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="linkedin">Linkedin <i
                                        class="fa-brands fa-linkedin"></i></label>
                                <input type="text"
                                    class="form-control @error('linkedin')
                                    is-invalid
                                    @enderror"
                                    id="linkedin" placeholder="Enter linkedin link" name="linkedin"
                                    value="{{ old('linkedin') }}">
                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="instagram">Instagram <i
                                        class="fa-brands fa-instagram"></i></label>
                                <input type="text"
                                    class="form-control @error('instagram')
                                    is-invalid
                                    @enderror"
                                    id="instagram" placeholder="Enter instagram link" name="instagram"
                                    value="{{ old('instagram') }}">
                                @error('instagram')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>


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
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        $('.dropify').dropify();
    </script>
@endpush
