@extends('admin.layout.master')
@section('title')
    Edit Destination
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
        'main_page' => 'Destinations',
        'sub_page' => 'Edit Destination',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('destination.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Destinations
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('destination.update',$destination->id) }}" method="POST" enctype="multipart/form-data">
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
                                    id="name" placeholder="Enter destination name" name="name"
                                    value="{{ old('name',$destination->name) }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="country">Country</label>
                                <input type="text"
                                    class="form-control @error('country')
                            is-invalid
                            @enderror"
                                    id="country" placeholder="Enter destination country" name="country"
                                    value="{{ old('country',$destination->country) }}">
                                @error('country')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="language">Language</label>
                                <input type="text"
                                    class="form-control @error('language')
                            is-invalid
                            @enderror"
                                    id="language" placeholder="Enter destination language" name="language"
                                    value="{{ old('language',$destination->language) }}">
                                @error('language')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="currency">Currency</label>
                                <input type="text"
                                    class="form-control @error('currency')
                            is-invalid
                            @enderror"
                                    id="currency" placeholder="Enter destination currency" name="currency"
                                    value="{{ old('currency',$destination->currency) }}">
                                @error('currency')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="area">Area</label>
                                <input type="text"
                                    class="form-control @error('area')
                            is-invalid
                            @enderror"
                                    id="area" placeholder="Enter destination area" name="area"
                                    value="{{ old('area',$destination->area) }}">
                                @error('area')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="timezone">Timezone</label>
                                <input type="text"
                                    class="form-control @error('timezone')
                            is-invalid
                            @enderror"
                                    id="timezone" placeholder="Enter destination timezone" name="timezone"
                                    value="{{ old('timezone',$destination->timezone) }}">
                                @error('timezone')
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
                                    placeholder="Enter destination description" id="description">{{ old('description',$destination->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="visa_requirement">Visa Requirement</label>
                                <textarea name="visa_requirement" cols="30" rows="3"
                                    class="form-control @error('visa_requirement')
                        is-invalid
                        @enderror"
                                    placeholder="Enter destination visa requirement" id="visa_requirement">{{ old('visa_requirement',$destination->visa_requirement) }}</textarea>
                                @error('visa_requirement')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="activity">Activity</label>
                                <textarea name="activity" cols="30" rows="3"
                                    class="form-control @error('activity')
                        is-invalid
                        @enderror"
                                    placeholder="Enter destination activity" id="activity">{{ old('activity',$destination->activity) }}</textarea>
                                @error('activity')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="best_time">Best Time to Visit</label>
                                <textarea name="best_time" cols="30" rows="3"
                                    class="form-control @error('best_time')
                        is-invalid
                        @enderror"
                                    placeholder="Enter destination best time" id="best_time">{{ old('best_time',$destination->best_time) }}</textarea>
                                @error('best_time')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="health_safety">Health Safety</label>
                                <textarea name="health_safety" cols="30" rows="3"
                                    class="form-control @error('health_safety')
                        is-invalid
                        @enderror"
                                    placeholder="Enter destination health safety" id="health_safety">{{ old('health_safety',$destination->health_safety) }}</textarea>
                                @error('health_safety')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="map">Map (ifram Code)</label>
                                <textarea name="map" cols="30" rows="3" id="map"
                                    class="form-control @error('map')
                        is-invalid
                        @enderror"
                                    placeholder="Enter destination map">{{ old('map',$destination->map) }}</textarea>
                                @error('map')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">

                            <div>
                                <label for="defaultFormControlInput" class="form-label">Featured Photo</label>
                                <input type="file" data-default-file="{{ asset('uploads/destination') }}/{{ $destination->featured_photo }}"
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

                    <button type="submit" class="btn btn-warning mt-3">Update</button>

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
            .create(document.querySelector('#visa_requirement'))
            .catch(error => {
                console.error(error);
            });
        $('.dropify').dropify();
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#activity'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#best_time'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#health_safety'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
