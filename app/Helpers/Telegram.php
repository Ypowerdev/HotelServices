<?php 

namespace App\Helpers; 

use Illuminate\Support\Facades\Http; 

class Telegram { 

    const URL = 'https://api.telegram.org/';

    protected $http;
    protected $bot;

    public function __construct($bot)
    {
        $this->bot = $bot; 
    }

    public function sendMessage($chat_id, $message) { 
        
        Http::post(self::URL.$this->bot.'/sendMessage', [
            'chat_id' => $chat_id,           
            'text' => $message,            
            'parse_mode' => 'html'
        ]);
    }



}