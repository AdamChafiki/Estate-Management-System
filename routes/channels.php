<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{conversationId}', function ($user, $conversationId) {
  // The conversationId is of the format "id1_id2". We split it and check that the user is one of these IDs.
  $ids = explode('_', $conversationId);
  return in_array($user->id, $ids);
});
