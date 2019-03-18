<?php
// src/Listener/MenuListener.php

namespace App\Listener;

use Pd\MenuBundle\Event\PdMenuEvent;


class MenuListener
{
    public function onCreate(PdMenuEvent $event)
    {
        // Get Menu Items
        $menu = $event->getMenu();

        // Add New Item
        $menu->addChild('demo_item', 5)
            ->setLabel('Home Page')
            ->setRoute('main');
    }
}