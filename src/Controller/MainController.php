<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(TranslatorInterface $translator, $locales, $defaultLocale)
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
