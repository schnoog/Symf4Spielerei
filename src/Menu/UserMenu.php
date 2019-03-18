<?php
// src/Menu/FirstMenu.php

namespace App\Menu;

use Pd\MenuBundle\Builder\ItemInterface;
use Pd\MenuBundle\Builder\Menu;
use Symfony\Component\DependencyInjection\ContainerInterface;


class UserMenu extends Menu
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

        //$tmp = new FOS\UserBundle\Security\UserProvider;
        // Create Root Item
        $menu = $this
            ->createRoot('user_menu', true) // Create event is "settings_menu.event"
            ->setChildAttr(['data-parent' => 'main', 'class' =>'pd-menu navbar-nav ml-auto']); // Add Parent Menu to Html Tag
           
        $menu->addChild("User",6)
                ->setLabel("User")
                ->setRoute("fos_user_profile_show")
                ->setRoles(['ROLE_USER'])
                ->setLinkAttr(['class' => "dropdown-menu dropdown-menu-right"])
               //->setLinkAttr(["' class': 'pd-menu navbar-nav testi ml-auto'"])
                    ->addChild('Profil', 1)
                    ->setLabel('Profil')
                    ->setRoute('fos_user_profile_show')
                    ->setRoles(['ROLE_USER'])                

                    ->addChildParent('Change Password', 2)
                    ->setLabel('Change Password')
                    ->setRoute('fos_user_change_password')
                    ->setRoles(['ROLE_USER'])   

                    ->addChildParent('Administration', 3)
                    ->setLabel('Administration')
                    ->setRoute('easyadmin')
                    ->setRoles(['ROLE_ADMIN'])   

                    ->addChildParent('Logout', 4)
                    ->setLabel('Logout')
                    ->setRoute('fos_user_security_logout')
                    ->setRoles(['ROLE_USER']);                       



        // Create Menu Items


        return $menu;
    }
}