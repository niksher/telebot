<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class BotController extends Controller
{
    /**
     * @Route("/bot/{$token") 
     */
    public function showAction($token="net nikto")
    {
        $API_KEY = $this->getParameter("telebot_token");
        $BOT_NAME = $this->getParameter("telebot_name");
        $COMMANDS_FOLDER = __DIR__.'/../../BotCommands/';
      
        try {
            $telegram = new Telegram($API_KEY, $BOT_NAME);
            $telegram->addCommandsPath($COMMANDS_FOLDER);
            $telegram->handle();
        } catch (TelegramException $e) {
        }
      
        return new Response(
            '<html><body>kek cheburek ' . $token . '</body></html>'
        );
    }
}