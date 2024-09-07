<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SubscriberMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminSubscriberController extends Controller
{
    public function subscribers()
    {
        $subscribers = Subscriber::where('status', 'Active')->latest('id')->get();
        return view('admin.pages.subscriber.index', compact('subscribers'));
    }

    public function send_email()
    {
        return view('admin.pages.subscriber.send_email');
    }

    public function send_email_submit(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);
        $subject = $request->subject;
        $subscriber_message = $request->message;

        $subscribers = Subscriber::where('status', 'Active')->get();
        foreach ($subscribers as $subscriber) {
            $subscriber_email = $subscriber->email;
            Mail::to($subscriber_email)->send(new SubscriberMail($subject, $subscriber_message));
        }
        return redirect()->back()->with('success', 'Email is sent successfully.');
    }

    public function subscriber_delete($id)
    {
        $subscriber = Subscriber::where('id', $id)->first();
        $subscriber->delete();
        return redirect()->back()->with('success', 'Subscriber is delete successfully.');
    }

}
