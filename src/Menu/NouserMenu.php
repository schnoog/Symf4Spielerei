<?php
// src/Menu/FirstMenu.php

namespace App\Menu;

use Pd\MenuBundle\Builder\ItemInterface;
use Pd\MenuBundle\Builder\Menu;
use Symfony\Component\DependencyInjection\ContainerInterface;

class NouserMenu extends Menu
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
            ->setChildAttr(['data-parent' => 'main', 'class' =>'pd-menu navbar-nav ml-auto']); // Add Parent Menu to Html Tag
            

        $menu->addChild("Login / Sign-Up",5)
                ->setLabel("Login / Signup")
                ->setRoute("fos_user_security_login")
                ->setRoles(['IS_AUTHENTICATED_ANONYMOUSLY'])
                ->setLinkAttr(['class' => "dropdown-menu dropdown-menu-right"])
                    ->addChild('Login', 6)
                    ->setLabel('Login')
                    ->setRoute('fos_user_security_login')
                    ->setRoles(['IS_AUTHENTICATED_ANONYMOUSLY'])                

                    ->addChildParent('Register', 7)
                    ->setLabel('Register')
                    ->setRoute('fos_user_registration_register')
                    ->setRoles(['IS_AUTHENTICATED_ANONYMOUSLY']);   


        return $menu;
    }
}