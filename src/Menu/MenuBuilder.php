<?php

namespace App\Menu;


use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $factory = $this->factory;

        $menu = $factory->createItem('root', [
            'childrenAttributes' => [
                'class' => 'nav side-menu'
            ]
        ]);

        /**  HOME menu  **/

        $home = $factory->createItem('Home', [
            'route' => 'main',
            'childrenAttributes' => [
                'class' => 'nav child_menu'
            ]
        ]);
        $home->setAttribute('icon', 'fa fa-home');
        $home->setLabel('Sonicht');

        $menu->addChild($home);

//        leave it here as a reminder

//        $menu['Home']->setLabel('Главная');
//        $menu['Home']->setAttribute('id', 'menu_admin_pages');
//        $menu['Home']->setAttribute('class', 'submenu');


        $dashboard = $factory->createItem('Dashboard', [
            'route' => 'test'
        ]);


        $dashboard1 = $factory->createItem('Empty page', [
            'route' => 'main'
        ]);

        $dashboard2 = $factory->createItem('Dashboard2', [
            'route' => 'about'
        ]);

        $home->addChild($dashboard);
        $home->addChild($dashboard1);
        $home->addChild($dashboard2);

        /**  end of HOME menu  **/

        return $menu;
    }

    public function createLiveOnMenu(RequestStack $requestStack)
    {
        $factory = $this->factory;

        $menu = $factory->createItem('root', [
            'childrenAttributes' => [
                'class' => 'nav side-menu'
            ]
        ]);

        /**  Live ON menu  **/

        $additional_pages = $factory->createItem('Additional pages', [
            'route' => 'e-commerce',
            'childrenAttributes' => [
                'class' => 'nav child_menu'
            ]
        ]);
        $additional_pages->setAttribute('icon', 'fa fa-bug');

        $dashboard = $factory->createItem('E-commerce', [
            'route' => 'main'
        ]);


        $dashboard1 = $factory->createItem('Empty page', [
            'route' => 'main'
        ]);

        $dashboard2 = $factory->createItem('Dashboard2', [
            'route' => 'main'
        ]);

        $additional_pages->addChild($dashboard);
        $additional_pages->addChild($dashboard1);
        $additional_pages->addChild($dashboard2);

        $menu->addChild($additional_pages);

        $extras = $factory->createItem('Extras', [
            'route' => 'e-commerce',
            'childrenAttributes' => [
                'class' => 'nav child_menu'
            ]
        ]);
        $extras->setAttribute('icon', 'fa fa-windows');

        $extra1 = $factory->createItem('Extra1', [
            'route' => 'extra1'
        ]);

        $extras->addChild($extra1);


        $menu->addChild($extras);


        /**  end of Live ON menu  **/

        return $menu;
    }

}