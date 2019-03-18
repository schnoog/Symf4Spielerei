<?php
// src/Menu/FirstMenu.php

namespace App\Menu;

use Pd\MenuBundle\Builder\ItemInterface;
use Pd\MenuBundle\Builder\Menu;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ApplicationMenu extends Menu
{
    /**
     * @var ContainerInterface 
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
        
    /**
     * Override 
     */
    public function createMenu(array $options = []): ItemInterface
    {
        // Create Root Item
        $menu = $this
            ->createRoot('settings_menu', true) // Create event is "settings_menu.event"
            ->setChildAttr(['data-parent' => 'main']); // Add Parent Menu to Html Tag
            

        $menu->addChild('Test1',2)
            ->setLabel('Test1')
            ->setRoute('about');


        // Create Menu Items
        $menu->addChild('CHD1', 1)
            ->setLabel('Application')
            ->setRoute('about')
            ->setLinkAttr(['class' => "dropdown-menu dropdown-menu-left"])
            //->setLinkAttr(['class' => 'nav-item'])
            //->setRoles(['ROLE_USER'])
                // Contact
                ->addChild('Child1', 5)
                ->setLabel('Child1')
                ->setRoute('easyadmin')
                //->setLinkAttr(['class' => 'nav-item'])
                ->setRoles(['ROLE_USER'])


                // Contact
                ->addChildParent('nav_config_contact', 1)
                ->setLabel('MeinSuperTest')
                ->setRoute('easyadmin')
                //->setLinkAttr(['class' => 'nav-item'])
                ->setRoles(['ROLE_USER'])


                // Email
                ->addChildParent('nav_config_email', 10)
                ->setLabel('nav_config_email')
                ->setRoute('easyadmin')
                //->setLinkAttr(['class' => 'nav-item'])
                ->setRoles(['ROLE_USER'])
                // Template
                ->addChildParent('nav_config_template')
                ->setLabel('nav_config_template')
                ->setRoute('easyadmin')
                //->setLinkAttr(['class' => 'nav-item'])
                ->setRoles(['ROLE_USER'])
                // Account
                ->addChildParent('nav_config_user')
                ->setLabel('nav_config_user')
                ->setRoute('easyadmin')
                //->setLinkAttr(['class' => 'nav-item'])
                ->setRoles(['ROLE_USER']);

        return $menu;
    }
}