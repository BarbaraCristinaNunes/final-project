<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubprojectsController extends AbstractController
{
    #[Route('/subprojects', name: 'subprojects')]
    public function index(): Response
    {
        return $this->render('subprojects/index.html.twig', [
            'controller_name' => 'SubprojectsController',
        ]);
    }
}
