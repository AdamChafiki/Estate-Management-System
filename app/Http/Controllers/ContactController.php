<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
  public function index(User $user)
  {
    $conversationId = getConversationId(Auth::id(), $user->id);
    $messages = Message::where('conversation_id', $conversationId)
      ->orderBy('created_at')
      ->get();

    return view('contact.index', [
      'user' => $user,
      'conversationId' => $conversationId,
      'messages' => $messages,
    ]);
  }
  public function show()
  {
    $userId = Auth::id();

    // Fetch last message from each conversation the user is in
    $messages = Message::select(
      'conversation_id',
      DB::raw('MAX(created_at) as last_message_time'),
      DB::raw('(SELECT message FROM messages m WHERE m.conversation_id = messages.conversation_id ORDER BY created_at DESC LIMIT 1) as last_message')
    )
      ->where('user_id', $userId)
      ->groupBy('conversation_id')
      ->orderByDesc('last_message_time')
      ->get();

    // Extract other user details
    $conversations = $messages->map(function ($chat) use ($userId) {
      // Extract the other user's ID
      $ids = explode('_', $chat->conversation_id);
      $otherUserId = ($ids[0] == $userId) ? $ids[1] : $ids[0];

      // Fetch the other user's details
      $otherUser = User::find($otherUserId);

      return [
        'conversation_id' => $chat->conversation_id,
        'other_user_name' => $otherUser->firstName ?? 'Unknown User',
        'other_user_id' => $otherUserId,
        'last_message' => $chat->last_message,
        'last_message_time' => $chat->last_message_time,
      ];
    });

    return view('contact.show', compact('conversations'));
  }
}
