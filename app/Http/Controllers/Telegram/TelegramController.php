<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    private Api $telegram;

    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    public function sendOrder($message)
    {
        $this->telegram->sendMessage([
            'chat_id' => config('telegram.order_chat_id'),
            'text' => $message,
            'parse_mode' => 'HTML'
        ]);
    }
}
