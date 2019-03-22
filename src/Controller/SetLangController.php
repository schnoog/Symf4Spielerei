<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SetLangController extends AbstractController
{
    /**
     * @Route("/setlang/{slug}", name="set_lang")
     */
    public function index($slug = "", Request $request,TranslatorInterface $translator, $locales, $defaultLocale,SessionInterface $session)
    {
        $this->session = $session;
        $changed  = false;
        if(strlen($slug)>1){
                $this->session->set('_locale', $slug);
                $changed = true;
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
