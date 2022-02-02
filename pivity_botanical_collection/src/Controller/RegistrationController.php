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

class RegistrationController extends AbstractController
{

    private string $message = "";

    #[Route('/registration', name: 'registration')]
    public function index(): Response
    {
        return $this->render('registration/index.html.twig', [
            'controller_name' => 'RegistrationController',
            'message' => $this->message,
        ]);
    }

    #[Route('/admRegistration', name: 'admRegistration')]
    public function institutionRegistration(Request $request, ManagerRegistry $doctrine): Response
    {
        $institutionName = $request->request->get('institution');
        $laboratory = $request->request->get('laboratory');
        $username = $request->request->get('username');
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $confirm = $request->request->get('confirm');

        // Get university from database with the name that user gives 
        $checkInstitutionDatabase = InstitutionRepository::findInstitutionByName($doctrine, $institutionName);

        $laboratoriesArray = [];

        if($checkInstitutionDatabase){            

            foreach ($checkInstitutionDatabase as $db){

                array_push($laboratoriesArray, $db->getLaboratory());

            }          

        }

        if(!in_array($laboratory, $laboratoriesArray) || $checkInstitutionDatabase == false){

            // Create a new institution
            $institution = new Institution($institutionName, $laboratory);

            // save new institution in database
            InstitutionRepository::createInstitution($doctrine, $institution);

            $institution_id = $institution->getId();

            return $this->userAdmRegistration($doctrine, $username, $email, $password, $institution_id);

        }else{
            
            $this->message = "This laboratory is already registered!";

            return $this->render('registration/index.html.twig', [
                'controller_name' => 'RegistrationController',
                'message' => $this->message,
            ]);
        }
        
    }

    public function userAdmRegistration($doctrine, $username, $email, $password, $institution_id): Response
    {   

        $checkUserDB = UserRepository::findUserByEmail($doctrine, $email);

        if(!$checkUserDB){

            // create a new user
            $user = new User($username, $email, $password, 1, 0, $institution_id);

            // save new user in database
            UserRepository::createUser($doctrine, $user);

            $this->message = "Welcome to PBC!";

            return $this->render('registration/index.html.twig', [
                'controller_name' => 'RegistrationController',
                'message' => $this->message,
            ]);
        }

        $this->message = "This email is already registered in PBC!";

        return $this->render('registration/index.html.twig', [
            'controller_name' => 'RegistrationController',
            'message' => $this->message,
        ]);
        
    }
}
