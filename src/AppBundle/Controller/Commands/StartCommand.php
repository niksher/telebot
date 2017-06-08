<?php

namespace Longman\TelegramBot\Commands\UserCommands;

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
        

        $data = [];                               
        $data['chat_id'] = $chat_id; 
        $data['text'] = "Это бот с котами, чтобы получить своего кота набери /cat, чтобы получить гифку кота набери /catgif";

        return Request::sendMessage($data); 
    }
}