@extends('admin.layout.master')
@section('title')
    Edit Tour
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'Tour',
        'sub_page' => 'Edit Tour',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <a href="{{ route('tour.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-backward"></i>
                        Back to Tours
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('tour.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="package">Select Package<span
                                    class="text-danger">*</span></label>
                            <select
                                class="form-select @error('package')
                                is-invalid
                                @enderror"
                                id="package" name="package">
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}"
                                        @if ($package->id == $tour->package_id) selected
                                            @elseif (old('package') == $package->id)
                                            selected @endif>
                                        {{ $package->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('package')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="total_seat">Total Seat</label>
                                <input type="number"
                                    class="form-control @error('total_seat')
                            is-invalid
                            @enderror"
                                    id="total_seat" placeholder="Enter total seat" name="total_seat"
                                    value="{{ old('total_seat', $tour->total_seat) }}">
                                @error('total_seat')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="tour_start_date">Tour Start Date<span
                                        class="text-danger">*</span></label>
                                <input type="date"
                                    class="form-control @error('tour_start_date')
                            is-invalid
                            @enderror"
                                    id="tour_start_date" placeholder="Enter tour start date" name="tour_start_date"
                                    value="{{ old('tour_start_date', $tour->tour_start_date) }}">
                                @error('tour_start_date')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="tour_end_date">Tour End Date<span
                                        class="text-danger">*</span></label>
                                <input type="date"
                                    class="form-control @error('tour_end_date')
                            is-invalid
                            @enderror"
                                    id="tour_end_date" placeholder="Enter tour end date" name="tour_end_date"
                                    value="{{ old('tour_end_date', $tour->tour_end_date) }}">
                                @error('tour_end_date')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label" for="booking_end_date">Booking End Date<span
                                        class="text-danger">*</span></label>
                                <input type="date"
                                    class="form-control @error('booking_end_date')
                            is-invalid
                            @enderror"
                                    id="booking_end_date" placeholder="Enter booking end date" name="booking_end_date"
                                    value="{{ old('booking_end_date', $tour->booking_end_date) }}">
                                @error('booking_end_date')
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
