@extends('admin.layout.master')
@section('title')
    Booking Information
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
        'main_page' => 'Tour',
        'sub_page' => 'Booking Information',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <a href="{{ route('tour.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-backward"></i>
                    Back to Tours
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive text-nowrap my-2">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Invoice No</th>
                                <th>User Info</th>
                                <th class="wrap">Total Persons</th>
                                <th class="wrap">Paid Amount</th>
                                <th class="wrap">Payment Method</th>
                                <th class="wrap">Payment Status</th>
                                <th class="wrap">Invoice</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_booking as $index => $booking)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td class="">{{ $booking->invoice_no }}</td>
                                    <td class="">
                                        <strong>Name: </strong>{{ $booking->user->name }} <br>
                                        <strong>Email: </strong>{{ $booking->user->email }}<br>
                                        <strong>Phone: </strong>{{ $booking->user->phone }}
                                    </td>
                                    <td class="">{{ $booking->total_person }}</td>
                                    <td class="">{{ $booking->paid_amount }}</td>
                                    <td class="">{{ $booking->payment_method }}</td>
                                    <td class="">
                                        @if ($booking->payment_status == 'Completed')
                                            <span class="badge rounded-pill bg-success">Completed</span>
                                        @else
                                            <span class="badge rounded-pill bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td class="wrap">
                                        <a href="{{ route('admin.tour_invoice', $booking->invoice_no) }}"
                                            class="btn badge rounded-pill btn-outline-primary" target="blank">Show
                                            Invoice</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.tour_booking_delete', $booking->id) }}"
                                            method="POST">
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
