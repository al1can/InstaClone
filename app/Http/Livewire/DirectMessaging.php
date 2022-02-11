<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class DirectMessaging extends Component
{

    public function mount($user)
    {
        $this->user = $user;
    }

    public function getMessages()
    {
        $receiver = $this->user;
        $sender = auth()->user();
        $sendedMessages = $sender->sent->where('receiver_id', $receiver->id);
        $receivedMessages = $sender->received->where('sender_id', $receiver->id);
        $messages = $sendedMessages->merge($receivedMessages)->sortBy('created_at');
        return $messages;
    }

    public function render()
    {
        //auth()->user()->sent->where('receiver_id', $this->user->id)->merge(auth()->user()->received->where('sender_id', $this->user->id))->sortBy('created_at')

        $messages = $this->getMessages();

        return view('livewire.direct-messaging', [
            'messages' => $messages,
            'user' => $this->user,
        ]);
    }
}
