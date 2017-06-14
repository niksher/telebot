<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Request;

class ExecCommand extends SystemCommand
{
    protected $name = 'exec';                      
    protected $description = 'A command for test'; 
    protected $usage = '/exec';                    
    protected $version = '1.0.0';                  

    public function execute()
    {
        $message = $this->getMessage();           

        $chat_id = $message->getChat()->getId();  
        
        $inline_keyboard = new Keyboard([
            ['text' => '/cat'],
            ['text' => '/catgif'],
        ]);

        $inline_keyboard->setResizeKeyboard(true);
        $inline_keyboard->setSelective(false);
        

        $data = [];                               
        $data['chat_id'] = $chat_id;
        $data['reply_markup'] = $inline_keyboard;

        return Request::sendMessage($data); 
    }
}