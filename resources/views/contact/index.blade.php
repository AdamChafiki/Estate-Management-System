@extends('layouts.base')

@section('title', 'Estate Browze')

@section('content')

    <div class="flex flex-col h-screen max-w-sm">
        <div class="flex-grow overflow-y-auto">
            <!-- Chat messages -->
            <div class="flex flex-col mb-4 gap-4 py-4">
                <div class="flex justify-start">
                    <div class="bg-gray-100 rounded-lg px-4 py-2 max-w-[80%]">
                        <p class="text-gray-900 text-sm">Hey, how are you?</p>
                    </div>
                </div>
                <div class="flex justify-end">
                    <div class="bg-blue-500 rounded-lg px-4 py-2 max-w-[80%]">
                        <p class="text-white text-sm">I'm good, thanks! How about you?</p>
                    </div>
                </div>
                <div class="flex justify-start">
                    <div class="bg-gray-100 rounded-lg px-4 py-2 max-w-[80%]">
                        <p class="text-gray-900 text-sm">I'm doing great, thanks for asking!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center h-16">
            <!-- Chat input -->
            <input type="text" class="border border-gray-300 rounded-lg py-2 px-4 w-full max-w-lg mr-4"
                placeholder="Type a message...">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send</button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Echo.channel('public-messages').listen('MessageSend', function(e) {
                console.log("EVENT", e.message);
            });
        })
    </script>
@endsection
