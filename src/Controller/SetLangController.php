<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class SetLangController extends AbstractController
{
    /**
     * @Route("/setlang/{slug}", name="set_lang")
     */
    public function index($slug = "", Request $request,TranslatorInterface $translator, $locales, $defaultLocale,SessionInterface $session)
    {
        $this->session = $session;
        $changed  = false;
        $allowedlangs = $this->getParameter('app_locales');
        $langs = explode('|',$allowedlangs);
        if(strlen($slug)>1){
            if(in_array($slug,$langs)){
                $this->session->set('_locale', $slug);
                $changed = true;

                $cookie = new Cookie(
                    'lang',    // Cookie name.
                    $slug,    // Cookie value.
                    time() + ( 2 * 365 * 24 * 60 * 60)  // Expires 2 years.
                );
        
                $res = new Response();
                $res->headers->setCookie( $cookie );
                $res->send();        
        









            }
        }
        
//        $dumpdata = '<pre>'. print_r($session,true) . '</pre>' .'<hr>' . '<pre>'. print_r($request,true) . '</pre>' ;
$dumpdata="";
        return $this->render('set_lang/index.html.twig', [
            'controller_name' => 'SetLangController',
                'dump' => $dumpdata ,
                'changed' => $changed

            
        ]);
    }

    private $session;

}
