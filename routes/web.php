<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstateController;
use Illuminate\Support\Facades\Route;
use App\Events\MessageSend;
use App\Http\Controllers\ContactController;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
 * Route to view page
 */

Route::get('/', function () {
  return view('home');
})->name('home');

/*
 * Route to view signup
 */

Route::get('/signup', function () {
  return view('auth.signup');
})->name('signup')->middleware('guest');

/*
 * Route to view login
 */

Route::get('/login', function () {
  return view('auth.login');
})->name('login')->middleware('guest');

/*
 * Route to  @authcontroller @method[ register ] [ authenticate ] [ logout ]
 */

Route::post('/register', [AuthController::class, 'register'])->name('register');
// middleware('throttle:5,1') means that the user can only make 5 requests in 1 minute
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate')->middleware('throttle:5,1');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
 * Route to view account
 */

Route::get('/account', function () {
  return view('account.index');
})->name('account')->middleware('auth');

/*
 * Route to  @estatecontroller @method[ index ] [ create ] [ store ] [ show ] [ edit ] [ update ] [ destroy ] [ browze ]
 */
Route::resource('estate', EstateController::class);
Route::get('/browze', [EstateController::class, 'browze'])->name('browze');

/*
 * Route to view contact
 */

Route::get('/contact/{user}', [ContactController::class, 'index'])->name('contact.index');

/*
 * Route to view chat
 */
Route::post('/broadcast', function (Request $request) {
  // Validate incoming data
  $request->validate([
    'message'     => 'required|string',
    'receiver_id' => 'required|exists:users,id',
  ]);

  $sender = Auth::user();
  $receiver = User::findOrFail($request->receiver_id);
  $conversationId = getConversationId($sender->id, $receiver->id);

  // Save the message
  $message = Message::create([
    'conversation_id' => $conversationId,
    'user_id'         => $sender->id,
    'message'         => $request->message,
  ]);

  // Broadcast the message event
  broadcast(new MessageSend($request->message, $sender, $receiver))->toOthers();

  return response()->json(['status' => 'Message sent', 'message' => $message]);
})->name('broadcast')->middleware('auth');
