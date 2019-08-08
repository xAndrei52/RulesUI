<?php

namespace RulesUI;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat as C;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
	
 public function onEnable() : void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);    
		@mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $this->getResource("config.yml");
		}
		
	public function onJoin(PlayerJoinEvent $event) {
		$player = $event->getPlayer();
    $msg = $this->getConfig()->get("msg");
		$player->sendMessage($msg);
    $this->openMyForm($player);
		}
    public function openMyForm($player){ 
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $player, int $data = null){
            $result = $data;
            if($result === null){
                return true;
            }             
            switch($result){
                case 0:                    
                break;                     
            }
            
            
            });
            $title = $this->getConfig()->get("title");
            $content = $this->getConfig()->get("content");
            $button = $this->getConfig()->get("button");
            $form->setTitle($title);
            $form->setContent($content);
            $form->addButton($button);
            $form->sendToPlayer($player);                  
            return $form;                                            
				}
	}
