@extends('layouts.base')
@section('title', 'ACCOUNT')
@section('content')
    <div class="flex flex-col md:flex-row">
        <!-- sidebar -->
        @include('shared.sidebar')
        <main>
            <div class="mt-10">
                <h1 class="text-2xl font-bold mb-4">Your Chats</h1>
                <ul class="space-y-4">
                    @foreach ($conversations as $chat)
                        <li class="border p-4 rounded hover:bg-gray-100 transition duration-150">
                            <a href="{{ route('contact.index', ['user' => $chat['other_user_id']]) }}" class="block">
                                <div class="flex justify-between items-center w-96">
                                    <h3 class="font-semibold text-lg">
                                        Chat with {{ $chat['other_user_name'] }}
                                    </h3>
                                    <small class="text-gray-500">
                                        {{ \Carbon\Carbon::parse($chat['last_message_time'])->diffForHumans() }}
                                    </small>
                                </div>
                                <p class="text-gray-700 mt-1">
                                    {{ \Illuminate\Support\Str::limit($chat['last_message'], 50) }}
                                </p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </main>
    </div>



@endsection
