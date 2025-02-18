<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
