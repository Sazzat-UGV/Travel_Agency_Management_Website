<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\MessageComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function message()
    {
        $messages = Message::with('user')->get();
        return view('admin.pages.user.message', compact('messages'));
    }

    public function message_detail($id)
    {
        $message_comment = MessageComment::where('message_id', $id)->get();
        return view('admin.pages.user.message_detail', compact('message_comment', 'id'));
    }

    public function message_submit(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        MessageComment::create([
            'message_id' => $id,
            'sender_id' => Auth::guard('admin')->user()->id,
            'type' => 'Admin',
            'comment' => $request->comment,
        ]);
        return redirect()->back()->with('success', 'Message is sent successfully!');
    }
}
