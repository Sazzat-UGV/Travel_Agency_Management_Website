@extends('admin.layout.master')
@section('title')
    Package Amenity
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .dataTables_length {
            padding: 20px 0;
        }
    </style>
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'Packages',
        'sub_page' => 'Package Amenity',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <a href="{{ route('package.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-backward"></i>
                    Back to Packages
                </a>
                <h5>Amenity of {{ $package->name }}</h5>
            </div>
        </div>
    </div>
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Amenity</th>
                                <th>Type</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($package_amenities as $index => $item)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>
                                        {{ $item->amenity->name }}
                                    </td>
                                    <td>
                                        @if ($item->type == 'Include')
                                            <span class="badge bg-success"> {{ $item->type }}</span>
                                        @else
                                            <span class="badge bg-danger"> {{ $item->type }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <form action="{{ route('admin.package_amenity_delete', $item->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="show_confirm btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.package_amenity_submit', $package->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Amenity<span
                                    class="text-danger">*</span></label>
                            <select name="amenity"
                                class="form-select js-example-basic-single @error('amenity')
                                is-invalid
                                @enderror">
                                @foreach ($amenities as $amenity)
                                    <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                @endforeach
                            </select>
                            @error('amenity')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Type<span
                                    class="text-danger">*</span></label>
                            <select name="type"
                                class="form-select  @error('type')
                                is-invalid
                                @enderror">
                                <option value="Include">Include</option>
                                <option value="Exclude">Exclude</option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save</button>

                    </form>
                </div>
            </div>
        </div>
@endsection
@push('admin_script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#example').DataTable({
                pagingType: 'first_last_numbers',
            });

            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });


            $('.show_confirm').click(function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest('form').submit();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endpush
