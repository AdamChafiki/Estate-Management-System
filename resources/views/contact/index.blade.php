@extends('layouts.base')

@section('title', 'Chat')

@section('content')
<div class="max-w-4xl mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Chat with {{ $user->firstName }} {{ $user->lastName }} [{{ $user->role }}]</h1>
    <div class="border rounded-lg bg-white shadow-lg">
        <!-- Chat messages area -->
        <div id="chatMessages" class="flex flex-col space-y-2 p-4 h-96 overflow-y-auto bg-gray-100">
            @foreach($messages as $message)
                <div class="flex {{ $message->user_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                    <div class="px-4 py-2 rounded-lg my-1 max-w-xs break-words
                        {{ $message->user_id === Auth::id() ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-900' }}">
                        {{ $message->message }}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Chat input form -->
        <div class="border-t p-4">
            <form id="chat-form" action="{{ route('broadcast') }}" method="POST" class="flex space-x-2">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                <input type="text" name="message" id="message" placeholder="Type your message..."
                    class="flex-1 border rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Send
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const conversationId = "{{ $conversationId }}";
        const chatMessagesEl = document.getElementById('chatMessages');

        // Subscribe to the private channel for this conversation
        Echo.private('chat.' + conversationId)
            .listen('MessageSend', (e) => {
                // Create a message bubble
                let messageDiv = document.createElement('div');
                messageDiv.classList.add('flex');
                // If the sender id matches the authenticated user's id, align right
                if(e.sender_id == {{ Auth::id() }}) {
                    messageDiv.classList.add('justify-end');
                } else {
                    messageDiv.classList.add('justify-start');
                }

                let bubble = document.createElement('div');
                bubble.classList.add('px-4', 'py-2', 'rounded-lg', 'my-1', 'max-w-xs', 'break-words');
                if(e.sender_id == {{ Auth::id() }}) {
                    bubble.classList.add('bg-blue-500', 'text-white');
                } else {
                    bubble.classList.add('bg-gray-300', 'text-gray-900');
                }
                bubble.textContent = e.message;
                messageDiv.appendChild(bubble);
                chatMessagesEl.appendChild(messageDiv);

                // Auto-scroll to the bottom
                chatMessagesEl.scrollTop = chatMessagesEl.scrollHeight;
            });

        // Optionally, handle the form submission with AJAX to prevent a full page reload
        document.getElementById('chat-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            axios.post("{{ route('broadcast') }}", formData)
                .then(response => {
                    document.getElementById('message').value = '';
                })
                .catch(error => {
                    console.error('Error sending message:', error);
                });
        });
    });
</script>
@endsection
