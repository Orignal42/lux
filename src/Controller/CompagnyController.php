<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompagnyController extends AbstractController
{
    /**
     * @Route("/compagny", name="compagny")
     */
    public function index(): Response
    {
        return $this->render('compagny/index.html.twig', [
            'controller_name' => 'CompagnyController',
        ]);
    }
}
