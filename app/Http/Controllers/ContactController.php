<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::raw($request->message, function($message) use ($request) {
            $message->to('queriesessential@gmail.com')
                ->subject('New Contact Form Message from ' . $request->name)
                ->from($request->email);
        });

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}


