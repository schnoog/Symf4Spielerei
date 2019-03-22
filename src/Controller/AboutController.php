<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatorInterface;

class AboutController extends AbstractController
{
    /**
     * @Route("/", name="about")
     */
    public function index(TranslatorInterface $translator, $locales, $defaultLocale)
    {
        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }
}
