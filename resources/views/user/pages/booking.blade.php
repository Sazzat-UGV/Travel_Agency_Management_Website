@extends('user.layout.master')
@section('title')
    Dashboard
@endsection
@push('user_style')
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content" id="pills-tab2Content">
                <div class="tab-pane fade show active" id="tour" role="tabpanel" aria-labelledby="tour-tab">
                    <div class="recent-listing-area">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="recent-listing-table">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Invoice No</th>
                                                <th>Total Persons</th>
                                                <th>Paid Amount</th>
                                                <th>Payment Method</th>
                                                <th>Payment Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_booking as $index => $booking)
                                                <tr>
                                                    <th>
                                                        {{ $index + 1 }}
                                                    </th>
                                                    <td>
                                                        {{ $booking->invoice_no }}
                                                    </td>
                                                    <td>
                                                        {{ $booking->total_person }}
                                                    </td>
                                                    <td>
                                                        ${{ $booking->paid_amount }}
                                                    </td>
                                                    <td>
                                                        {{ $booking->payment_method }}
                                                    </td>
                                                    <td>
                                                        @if ($booking->payment_status == 'Completed')
                                                            <span class="badge rounded-pill bg-success">Completed</span>
                                                        @else
                                                            <span class="badge rounded-pill bg-warning">Pending</span>
                                                        @endif
                                                    </td>

                                                    <td class="align-items-center text-center">
                                                        <button class="btn btn-secondary btn-sm mb-1 px-3"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal-{{ $index }}">Details</button>
                                                        <br>
                                                        <a href="{{ route('user_invoice',$booking->invoice_no) }}" class="btn btn-secondary btn-sm px-3">Invoice</a>
                                                    </td>
                                                </tr>

                                                <!--details modal -->
                                                <div class="modal fade" id="exampleModal-{{ $index }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Details
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <strong>Invoice No:</strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            {{ $booking->invoice_no }}
                                                                        </div>
                                                                        <hr>
                                                                        <div class="col-3">
                                                                            <strong>Package Detail:</strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <strong>Name:</strong>
                                                                            {{ $booking->package->name }}<br>
                                                                            <a href="{{ route('package', $booking->package->slug) }}"
                                                                                target="_blank">Show Detail</a>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="col-3">
                                                                            <strong>Tour Detail:</strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <strong>Start Date:</strong>
                                                                            {{ date('d m Y', strtotime($booking->tour->tour_start_date)) }}</br>
                                                                            <strong>End Date:</strong>
                                                                            {{ date('d m Y', strtotime($booking->tour->tour_end_date)) }}</br>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="col-3">
                                                                            <strong>Total Persons:</strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            {{ $booking->total_person }}
                                                                        </div>
                                                                        <hr>
                                                                        <div class="col-3">
                                                                            <strong>Paid Amount:</strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            ${{ $booking->paid_amount }}
                                                                        </div>
                                                                        <hr>
                                                                        <div class="col-3">
                                                                            <strong>Payment Method:</strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            {{ $booking->payment_method }}
                                                                        </div>
                                                                        <hr>
                                                                        <div class="col-3">
                                                                            <strong>Payment Status:</strong>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            @if ($booking->payment_status == 'Completed')
                                                                                <span
                                                                                    class="badge rounded-pill bg-success">Completed</span>
                                                                            @else
                                                                                <span
                                                                                    class="badge rounded-pill bg-warning">Pending</span>
                                                                            @endif
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                </div>
                                @endforeach
                                </tbody>
                                </table>
                                <div class="pagination-area">
                                    <ul class="paginations">
                                        <li class="page-item active">
                                            <a href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#">3</a>
                                        </li>
                                    </ul>
                                    <ul class="paginations-buttons">
                                        <li>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="14"
                                                    viewBox="0 0 7 14">
                                                    <path d="M0 7.00008L7 0L2.54545 7.00008L7 14L0 7.00008Z"></path>
                                                </svg>
                                                Prev
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Next
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="14"
                                                    viewBox="0 0 7 14" fill="none">
                                                    <path d="M7 7.00008L0 0L4.45455 7.00008L0 14L7 7.00008Z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
@push('user_script')
@endpush
