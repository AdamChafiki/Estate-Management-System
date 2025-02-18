<?php

if (! function_exists('getConversationId')) {
    /**
     * Generate a unique conversation ID for two users.
     *
     * @param  int  $userId1
     * @param  int  $userId2
     * @return string
     */
    function getConversationId($userId1, $userId2)
    {
        $ids = [$userId1, $userId2];
        sort($ids); // Ensures the lower ID comes first
        return implode('_', $ids);
    }
}
