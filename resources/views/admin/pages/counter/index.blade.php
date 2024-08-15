@extends('admin.layout.master')
@section('title')
    Counter Item
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@section('content')
@include('admin.layout.inc.breadcumb',
['main_page'=>'Counter Item',
'sub_page'=>''])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('admin.counterItemUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="item1_name">Item 1 Name<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('item1_name')
                                    is-invalid
                                    @enderror"
                                    id="item1_name" placeholder="Enter item name" name="item1_name"
                                    value="{{ old('item1_name', $counter_item->item1_name) }}">
                                @error('item1_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="item1_number">Item 1 Number<span
                                        class="text-danger">*</span></label>
                                <input type="number"
                                    class="form-control @error('item1_number')
                                    is-invalid
                                    @enderror"
                                    id="item1_number" placeholder="Enter item number" name="item1_number"
                                    value="{{ old('item1_number', $counter_item->item1_number) }}">
                                @error('item1_number')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="item2_name">Item 2 Name<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('item2_name')
                                    is-invalid
                                    @enderror"
                                    id="item2_name" placeholder="Enter item name" name="item2_name"
                                    value="{{ old('item2_name', $counter_item->item2_name) }}">
                                @error('item2_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="item2_number">Item 2 Number<span
                                        class="text-danger">*</span></label>
                                <input type="number"
                                    class="form-control @error('item2_number')
                                    is-invalid
                                    @enderror"
                                    id="item2_number" placeholder="Enter item number" name="item2_number"
                                    value="{{ old('item2_number', $counter_item->item2_number) }}">
                                @error('item2_number')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="item3_name">Item 3 Name<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('item3_name')
                                    is-invalid
                                    @enderror"
                                    id="item3_name" placeholder="Enter item name" name="item3_name"
                                    value="{{ old('item3_name', $counter_item->item3_name) }}">
                                @error('item3_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="item3_number">Item 3 Number<span
                                        class="text-danger">*</span></label>
                                <input type="number"
                                    class="form-control @error('item3_number')
                                    is-invalid
                                    @enderror"
                                    id="item3_number" placeholder="Enter item number" name="item3_number"
                                    value="{{ old('item3_number', $counter_item->item3_number) }}">
                                @error('item3_number')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="item4_name">Item 4 Name<span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('item4_name')
                                    is-invalid
                                    @enderror"
                                    id="item4_name" placeholder="Enter item name" name="item4_name"
                                    value="{{ old('item4_name', $counter_item->item4_name) }}">
                                @error('item4_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="item4_number">Item 1 Number<span
                                        class="text-danger">*</span></label>
                                <input type="number"
                                    class="form-control @error('item4_number')
                                    is-invalid
                                    @enderror"
                                    id="item4_number" placeholder="Enter item number" name="item4_number"
                                    value="{{ old('item4_number', $counter_item->item4_number) }}">
                                @error('item4_number')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select name="status" id="status"
                            class="form-select @error('status')
                            is-invalid
                            @enderror">
                            <option value="Show" {{ $counter_item->status == 'Show' ? 'selected' : '' }}>Show</option>
                            <option value="Hide" {{ $counter_item->status == 'Hide' ? 'selected' : '' }}>Hide</option>
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
