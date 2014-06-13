<?php

namespace AlwaysSpawn;

use pocketmine\plugin\PluginBase;
//use pocketmine\command\Command;
//use pocketmine\command\CommandExecutor;
//use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\entity\Entity;
use pocketmine\Player;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->log("[INFO] AlwaysSpawn Loaded!");
    }
    
    //public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        //switch($cmd->getName()){
            //case "alwaysspawn":
                //if($args[0] == "set"){
                    //TODO Set position in config
                //}elseif($args[0] == "location"){
                    //TODO Show player his/her location
                //}else{
                    //$sender->sendMessage("[AlwaysSpawn] Command Not Found!");
                    //$sender->sendMessage("Usage: /alwaysspawn <set|location>");
                //}
            //break;
     //}
    
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
