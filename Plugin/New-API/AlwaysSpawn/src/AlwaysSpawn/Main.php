<?php

namespace AlwaysSpawn;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\entity\Entity;
use pocketmine\Player;

class Main extends PluginBase implements Listener, CommandExecutor{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->log("[INFO] AlwaysSpawn Loaded!");
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        switch($cmd->getName()){
            case "alwaysspawn":
                if($args[0] == "set"){
                    $player = $sender->getEntity();
                    $X = $player->getFloorX();
                    $Y = $player->getFloorY();
                    $Z = $player->getFloorZ();
                    $Level = $player->getLevel()->getName(); //Maybe? Ill test it later.
                    //TODO Save info
                }elseif($args[0] == "location"){
                    //Not sure if the following will work!
                    $player = $sender->getEntity();
                    $X = $player->getFloorX();
                    $Y = $player->getFloorY();
                    $Z = $player->getFloorZ();
                    $Level = $player->getLevel()->getName(); //Maybe? Ill test it later.
                    $sender->sendMessage("[AlwaysSpawn] Your location is:\nX: " . $X . "\nY: " . $Y . "\nZ: " . $Z . "\nLevel: " . $Level);
                }else{
                    $sender->sendMessage("[AlwaysSpawn] Command Not Found!");
                    $sender->sendMessage("Usage: /alwaysspawn <set|location>");
                }
            break;
     }
    
    /**
     * @param PlayerJoinEvent $event
     *
     * @priority       NORMAL
     * @ignoreCanceled false
     */
    public function onSpawn(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $player->teleport($this->level->getSpawn());
    }
    
    public function onDisable(){
        $this->getLogger()->log("[INFO] AlwaysSpawn Unloaded!");
    }
}
?>
