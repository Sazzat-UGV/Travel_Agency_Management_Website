@extends('user.layout.master')
@section('title')
    Invoice
@endsection
@push('user_style')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/invoice') }}/fonts/font-awesome/css/font-awesome.min.css">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/favicon/favicon.ico') }}" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/invoice') }}/css/style.css">
    <style>
        @media print {

            header,
            .footer,
            .navbar,
            .topbar,
            .breadcrumb {
                display: none !important;
            }
        }
    </style>
@endpush
@section('content')
    <div class="invoice-1 invoice-content">
        <div class="invoice-inner clearfix">
            <div class="invoice-info clearfix" id="invoice_wrapper">
                <div class="invoice-headar">
                    <div class="row g-0">
                        <div class="col-sm-6">
                            <div class="invoice-logo">
                                <!-- logo started -->
                                @php
                                    $setting = App\Models\Setting::where('id', 1)->first();
                                @endphp
                                <div class="logo">
                                    @if ($setting->logo == 'default_logo.png')
                                        <img src="{{ asset('uploads/setting/default_logo.png') }}" class="h-25 w-auto"
                                            alt="logo">
                                    @else
                                        <img src="{{ asset('uploads/setting') }}/{{ $setting->logo }}" alt="logo">
                                    @endif
                                </div>
                                <!-- logo ended -->
                            </div>
                        </div>
                        <div class="col-sm-6 invoice-id">
                            <div class="info">
                                <h1 class="color-white inv-header-1">Invoice</h1>
                                <p class="color-white mb-1">Invoice Number <span>#{{ $invoice->invoice_no }}</span></p>
                                <p class="color-white mb-0">Invoice Date <span>{{ date('d m Y') }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-top">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="invoice-number mb-30">
                                <h4 class="inv-title-1">Invoice To</h4>
                                <h2 class="name mb-10">{{ Auth::user()->name }}</h2>
                                <p class="invo-addr-1">
                                    {{ Auth::user()->address }}<br />
                                    {{ Auth::user()->email }}<br />
                                    {{ Auth::user()->phone }} <br />
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="invoice-number mb-30">
                                <div class="invoice-number-inner">
                                    <h4 class="inv-title-1">Invoice From</h4>
                                    <h2 class="name mb-10">{{ $admin->name }}</h2>
                                    <p class="invo-addr-1">
                                        {{ $admin->email }}<br />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-center">
                    <div class="table-responsive">
                        <table class="table mb-0 table-striped invoice-table">
                            <thead class="bg-active">
                                <tr class="tr">
                                    <th>No.</th>
                                    <th class="pl0 text-start">Tour Information</th>
                                    <th class="pl0 text-start">Package Information</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Persons</th>
                                    <th class="text-end">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr">
                                    <td>
                                        <div class="item-desc-1">
                                            <span>01</span>
                                        </div>
                                    </td>
                                    <td class="pl0">
                                        <strong>Start Date:</strong>
                                        {{ date('d m Y', strtotime($invoice->tour->tour_start_date)) }}</br>
                                        <strong>End Date:</strong>
                                        {{ date('d m Y', strtotime($invoice->tour->tour_end_date)) }}</br>
                                    </td>
                                    <td class="pl0">{{ $invoice->package->name }}</td>
                                    <td class="text-center">{{ $invoice->package->price }}</td>
                                    <td class="text-end">{{ $invoice->total_person }}</td>
                                    <td class="text-end">${{ $invoice->paid_amount }}</td>
                                </tr>
                                <tr class="tr2">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center f-w-600 active-color">Grand Total</td>
                                    <td class="f-w-600 text-end active-color">${{ $invoice->paid_amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="invoice-bottom">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-7">
                            <div class="mb-30 dear-client">
                                <h3 class="inv-title-1">Terms & Conditions</h3>
                                <p>Once order done, money can't refund. </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-5">
                            <div class="mb-30 payment-method">
                                <h3 class="inv-title-1">Booking Details</h3>
                                <ul class="payment-method-list-1 text-14">
                                    <li><strong>Payment Method:</strong> {{ $invoice->payment_method }}</li>
                                    <li><strong>Payment Status:</strong>
                                        @if ($invoice->payment_status == 'Completed')
                                            <span class="badge rounded-pill bg-success">Completed</span>
                                        @else
                                            <span class="badge rounded-pill bg-warning">Pending</span>
                                        @endif
                                    </li>
                                    <li><strong>Booking Date:</strong> {{ $invoice->created_at->format('d m Y') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-contact clearfix">
                    <div class="row g-0">
                        <div class="col-lg-10 col-md-11 col-sm-12">
                            <div class="contact-info">
                                <a href="tel:{{ $setting->phone }}"><i class="fa fa-phone"></i> {{ $setting->phone }}</a>
                                <a href="mailto:{{ $setting->email }}"><i class="fa fa-envelope"></i>
                                    {{ $setting->email }}</a>
                                <a href="javascript:void(0)" class="mr-0 d-none-580"><i class="fa fa-map-marker"></i>
                                    {{ $setting->address }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-btn-section clearfix d-print-none">
                        <a href="javascript:window.print()" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i> Print Invoice
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('user_script')
    <script src="{{ asset('assets/invoice') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets/invoice') }}/js/jspdf.min.js"></script>
    <script src="{{ asset('assets/invoice') }}/js/html2canvas.js"></script>
    <script src="{{ asset('assets/invoice') }}/js/app.js"></script>
@endpush
