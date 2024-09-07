@extends('admin.layout.master')
@section('title')
Send Email
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'Subscribers',
        'sub_page' => 'Send Email to all',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('admin.subscribers') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Subscribers
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.subscriber_send_email_submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="subject">Subject<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('subject')
                            is-invalid
                            @enderror"
                                    id="subject" placeholder="Enter subject" name="subject"
                                    value="{{ old('subject') }}">
                                @error('subject')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="text">Message<span class="text-danger">*</span></label>
                                <textarea name="message" id="" cols="30" rows="4"
                                    class="form-control @error('message')
                                is-invalid
                                @enderror"
                                    placeholder="Enter message" id="text">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('admin_script')
@endpush
