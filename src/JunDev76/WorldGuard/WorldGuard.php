<?php

/*
       _             _____           ______ __
      | |           |  __ \         |____  / /
      | |_   _ _ __ | |  | | _____   __ / / /_
  _   | | | | | '_ \| |  | |/ _ \ \ / // / '_ \
 | |__| | |_| | | | | |__| |  __/\ V // /| (_) |
  \____/ \__,_|_| |_|_____/ \___| \_//_/  \___/


This program was produced by JunDev76 and cannot be reproduced, distributed or used without permission.

Developers:
 - JunDev76 (https://github.jundev.me/)

Copyright 2022. JunDev76. Allrights reserved.
*/

namespace JunDev76\WorldGuard;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class WorldGuard extends PluginBase implements Listener{

    protected function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onBreak(BlockBreakEvent $ev) : void{
        $block = $ev->getBlock();
        $player = $ev->getPlayer();
        if(Server::getInstance()->isOp($player->getName()) || str_starts_with($block->getPosition()->getWorld()->getFolderName(), 'Islands.')){
            return;
        }

        $ev->cancel();
    }

    public function onPlace(BlockPlaceEvent $ev) : void{
        $block = $ev->getBlock();
        $player = $ev->getPlayer();
        if(Server::getInstance()->isOp($player->getName()) || str_starts_with($block->getPosition()->getWorld()->getFolderName(), 'Islands.')){
            return;
        }

        $ev->cancel();
    }

    public function onInteract(PlayerInteractEvent $ev) : void{
        $block = $ev->getBlock();
        $player = $ev->getPlayer();
        if(Server::getInstance()->isOp($player->getName()) || str_starts_with($block->getPosition()->getWorld()->getFolderName(), 'Islands.')){
            return;
        }

        $ev->cancel();
    }

}