@extends('admin.layout.master')
@section('title')
    About Page Item
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', ['main_page' => 'About Page Item', 'sub_page' => ''])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('admin.aboutItemUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="feature_status">Feature Status</label>
                                <select name="feature_status" id="feature_status"
                                    class="form-select @error('feature_status')
                                    is-invalid
                                    @enderror">
                                    <option value="Active" {{ $about_item->feature_status == 'Active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="Inactive"
                                        {{ $about_item->feature_status == 'Inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('feature_status')
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
