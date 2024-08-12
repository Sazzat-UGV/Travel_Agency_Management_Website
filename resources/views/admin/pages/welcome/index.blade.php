@extends('admin.layout.master')
@section('title')
    Welcome Item
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

        .video-preview {
            text-align: center;
            margin-bottom: 20px;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #000;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endpush
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('admin.welcomeItemUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="heading">Heading<span class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control @error('heading')
                            is-invalid
                            @enderror"
                            id="heading" placeholder="Enter heading" name="heading"
                            value="{{ old('heading', $welcome_item->heading) }}">
                        @error('heading')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Description<span class="text-danger">*</span></label>
                        <textarea name="description" id="editor" cols="30" rows="3"
                            class="form-control @error('description')
                        is-invalid
                        @enderror"
                            placeholder="Enter description">
                            {{ old('description', $welcome_item->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="button name">Button Name</label>
                        <input type="text"
                            class="form-control @error('button name')
                            is-invalid
                            @enderror"
                            id="button name" placeholder="Enter button name" name="button_name"
                            value="{{ old('button_name', $welcome_item->button_name) }}">
                        @error('button name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="button_link">Button Link</label>
                        <input type="text"
                            class="form-control @error('button_link')
                            is-invalid
                            @enderror"
                            id="button_link" placeholder="Enter button link" name="button_link"
                            value="{{ old('button_link', $welcome_item->button_link) }}">
                        @error('button_link')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Photo<span
                                class="text-danger">*</span></label>
                        <input type="file"
                            class="form-control dropify @error('photo')
                            is-invalid
                        @enderror"
                            data-default-file="{{ asset('uploads/welcome_item') }}/{{ $welcome_item->photo }}"
                            id="defaultFormControlInput" name="photo" aria-describedby="defaultFormControlHelp">
                        @error('photo')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                        <span class="text-danger fs-tiny">Upload JPG, PNG, JPEG. Not more than 10 MB</span>
                    </div>

                    @if ($welcome_item->video)
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Existing Video</label>
                            <div class="video-preview">
                                <div class="video-container">
                                    <iframe width="100%" height="315"
                                        src="https://www.youtube.com/embed/{{ $welcome_item->video }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Video <strong class="text-bold">(Only
                                Youtube Video ID)</strong></label>
                        <input type="text"
                            class="form-control @error('video')
                            is-invalid
                            @enderror"
                            id="video" placeholder="Enter video id" name="video"
                            value="{{ old('video', $welcome_item->video) }}">
                        @error('video')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select name="status" id="status"
                            class="form-control @error('status')
                            is-invalid
                            @enderror">
                            <option value="Show" {{ $welcome_item->status == 'Show' ? 'selected' : '' }}>Show</option>
                            <option value="Hide" {{ $welcome_item->status == 'Hide' ? 'selected' : '' }}>Hide</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
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
