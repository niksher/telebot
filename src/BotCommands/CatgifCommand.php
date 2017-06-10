<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;

class CatgifCommand extends UserCommand
{
    protected $name = 'catgif';                      
    protected $description = 'A command for test'; 
    protected $usage = '/catgif';                    
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
          "https://vk.com/doc5057566_446209025?hash=a1a7cf73ae173719c5&dl=992b29619ba92211c2&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446294637?hash=8b2849bf98fdcc29ce&dl=0ec44b135a18e7dd7c&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446294523?hash=3ecd9adf3e7b355bd3&dl=5f33e3559f8afda179&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446294412?hash=3d7d14790306804455&dl=2ed38f798a7b165a41&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446293931?hash=317b018753671caf1a&dl=28733f6b3b81c99d0a&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446293803?hash=b63ed6ee435a6615ba&dl=c3ccb5e5df05f6424c&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446293469?hash=9c5ed65e888bc811a1&dl=09bd416984762a7987&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446251403?hash=6971366412d0e695bb&dl=d5119283147210bf94&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446209547?hash=5d96eb498cc8eefe91&dl=fc1a2595cf8a53bff3&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446209526?hash=be608168b45aab9cc7&dl=bfa29a6f8d409154da&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446209505?hash=152fa1f8b0aca12707&dl=88ea06c04ac1899a5f&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446209495?hash=d1dd172410c010ec9e&dl=cb0ce52efb70167e89&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446209432?hash=b5d8430953550367d2&dl=1cf534ef63fb1f0d82&wnd=1&module=public&mp4=1"
      ];
      return $imageList[mt_rand(0, count($imageList))];
    }
}