<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Institution;
use App\Repository\InstitutionRepository;
use App\Entity\User;
use App\Repository\UserRepository;

class LoginController extends AbstractController
{

    private string $message = "";

    #[Route('/login', name: 'login')]
    public function index(): Response
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'message' => $this->message,
        ]);
    }

    #[Route('/userLogin', name: 'userLogin')]
    public function loginValidation(Request $request): Response
    {
        $institution = $request->request->get('institution');
        $laboratory = $request->request->get('laboratory');
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        

        var_dump($institution, $laboratory, $email, $password);

        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'message' => $this->message,
        ]);
    }

}
