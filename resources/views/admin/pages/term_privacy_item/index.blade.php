@extends('admin.layout.master')
@section('title')
    Term and Privacy Item
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@section('content')
@include('admin.layout.inc.breadcumb', ['main_page' => 'Term and Privacy Item', 'sub_page' => ''])
<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.termPrivacyItemUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="term">Terms of Use</label>
                            <textarea name="term" id="term" cols="30" rows="10"
                                class="form-control  @error('term')
                                is-invalid
                                @enderror">{{ $term_privacy_item->term }}</textarea> @error('term')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="privacy">Privacy Policy</label>
                            <textarea name="privacy" id="privacy" cols="30" rows="10"
                                class="form-control  @error('privacy')
                                is-invalid
                                @enderror">{{ $term_privacy_item->privacy }}</textarea> @error('privacy')
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
            .create(document.querySelector('#term'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#privacy'))
            .catch(error => {
                console.error(error);
            });
        $('.dropify').dropify();
    </script>
@endpush
