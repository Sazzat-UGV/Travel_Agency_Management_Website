@extends('admin.layout.master')
@section('title')
    Package Videos
@endsection
@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .dataTables_length {
            padding: 20px 0;
        }
    </style>
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'Packages',
        'sub_page' => 'Package Videos',
    ])
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <a href="{{ route('package.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-backward"></i>
                    Back to Packages
                </a>
                <h5>Videos of {{ $package->name }}</h5>
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
                            <th>Video</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $index => $video)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>
                                    <iframe width="200" height="100"
                                        src="https://www.youtube.com/embed/{{ $video->video }}" title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                    </iframe>
                                </td>
                                <td>
                                    <form action="{{ route('admin.package_videos_delete', $video->id) }}" method="POST">
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
                <form action="{{ route('admin.package_videos_submit', $package->id) }}" method="POST">
                    @csrf
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Video<span
                                class="text-danger">*</span></label>
                        <input type="text" placeholder="Enter video code"
                            class="form-control @error('video')
                                is-invalid
                            @enderror"
                            id="defaultFormControlInput" name="video" aria-describedby="defaultFormControlHelp">
                        @error('video')
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
