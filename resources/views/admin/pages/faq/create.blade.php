@extends('admin.layout.master')
@section('title')
    Add New FAQ
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'FAQ',
        'sub_page' => 'Add New FAQ',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('faq.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to FAQs
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="question">Question<span class="text-danger">*</span></label>
                                <input type="text"
                                    class="form-control @error('question')
                            is-invalid
                            @enderror"
                                    id="question" placeholder="Enter question" name="question"
                                    value="{{ old('question') }}">
                                @error('question')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="answer">Answer<span class="text-danger">*</span></label>
                                <textarea name="answer" cols="30" rows="4"
                                    class="form-control @error('answer')
                        is-invalid
                        @enderror"
                                    placeholder="Enter answer">{{ old('answer') }}</textarea>
                                @error('answer')
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
