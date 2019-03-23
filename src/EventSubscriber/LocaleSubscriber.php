<?php

// src/EventSubscriber/LocaleSubscriber.php
namespace App\EventSubscriber;


use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class LocaleSubscriber implements EventSubscriberInterface
{
    private $defaultLocale;
    protected $container;
    private $params;

    public function __construct($defaultLocale = 'en', ParameterBagInterface $params)
    {
        $this->defaultLocale = $defaultLocale;
        $this->params = $params;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return;
        }
        $cookies = $request->cookies->all();
        if(isset($cookies['lang'])){

        }

        // try to see if the locale has been set as a _locale routing parameter
        if ($locale = $request->attributes->get('X_locale')) {
            $request->getSession()->set('_locale', $locale);
        } else {
            // if no explicit locale has been set on this request, use one from the session
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));


            $cookies = $request->cookies->all();
            if(isset($cookies['lang'])){
                //print_r($this);
                $allowedlangs = $this->params->get('app_locales');
                $langs = explode('|',$allowedlangs);
                //$langs=array();
                if(in_array($cookies['lang'],$langs)) $request->setLocale($cookies['lang']);
            }
    



        }
    }

    public static function getSubscribedEvents()
    {
        return [
            // must be registered before (i.e. with a higher priority than) the default Locale listener
            KernelEvents::REQUEST => [['onKernelRequest', 20]],
        ];
    }
}