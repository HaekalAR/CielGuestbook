<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    // View all messages
    public function index() {
        $messages = Message::latest()->get();
        return view('home', compact('messages'));
    }

    // Save new messages
    public function store(Request $request) {
        $request->validate([
            'name'    => 'required|max:50',
            'message' => 'required|max:512',
        ]);
    
        Message::create($request->only('name', 'message'));
    
        return redirect()->back()->with('Success', 'Message sent!');
    }

}
