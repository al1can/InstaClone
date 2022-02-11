<div>
    <div class="bg-white rounded-3" wire:poll.500ms="getMessages">
        @foreach($messages as $message)
            @if($message->sender_id == auth()->user()->id)
                <div class="p-4">
                    <div class="text-end bg-success rounded">
                        <div class="fs-4">{{ $message->body }}</div>
                        <div>{{ $message->created_at->format('H:i') }}</div>
                    </div>
                </div>
            @else
                <div class="p-4">
                    <div class="text-start bg-secondary rounded">
                        <div class="fs-4">{{ $message->body }}</div>
                        <div>{{ $message->created_at->format('H:i') }}</div>
                    </div>
                </div>
            @endif
        @endforeach
        <form wire:submit.prevent="sendMessages">
            @csrf

            <div class="d-flex">
                <label for="body">Message</label>
                <input id="body" type="text" class="form-control mx-5" name="body" wire:model="body" required autofocus>
                <button class="btn btn-primary" type="submit">Send</button>
            </div>
        </form>
    </div>
</div>