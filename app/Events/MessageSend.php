<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSend implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;
    public User $sender;
    public User $receiver;

    /**
     * Create a new event instance.
     *
     * @param  string  $message
     * @param  \App\Models\User  $sender
     * @param  \App\Models\User  $receiver
     */
    public function __construct($message, User $sender, User $receiver)
    {
        $this->message = $message;
        $this->sender = $sender;
        $this->receiver = $receiver;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * We compute a conversation ID based on the sender's and receiver's IDs.
     */
    public function broadcastOn(): array
    {
        $conversationId = getConversationId($this->sender->id, $this->receiver->id);
        return [
            new PrivateChannel('chat.' . $conversationId),
        ];
    }

    /**
     * Data to broadcast.
     */
    public function broadcastWith()
    {
        return [
            'sender_id'   => $this->sender->id,
            'sender_name' => $this->sender->firstName,  // Adjust if your user model uses a different field
            'message'     => $this->message,
        ];
    }
}
