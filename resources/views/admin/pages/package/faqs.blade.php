@extends('admin.layout.master')
@section('title')
    Package Faq
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    .dataTables_length {
    padding: 20px 0;
    }
    </style>
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'Packages',
        'sub_page' => 'Package Faq',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <a href="{{ route('package.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-backward"></i>
                    Back to Packages
                </a>
                <h5>Faq of {{ $package->name }}</h5>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4>Existing Faqs</h4>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $index => $faq)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $faq->question }}</td>
                                <td>
                                    {{ $faq->answer }}
                                </td>
                                <td>
                                    <form action="{{ route('admin.package_faqs_delete', $faq->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="show_confirm btn btn-danger" type="submit"><i
                                            class="bx bx-trash "></i> </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-body">
                <h4>Add New Faq</h4>
                <form action="{{ route('admin.package_faqs_submit', $package->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Question<span
                                class="text-danger">*</span></label>
                        <input type="text"
                            class="form-control @error('question')
                            is-invalid
                            @enderror"
                            id="question" placeholder="Enter faq question" name="question" value="{{ old('question') }}">
                        @error('question')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="answer">Answer<span class="text-danger">*</span></label>
                        <textarea name="answer" cols="30" rows="3"
                            class="form-control @error('answer')
                    is-invalid
                    @enderror"
                            placeholder="Enter faq answer" id="answer">{{ old('answer') }}</textarea>
                        @error('answer')
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
    <script>
        $(document).ready(function() {

            $('#example').DataTable({
                pagingType: 'first_last_numbers',
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
