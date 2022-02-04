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
    public function loginValidation(Request $request, ManagerRegistry $doctrine): Response
    {

        $email = $request->request->get('email');
        $password = $request->request->get('password');

        if($email && $password){

            $userDb = UserRepository::findUserByEmail($doctrine, $email);

            if($userDb && $userDb[0]->getPassword() == $password){

                var_dump($userDb[0]->getPassword());

                $userDb[0]->setOnline(1);

                UserRepository::changeOnlineStatus($doctrine, $userDb);

                return $this->render('user_space/index.html.twig', [
                    'controller_name' => 'UserSpaceController',
                ]);

            }elseif($userDb && $userDb[0]->getPassword() !== $password){

                $this->message = "Email or password is not correct!";

                return $this->render('login/index.html.twig', [
                'controller_name' => 'LoginController',
                'message' => $this->message,
                ]);
                
            }

            $this->message = "You are not registered in PBC!";

            return $this->render('login/index.html.twig', [
                'controller_name' => 'LoginController',
                'message' => $this->message,
            ]);

        }
        
    }

}
