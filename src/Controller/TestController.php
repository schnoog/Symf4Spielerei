<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(Request $request,TranslatorInterface $translator, $locales, $defaultLocale,SessionInterface $session)
    {
        //$cookie = new Cookie('foo', 'bar', strtotime('Wed, 28-Dec-2020 15:00:00 +0100'), '/', 'mysymfony', true, true, true);
/*        $cookie = new Cookie(
            'my_cookie',    // Cookie name.
            'testwert',    // Cookie value.
            time() + ( 2 * 365 * 24 * 60 * 60)  // Expires 2 years.
        );

        $res = new Response();
        $res->headers->setCookie( $cookie );
        $res->send();        
*/
$cookies = $request->cookies->all();

$dump ="<h1>Hallo</h1><pre>" .print_r($cookies['lang'],true). "</pre>";

$dump = $this->getParameter('app_locales');
        //$dump = '';
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'dump' => $dump , 
        ]);
    }
}
