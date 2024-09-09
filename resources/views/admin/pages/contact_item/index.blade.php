@extends('admin.layout.master')
@section('title')
    Contact Page Item
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', ['main_page' => 'Contact Page Item', 'sub_page' => ''])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('admin.contactItemUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="map_code">Map Code<span class="text-danger">*</span></label>
                                <textarea name="map_code" id="" cols="30" rows="10"
                                    class="form-control  @error('map_code')
                                    is-invalid
                                    @enderror">{{ $contact_item->map_code }}</textarea> @error('map_code')
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
