<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessagesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(User $user)
    {
        $sendedMessages = auth()->user()->sent->pluck('receiver_id')->unique()->all();
        $receivedMessages = auth()->user()->received->pluck('sender_id')->unique()->all();

        $contacts = array_merge($sendedMessages, $receivedMessages);
        
        $contacts = User::whereIn('id', $contacts)->get();
        
        return view('message.index', compact('contacts'));
    }

    public function show(User $user)
    {
        /*
        $receiver = $user;
        $sender = auth()->user();
        $sendedMessages = $sender->sent->where('receiver_id', $receiver->id);
        $receivedMessages = $sender->received->where('sender_id', $receiver->id);
        $messages = $sendedMessages->merge($receivedMessages)->sortBy('created_at');
        */
        
        return view('message.show', compact('user'));
    }
/*
    public function store(Request $request, User $user)
    {
        auth()->user()->sent()->create([
            'receiver_id' => $user->id,
            'body' => $request->body,
        ]);

        return redirect('/messages/'. $user->id);
    }
*/
}
