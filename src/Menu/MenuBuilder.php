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


        $menu = $this->factory->createItem('root');
        //$menu->setExtra('class',"navbar-nav");
        $menu->setChildrenAttribute('class', 'navbar-nav mr-auto');

$menu->addChild(
    'texting',
    [
        'labelAttributes' => [
            'class' => 'class3 class4',
        ],
    ]
);

$dropdown = $menu->addChild(
    'Hello Me',
    [
        'attributes' => [
            'dropdown' => true,
        ],
    ]
);

$dropdown->addChild(
    'Profile',
    [
        'route' => 'fos_user_profile_show',
        'attributes' => [
            'divider_append' => true,
        ],
    ]
);

$dropdown->addChild(
    'text',
    [
        'attributes' => [
            'icon' => 'fa fa-user-circle',
        ],
        'labelAttributes' => [
            'class' => ['class1', 'class2'],
        ],
    ]
);

$dropdown->addChild(
    'Logout',
    [
        'route' => 'fos_user_security_logout',
        'attributes' => [
            'divider_prepend' => true,
            'icon' => 'fa fa-sign-out',
        ],
    ]
);


///////////////////////////
        return $menu;
    }


    public function createLiveOnMenu(RequestStack $requestStack)
    {
        
        $factory = $this->factory;

        $menu = $factory->createItem('root', [
            'childrenAttributes' => [
                'class' => 'navbar-nav mr-auto'
            ]
        ]);

        /**  Live ON menu  **/

        $additional_pages = $factory->createItem('Additional pages', [
            'route' => 'test',
            'childrenAttributes' => [
                'class' => 'nav child_menu',

            ]
        ]);
        
$additional_pages->setAttribute('icon', 'fa fa-bug');

/*        $additional_pages->setAttribute('icon', 'fa fa-bug');
        $additional_pages->setAttribute('id', "navbarDropdown");
        $additional_pages->setAttribute('role', "button");
        $additional_pages->setAttribute('data-toggle', "dropdown");        
*/
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
            'route' => 'main',
            'childrenAttributes' => [
                'class' => 'nav child_menu'
            ]
        ]);
        $extras->setAttribute('icon', 'fa fa-windows');
        $extras->setAttribute('id', "navbarDropdown");
        $extras->setAttribute('role', "button");
        $extras->setAttribute('data-toggle', "dropdown");   
        $extra1 = $factory->createItem('Extra1', [
            'route' => 'test'
        ]);

        $extras->addChild($extra1);


//        $menu->addChild($extras);


        /**  end of Live ON menu  **/

        return $menu;
    }

}