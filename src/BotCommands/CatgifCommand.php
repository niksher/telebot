<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

class CatgifCommand extends UserCommand
{
    protected $name = 'catgif';                      
    protected $description = 'A command for test'; 
    protected $usage = 'Видео кот';                    
    protected $version = '1.0.0';                  

    public function execute()
    {
        $message = $this->getMessage();           

        $chat_id = $message->getChat()->getId();  
        

        $data = [];                               
        $data['chat_id'] = $chat_id;              

        return Request::sendVideo($data, $this->getCat()); 
    }
    
    private function getCat( )
    {
      $imageList = [
          "https://vk.com/doc5057566_446564261?hash=db18f8fe251de068ec&dl=1cced1d77cf0bd8831&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446531756?hash=0e92bbe157d22763c5&dl=4535ddc7815a8e6274&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446531595?hash=065cc4006f1efd32c3&dl=e8949019d58f5e31f9&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446531270?hash=35c09ec81e8ddc6d59&dl=876d5782517d01d6f4&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446531196?hash=0f1a08cc96a30c67ea&dl=b25bb8b4d9b1bc7b03&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc2000011423_446752360?hash=b617442d0c53992262&dl=430e353502ccf291b8&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc2000014281_446359557?hash=4b7a6b475f2a34b526&dl=210cf2186b5eee27bd&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446530377?hash=7611462bc6982b65a4&dl=fb05ab5276e6be97f0&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446530835?hash=2554a0149f67e57656&dl=0e79b4e6bbf9a20d35&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446530580?hash=c7100aedad4f7e709d&dl=23036655f2997ecca1&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446530497?hash=1f25de1a35752d6de1&dl=91eb3038e8b29432dd&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446530302?hash=0b01dcb1d18670c29f&dl=532562289667386951&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446530111?hash=41fcc688b6a2297ef0&dl=e93f10ede680b63299&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446529935?hash=1d99f210f663fbfbe4&dl=a57125d6ef8a089e87&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446529353?hash=9c95deb1f791c0afcc&dl=7f69259e47e654d0c0&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446529309?hash=b0b0161e9fd6d18a42&dl=2baf3c6cafa9155269&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446502056?hash=81637b8096ae4625c5&dl=cb18ee2b4bd7b86cf8&wnd=1&module=public&mp4=1"
      ];
      return $imageList[mt_rand(0, count($imageList))];
    }
}