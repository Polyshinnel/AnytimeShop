<?php

namespace App\Http\Controllers;

use App\Api\BitrixApi;
use App\Http\Controllers\Telegram\TelegramController;
use App\Http\Requests\RecallFormRequest;
use Illuminate\Http\Request;

class SendFormDataController extends Controller
{
    private TelegramController $telegram;
    private BitrixApi $bitrixApi;

    public function __construct(TelegramController $telegram, BitrixApi $bitrixApi)
    {
        $this->telegram = $telegram;
        $this->bitrixApi = $bitrixApi;
    }

    public function __invoke(RecallFormRequest $request)
    {
        $data = $request->validated();

        $telegram_message = sprintf("⚠ Новое обращение с сайта ⚠: \n👤 <b>Имя: </b> %s, \n📞 <b>Телефон: </b> %s, \n", $data['name'], $data['phone']);
        if(isset($data['message'])) {
            $telegram_message .= sprintf('⌨️ Комментарий: %s', $data['message']);
        }

        $bitrixLead = [
            'title' => 'Новое обращение с сайта',
            'phone' => $data['phone'],
            'username' => $data['username'],
        ];
        $this->bitrixApi->createLead($bitrixLead);
        $this->telegram->sendOrder($telegram_message);

        return response()->json([
            'message' => 'OK',
            'err' => 'none'
        ]);
    }
}
