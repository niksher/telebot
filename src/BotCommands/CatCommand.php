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
          "https://cs7051.userapi.com/c639128/v639128838/2b37f/SiHGp7b5XZU.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2b357/49mzFZJZehw.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2b34e/nI5GFskc-5I.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2b346/9_k4NleFIAc.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2b378/jVMGRD_7fq0.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2b35f/elKptIskl18.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2b331/pO1yHVzCXFk.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2b368/aYsfXcBYbvY.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2b33f/b5g35fMydAQ.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2b32a/uU9ytAWkd5A.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2b2fb/I514a8kzapo.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2ae3a/FmvDl29FyGM.jpg"
          , "https://pp.userapi.com/c638217/v638217566/44fd8/cxehaBai6RY.jpg"
          , "https://pp.userapi.com/c639128/v639128838/2ad39/MxRAVJPqZ-I.jpg"
          , "https://pp.userapi.com/c638217/v638217566/442da/EC1eIGAqphk.jpg"
          , "https://pp.userapi.com/c639128/v639128838/29f04/TxgEc4dwx2s.jpg"
          , "https://pp.userapi.com/c639128/v639128838/29f0c/Jpv3qSKa8Hs.jpg"
          , "https://pp.userapi.com/c639128/v639128838/29efc/Cu7fNVHTNS4.jpg"
          , "https://pp.userapi.com/c639128/v639128838/29eeb/6hevo7P489M.jpg"
          , "https://pp.userapi.com/c638217/v638217566/4402d/nbD1SWeNVGA.jpg"
          , "https://pp.userapi.com/c638217/v638217566/43eae/lhqGIt1n_Pw.jpg"
      ];
      return $imageList[mt_rand(0, count($imageList))];
    }
}
