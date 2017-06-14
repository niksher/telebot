<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
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
        
        $switch_element = mt_rand(0, 9) < 5 ? 'true' : 'false';
        $inline_keyboard = new InlineKeyboard([
            ['text' => 'inline', 'switch_inline_query' => $switch_element],
            ['text' => 'inline current chat', 'switch_inline_query_current_chat' => $switch_element],
        ], [
            ['text' => 'callback', 'callback_data' => 'identifier'],
            ['text' => 'open url', 'url' => 'https://github.com/php-telegram-bot/core'],
        ]);
        

        $data = [];                               
        $data['chat_id'] = $chat_id; 
        $data['text'] = "Это бот с котами, чтобы получить своего кота набери /cat, чтобы получить гифку кота набери /catgif";
        $data['reply_markup'] = $inline_keyboard;

        return Request::sendMessage($data); 
    }
}