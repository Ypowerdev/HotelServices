<?php 

namespace App\Notifications; 

use Illuminate\Support\Facades\Http; 

class Telegram { 

    const URL = 'https://api.telegram.org/';

    public function __construct(protected string $bot)
    {       
    }

    public function sendMessage($chat_id, $message) { 
        
        Http::post(self::URL.$this->bot.'/sendMessage', [
            'chat_id' => $chat_id,           
            'text' => $message,            
            'parse_mode' => 'html'
        ]);
    }



}