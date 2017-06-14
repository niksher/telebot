<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

class CatCommand extends UserCommand
{
    protected $name = 'cat';                      
    protected $description = 'A command for test'; 
    protected $usage = 'Кот картинкой';                    
    protected $version = '1.0.0';                  

    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();     
        $data = [];                               
        $data['chat_id'] = $chat_id;              

        return Request::sendPhoto($data, $this->getCat()); 
    }
    
    private function getCat( )
    {
      $imageList = [
          "https://pp.userapi.com/c639422/v639422566/2286e/dMeyO8QfnOU.jpg"
          , "https://pp.userapi.com/c638229/v638229566/4deec/iY3SGEXHaT8.jpg"
          , "https://pp.userapi.com/c638229/v638229566/4dee4/gL-9u_UBJ2U.jpg"
          , "https://pp.userapi.com/c638229/v638229566/4dedc/tyoUt3a_k4A.jpg"
          , "https://pp.userapi.com/c638229/v638229566/4debb/QsO2_XtXRdc.jpg"
          , "https://pp.userapi.com/c638229/v638229566/4de33/r4qpz3uSaFY.jpg"
          , "https://pp.userapi.com/c638229/v638229566/4db00/yjPOLs_bybw.jpg"
          , "https://pp.userapi.com/c638229/v638229566/4daef/wO7RQzYnfoQ.jpg"
          , "https://pp.userapi.com/c638229/v638229566/4dae7/XxsWooCGSvU.jpg"
          , "https://pp.userapi.com/c638526/v638526838/40164/ldF59AS3Dbo.jpg"
          , "https://pp.userapi.com/c638526/v638526838/40144/wSRi_9YJhy8.jpg"
          , "https://pp.userapi.com/c638526/v638526838/40132/T0T6g23KflY.jpg"
          , "https://cs7051.userapi.com/c841027/v841027566/1559/HHzS6iX12iA.jpg"
          , "https://cs7051.userapi.com/c841027/v841027566/15b8/tYtm0B--ZUY.jpg"
          , "https://cs7051.userapi.com/c841027/v841027566/159e/bSHBSjvhpMw.jpg"
          , "https://cs7051.userapi.com/c841027/v841027566/1578/XV4-7L0zAvU.jpg"
          , "https://cs7051.userapi.com/c841027/v841027566/1561/5BbbnCDeiEE.jpg"
      ];
      return $imageList[mt_rand(0, count($imageList))];
    }
}
