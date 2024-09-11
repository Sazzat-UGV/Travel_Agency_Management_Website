@extends('admin.layout.master')
@section('title')
    Message Detail
@endsection
@push('admin_style')
    <style>
        .chat-online {
            color: #34ce57
        }

        .chat-offline {
            color: #e4606d
        }

        .chat-messages {
            display: flex;
            flex-direction: column;
            max-height: 800px;
            overflow-y: scroll
        }

        .chat-message-left,
        .chat-message-right {
            display: flex;
            flex-shrink: 0
        }

        .chat-message-left {
            margin-right: auto
        }

        .chat-message-right {
            flex-direction: row-reverse;
            margin-left: auto
        }

        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }

        .flex-grow-0 {
            flex-grow: 0 !important;
        }

        .border-top {
            border-top: 1px solid #dee2e6 !important;
        }
    </style>
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'Users',
        'sub_page' => 'Messages',
    ])
    <main class="content">
        <div class="container p-0">

            <div class="card">
                <div class="row g-0">
                    <div class="col-12">

                        <div class="position-relative">
                            <div class="chat-messages p-4">
                                @foreach ($message_comment as $message)
                                    @php
                                        if ($message->type == 'User') {
                                            $sender_data = App\Models\User::where('id', $message->sender_id)->first();
                                        } else {
                                            $sender_data = App\Models\Admin::where('id', $message->sender_id)->first();
                                        }
                                    @endphp
                                    @if ($message->type == 'User')
                                        <div class="chat-message-left pb-4">
                                            <div>
                                                <img src="{{ asset('uploads/user') }}/{{ $sender_data->photo }}"
                                                    class="rounded-circle mr-1" alt="Photo" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">
                                                    {{ $message->created_at->format('h:i A') }}</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                <div class="font-weight-bold mb-1">{{ $sender_data->name }}</div>
                                                {{ $message->comment }}
                                            </div>
                                        </div>
                                    @endif
                                    @if ($message->type == 'Admin')
                                        <div class="chat-message-right mb-4">
                                            <div>
                                                <img src="{{ asset('uploads/user') }}/{{ $sender_data->photo }}"
                                                    class="rounded-circle mr-1" alt="Photo" width="40"
                                                    height="40">
                                                <div class="text-muted small text-nowrap mt-2">
                                                    {{ $message->created_at->format('h:i A') }}</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                <div class="font-weight-bold mb-1">You</div>
                                                {{ $message->comment }}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>

                        <div class="flex-grow-0 py-3 px-4 border-top">
                            <form action="{{ route('admin.messageSubmit', $id) }}" method="POST">
                                @csrf
                                input
                                <div class="input-group">
                                    <input type="text" name="comment" class="form-control"
                                        placeholder="Type your message">
                                    <button class="btn btn-primary" type="submit">Send</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
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
