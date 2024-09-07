@extends('user.layout.master')
@section('title')
    Messages
@endsection
@push('user_style')
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
    @if ($message_check)
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
                                                $sender_data = App\Models\User::where(
                                                    'id',
                                                    $message->sender_id,
                                                )->first();
                                            } else {
                                                $sender_data = App\Models\Admin::where(
                                                    'id',
                                                    $message->sender_id,
                                                )->first();
                                            }
                                        @endphp
                                        @if ($message->type == 'User')
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
                                        @if ($message->type == 'Admin')
                                            <div class="chat-message-left pb-4">
                                                <div>
                                                    <img src="{{ asset('uploads/user') }}/{{ $sender_data->photo }}"
                                                        class="rounded-circle mr-1" alt="Photo" width="40"
                                                        height="40">
                                                    <div class="text-muted small text-nowrap mt-2">
                                                        {{ $message->created_at->format('h:i A') }}</div>
                                                </div>
                                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                    <div class="font-weight-bold mb-1">{{ $sender_data->name }}</div>
                                                    {{ $message->comment }}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>

                            <div class="flex-grow-0 py-3 px-4 border-top">
                                <form action="{{ route('message_submit') }}" method="POST">
                                    @csrf
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
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger" role="alert">
                    No message found! <br>
                    <a href="{{ route('message_start') }}" class="text-decoration-underline">Please click here to start
                        messaging.</a>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('user_script')
@endpush
