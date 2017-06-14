<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Request;

class StartCommand extends SystemCommand
{
    protected $name = 'start';                      
    protected $description = 'A command for test'; 
    protected $usage = '/start';                    
    protected $version = '1.0.0';                  

    public function execute()
    {
        $message = $this->getMessage();           

        $chat_id = $message->getChat()->getId();  
        
        $inline_keyboard = new Keyboard([
            ['text' => 'Кот картинкой', 'callback_data' => 'cat'],
            ['text' => 'Видео кот', 'callback_data' => 'catgif'],
        ]);
        

        $data = [];                               
        $data['chat_id'] = $chat_id; 
        $data['text'] = "Это бот с котами, чтобы получить своего кота набери /cat, чтобы получить гифку кота набери /catgif";
        $data['reply_markup'] = $inline_keyboard;

        return Request::sendMessage($data); 
    }
}