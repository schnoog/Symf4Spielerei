<?php

namespace App\Menu;


use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class MenuBuilder
{
    private $factory;
    private $security;
    private $params;

    public function __construct(FactoryInterface $factory , Security $security, ParameterBagInterface $params)
    {
        $this->factory = $factory;
        $this->security = $security;
        $this->params = $params;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//          CREATE MAIN MENU
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////+++ createUserNemu
    public function createMainMenu(RequestStack $requestStack)
    {
        $subs = "";
        if ($this->security->isGranted('ROLE_ADMIN')) {
            $subs = "-Admin";
        }
        $loggedin = false;
        if ($this->security->isGranted('ROLE_USER')) {
            $loggedin = true;
        }

        $menu = $this->factory->createItem('root');
        //$menu->setExtra('class',"navbar-nav");
        $menu->setChildrenAttribute('class', 'navbar-nav mr-auto');

        //$tmp = $this->get('security.context')->getToken()->getUser();

                    $menu->addChild(
                        'texting',
                        [
                            'labelAttributes' => [
                                'class' => 'class3 class4',
                            ],
                        ]
                    );

                                $dropdown = $menu->addChild(
                                    'Application-Menu' . $subs,
                                    [
                                        'attributes' => [
                                            'dropdown' => true,
                                        ],
                                    ]
                                );

                                $dropdown->addChild(
                                    'Level1',
                                    [
                                        'route' => 'main',
                                        'attributes' => [
                                            'divider_append' => true,
                                        ],
                                    ]
                                );

                                $dropdown->addChild(
                                    'Text only',
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
                                    'Level 2',
                                    [
                                        //'route' => 'fos_user_registration_register',
                                        'uri' => 'http://idiotenpara.de',
                                        'attributes' => [
                                            'divider_prepend' => true,
                                            'icon' => 'fa fa-sign-out',
                                        ],
                                    ]
                                );
        return $menu;
    }
/////--- createMainMenu
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//          CREATE USER MENU
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////+++ createUserNemu
public function createUserMenu(RequestStack $requestStack)
{
    $subs = "";
    if ($this->security->isGranted('ROLE_ADMIN')) {
        $subs = "-Admin";
    }
    $loggedin = false;
    if ($this->security->isGranted('ROLE_USER')) {
        $loggedin = true;
    }

    $menu = $this->factory->createItem('root');
    $menu->setChildrenAttribute('class', 'navbar-nav ml-auto ');
                    $menu->addChild(
                        'texting',
                        [
                            'labelAttributes' => [
                                'class' => 'class3 class4',
                            ],
                        ]
                    );
                    if($loggedin){
                            $dropdown = $menu->addChild(
                                'Hello Me' . $subs,
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
                                        'icon' => 'fas fa-id-card',
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
                                        'icon' => 'fas fa-sign-out-alt',
                                        
                                    ],

                                ]
                            );
                    }else{
                            $dropdown = $menu->addChild(
                                'Hello Guest' . $subs,
                                [
                                    'attributes' => [
                                        'dropdown' => true,
                                    ],
                                ]
                            );

                            $dropdown->addChild(
                                'Login',
                                [
                                    'route' => 'fos_user_security_login',
                                    'attributes' => [
                                        'divider_append' => true,
                                        'icon'  => 'fas fa-sign-in-alt',
                                    ],
                                ]
                            );

                            $dropdown->addChild(
                                'New here?',
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
                                'Register',
                                [
                                    'route' => 'fos_user_registration_register',
                                    'attributes' => [
                                        'divider_prepend' => true,
                                        'icon' => 'fas fa-user-plus',
                                    ],
                                ]
                            );
                    }//endif logged in
    return $menu;
}
/////--- createUserMenu
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//          CREATE LiveOn MENU
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////+++ createLiveOnNemu
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
        $menu->addChild($extras);
        /**  end of Live ON menu  **/
        return $menu;
    }
/////--- createLiveOnMenu
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//          CREATE LANG MENU
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////+++ createLangNemu
public function createLangMenu(RequestStack $requestStack)
{
    $menu = $this->factory->createItem('root');
    $menu->setChildrenAttribute('class', 'navbar-nav mr-auto');
                $menu->addChild(
                    'Languages',
                    [
                        'labelAttributes' => [
                            'class' => 'class3 class4',
                        ],
                    ]
                );
                            $dropdown = $menu->addChild(
                                'Languages' ,
                                [
                                    'attributes' => [
                                        'dropdown' => true,
                                    ],
                                ]
                            );
        $allowedlangs = $this->params->get('app_locales');
        $langs = explode('|',$allowedlangs);
                    for($x=0;$x<count($langs);$x++){
                        $lang = $langs[$x];

                            $dropdown->addChild(
                                 $lang,
                                [
                                    'uri' => 'setlang/'. $lang,
                                    'label' => $lang,
                                    'icon' => 'flag-icon-' . $lang,
                                    'attributes' => [
                                        'divider_append' => false,
                                        'icon' => 'flag-icon-'.$lang,
                                         
                                    ],
                                ]
                            )
                            ->setExtra('translation_domain', 'messages');

                    }
///////////////////////////
    return $menu;
}
/////--- createLangMenu
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//          CREATE XXX MENU
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




}