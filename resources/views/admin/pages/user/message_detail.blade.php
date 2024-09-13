@extends('admin.layout.master')
@section('title')
    Message Detail
@endsection
@push('admin_style')
    <style>
        main.content {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f7fc;
        }

        .chat-container {
            width: 100%;
            max-width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            background-color: #fff;
        }

        .chat-header {
            background-color: #4e73df;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-weight: bold;
        }

        .chat-body {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
        }

        .message {
            display: flex;
            margin-bottom: 15px;
        }

        .message-right {
            justify-content: flex-end;
        }

        .message .content {
            padding: 10px 15px;
            border-radius: 15px;
            font-size: 14px;
            max-width: 75%;
        }

        .message-left .content {
            background-color: #f1f0f0;
            color: #333;
        }

        .message-right .content {
            background-color: #4e73df;
            color: #fff;
        }

        .message img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .message-right img {
            margin-left: 10px;
            margin-right: 0;
        }

        .chat-footer {
            background-color: #f1f0f0;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        .chat-footer input[type="text"] {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 20px;
            outline: none;
            margin-right: 10px;
        }

        .chat-footer button {
            padding: 10px 15px;
            background-color: #4e73df;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
    @include('admin.layout.inc.breadcumb', [
        'main_page' => 'Users',
        'sub_page' => 'Messages',
    ])
    <main class="content">
        <div class="chat-container">
            <div class="chat-header">
                Chat with User
            </div>

            <div class="chat-body" id="chat-body">
                @foreach ($message_comment as $message)
                    @php
                        if ($message->type == 'User') {
                            $sender_data = App\Models\User::where('id', $message->sender_id)->first();
                        } else {
                            $sender_data = App\Models\Admin::where('id', $message->sender_id)->first();
                        }
                    @endphp
                    @if ($message->type == 'User')
                        <div class="message message-left">
                            <img src="{{ asset('uploads/user') }}/{{ $sender_data->photo }}" class="rounded-circle"
                                alt="User Photo" width="40" height="40">
                            <div class="content">
                                <strong>{{ $sender_data->name }}</strong><br>
                                {{ $message->comment }}
                                <span class="text-muted small text-nowrap ">
                                    {{ $message->created_at->format('h:i A') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    @if ($message->type == 'Admin')
                        <div class="message message-right">
                            <div class="content">
                                <strong>You</strong><br>
                                {{ $message->comment }}
                                <span class="text-muted small text-nowrap ">
                                    {{ $message->created_at->format('h:i A') }}
                                </span>
                            </div>
                            <img src="{{ asset('uploads/user') }}/{{ $sender_data->photo }}" class="rounded-circle"
                                alt="Admin Photo" width="40" height="40">
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="chat-footer">
                <form id="messageForm" action="{{ route('admin.messageSubmit', $id) }}" method="POST"
                    style="display: flex; width: 100%;">
                    @csrf
                    <input type="text" name="comment" id="comment" class="form-control" placeholder="Type your message"
                        required>
                    <button class="btn btn-primary" type="submit">Send</button>
                </form>
            </div>
        </div>
    </main>
@endsection

@push('admin_script')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Auto-scroll to bottom of the chat on load
            var chatBody = $('#chat-body');
            chatBody.scrollTop(chatBody[0].scrollHeight);

            // Submit form via AJAX
            $('#messageForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        // Append new message to chat body
                        var messageHTML = `<div class="message message-right">
                        <div class="content">
                            <strong>You</strong><br>
                            ${$('#comment').val()}
                            <span class="text-muted small text-nowrap mt-2">Just Now</span>
                        </div>
                        <img src="{{ asset('uploads/user') }}/{{ Auth::user()->photo }}" class="rounded-circle" alt="Admin Photo" width="40" height="40">
                    </div>`;

                        chatBody.append(messageHTML);

                        // Scroll to the bottom of the chat body
                        chatBody.scrollTop(chatBody[0].scrollHeight);

                        // Clear the input field
                        $('#comment').val('');

                        // Bring focus back to the input field
                        $('#comment').focus();
                    },
                    error: function(xhr, status, error) {
                        console.error('Message submission failed:', error);
                    }
                });
            });
        });
    </script>
@endpush
