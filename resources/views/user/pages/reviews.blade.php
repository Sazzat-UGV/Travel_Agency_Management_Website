@extends('user.layout.master')
@section('title')
    Reviews
@endsection
@push('user_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
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
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content" id="pills-tab2Content">
                <div class="tab-pane fade show active" id="tour" role="tabpanel" aria-labelledby="tour-tab">
                    <div class="recent-listing-area">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="recent-listing-table">
                                    <table class="table table-striped" id="example">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Package</th>
                                                <th>Rating</th>
                                                <th>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reviews as $index => $review)
                                                <tr>
                                                    <th>
                                                        {{ $index + 1 }}
                                                    </th>
                                                    <td>
                                                        <img src="{{ asset('uploads/package/' . $review->package->featured_photo) }}"
                                                            alt="Package Image" style="width: 100px; height: auto;">
                                                        <!-- Adjust width as needed -->
                                                    </td>
                                                    <td>
                                                        {{ $review->package->name }}<br>
                                                        <a href="{{ route('package', $review->package->slug) }}"
                                                            target="blank">See Details</a>

                                                    </td>
                                                    <td>
                                                        <ul class="review-item-list">
                                                            <li>
                                                                <ul class="star-list d-flex">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($i <= $review->rating)
                                                                            <li><i class="bi bi-star-fill"></i></li>
                                                                        @else
                                                                            <li><i class="bi bi-star"></i></li>
                                                                        @endif
                                                                    @endfor
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        {{ $review->comment }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                pagingType: 'first_last_numbers',
            });
        });
    </script>
@endpush
