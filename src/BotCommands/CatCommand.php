<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

class CatCommand extends UserCommand
{
    protected $name = 'cat';                      
    protected $description = 'A command for test'; 
    protected $usage = '/cat';                    
    protected $version = '1.0.0';                  

    public function execute()
    {
        $message = $this->getMessage();           

        $chat_id = $message->getChat()->getId();  
        
        ob_start();
        var_dump($message);
        var_dump($this);
        $out = ob_get_contents();
        ob_end_clean();
        file_put_contents("log.log", $out);
        
        $data = [];                               
        $data['chat_id'] = $chat_id;              

        return Request::sendPhoto($data, $this->getCat()); 
    }
    
    private function getCat( )
    {
      $imageList = [
          "https://pp.userapi.com/c637727/v637727566/50c51/VgPx1V3XT5k.jpg"
          , "https://pp.userapi.com/c638424/v638424838/401a1/ruV0SU_UtxY.jpg"
          , "https://pp.userapi.com/c638424/v638424838/4000d/EzgbdMKFBD0.jpg"
          , "https://pp.userapi.com/c637727/v637727566/50bd1/URhQvNGKzL0.jpg"
          , "https://pp.userapi.com/c637727/v637727566/50747/U3K0H3Lny-Q.jpg"
          , "https://pp.userapi.com/c837231/v837231566/42b35/AYDy8IT3090.jpg"
          , "https://pp.userapi.com/c837231/v837231566/42aa5/qyvJQyazz8w.jpg"
          , "https://pp.userapi.com/c837231/v837231566/41e6c/xT-HxA-yQqI.jpg"
      ];
      return $imageList[mt_rand(0, count($imageList))];
    }
}