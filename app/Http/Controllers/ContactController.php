<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to send a contact message.');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create($data);

        return redirect()->route('contact.index')->with('success', 'Your message has been sent. Thank you for contacting us.');
    }
}
