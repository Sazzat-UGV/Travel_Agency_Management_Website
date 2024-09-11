@extends('admin.layout.master')
@section('title')
    User List
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .dataTables_length {
            padding: 20px 0;
        }

        .wrap {
            white-space: normal !important;
            word-wrap: break-word;
        }
    </style>
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'Users',
        'sub_page' => 'User List',
    ])

    <div class="col-12">
        <div class="card px-4">
            <div class="col-md-12 col-lg-12 col-sm-12 py-4">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.userCreate') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i>
                        Add New User
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap my-2">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address Info</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>

                                <td class="wrap"><img src="{{ asset('uploads/user') }}/{{ $user->photo }}" alt=""
                                        style="height: 80px;width: auto;"></td>
                                <td class="wrap">{{ $user->name }}</td>
                                <td class="wrap">{{ $user->email }}</td>
                                <td class="wrap">{{ $user->phone }}</td>
                                <td class="">
                                    <h6 class="text-bolder d-inline">Country: </h6>{{ $user->country }}<br>
                                    <h6 class="text-bolder d-inline">Address: </h6>{{ $user->address }}<br>
                                    <h6 class="text-bolder d-inline">State: </h6>{{ $user->state }}<br>
                                    <h6 class="text-bolder d-inline">City: </h6>{{ $user->city }}<br>
                                    <h6 class="text-bolder d-inline">Zip: </h6>{{ $user->zip }}<br>
                                </td>
                                <td class="wrap">
                                    @if ($user->status == 1)
                                        <span class="badge bg-success">Acitve</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="wrap">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.userEdit', $user->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <form action="{{ route('admin.userDelete', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item show_confirm" type="submit"><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                let form = $(this).closest('form');
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
                        form.submit();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })

        });
    </script>
@endpush
