<?php

namespace Jazzlevit\RecmanTest\Services;

class FlashMessages
{
    const TYPE_SUCCESS = 'success';
    const TYPE_ERROR = 'danger';

    public static function addMessage($message, $type = self::TYPE_SUCCESS): void
    {
        $_SESSION['flash_messages'][] = [
            'type' => $type,
            'message' => $message,
        ];
    }

    public static function getMessages(): array
    {
        if (!isset($_SESSION['flash_messages'])) {
            return [];
        }

        $messages = $_SESSION['flash_messages'];
        $_SESSION['flash_messages'] = [];

        return $messages;
    }

}