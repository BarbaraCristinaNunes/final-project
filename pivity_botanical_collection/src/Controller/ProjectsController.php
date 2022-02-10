<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Project;
use App\Repository\ProjectRepository;

class ProjectsController extends AbstractController
{
    private string $message = "";
    private array $projectObjects = [];

    #[Route('/projects', name: 'projects')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $projects = ProjectRepository::readAllProjects($doctrine);

        if($projects){
            var_dump($projects[0]->getName());
            $this->projectObjects = $projects;

            return $this->render('projects/index.html.twig', [
                'controller_name' => 'ProjectsController',
                'message' => $this->message,
                'projects' => $this->projectObjects,
            ]);
        }

        return $this->render('projects/index.html.twig', [
            'controller_name' => 'ProjectsController',
            'message' => $this->message = "You have no projects yet!",
            'projects' => $this->projectObjects,
        ]);
    }

    #[Route('/createProject', name: 'createProject')]
    public function projectValidation(Request $request, ManagerRegistry $doctrine): RedirectResponse
    {
        $name = $request->request->get('projectName');
        $coordinator = $request->request->get('coordinator');
        $fundingInstitution = $request->request->get('funding');

        var_dump($name, $coordinator, $fundingInstitution);

        $project = new Project($name, $coordinator, $fundingInstitution, 1);

        $projectsDb = ProjectRepository::findProjectByName($doctrine, $name);

        $projectsName = [];

        if($projectsDb){

            foreach($projectsDb as $projectDb){

                array_push($projectsName, $projectDb->getName());

            }
        }
        var_dump($projectsName);

        if(!in_array($name, $projectsName)){
            
            $this->createProject($doctrine, $project);
                      
        }

        // $this->message = '<script>alert("There is this project already!")</script>';

        return $this->redirectToRoute('projects');
    }

    public function createProject($doctrine, $project): RedirectResponse
    {
        ProjectRepository::createProject($doctrine, $project);
        return $this->redirectToRoute('projects');  
    }
}
