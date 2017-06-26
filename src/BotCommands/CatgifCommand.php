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
          "https://vk.com/doc203199838_447153574?hash=e8ab2c764d84828646&dl=56d89af1b0d0d0a21a&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc203199838_447149670?hash=8121fbc33c654404c8&dl=97b56dfd6673fd8f98&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc203199838_447149613?hash=ced061bb18a956bb7e&dl=1bdbc73d3f0179c418&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc203199838_447149422?hash=d18cadc09f4eeb7c48&dl=7bf97add2e0ca2c31f&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447079833?hash=a064b0e0c5c7f74f0c&dl=47b01df8720892a6d0&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447079803?hash=c867f999293f9cae32&dl=4aab84900deef02949&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447079753?hash=4c1f4dd8f512a4a6e0&dl=e93f515a0ffa948bc7&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447079663?hash=0d33b3b6e337d3c3c9&dl=55e982c17034153049&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447074425?hash=575a737e8bd6f2bf1a&dl=b60b618884abeea4c3&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447074326?hash=aff64221e512765784&dl=b516d9e697e024e0a6&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447074282?hash=0cd40c4c100d2cca39&dl=2557e326c04eaec407&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447074210?hash=16eaca92f634daff10&dl=91fd18ca04fb521a2b&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447065243?hash=57df325317f6d65009&dl=e15a8858ba6a89ee17&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447065236?hash=438faa33bf1c860ab7&dl=58a691ff7c53db79da&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447065201?hash=ab32c45ee55d323459&dl=5e7e2c0ac5d123510f&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_447065192?hash=0f4da1d55284b8c7fe&dl=9243d09991dd613eb3&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446999960?hash=370106300d75d73cc2&dl=f09c6c38ac219cd652&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446999872?hash=8e1dbefb2c0795a0b5&dl=e2de9099b0dc1cc375&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446999817?hash=031ee1e378ed3b8673&dl=530fb2368e254c3325&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446999784?hash=acdafff29b16718cf4&dl=5d117db0b498c9babf&wnd=1&module=public&mp4=1"
          , "https://vk.com/doc5057566_446999182?hash=880853c37f2d7b1804&dl=6994ec70e5c3d91373&wnd=1&module=public&mp4=1"
          
      ];
      return $imageList[mt_rand(0, count($imageList))];
    }
}