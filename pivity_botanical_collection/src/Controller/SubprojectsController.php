<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Subproject;
use App\Repository\SubprojectRepository;
use App\Repository\ProjectRepository;

class SubprojectsController extends AbstractController
{
    private string $message = "";
    private array $subprojectObjects = [];
    private array $projectObjects = [];

    #[Route('/subprojects', name: 'subprojects')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $subprojects = SubprojectRepository::readAllSubprojects($doctrine);
        $projects = ProjectRepository::readAllProjects($doctrine);

        if($projects){
            $this->projectObjects = $projects;
        }

        if($subprojects){

            $this->subprojectObjects = $subprojects;

            return $this->render('subprojects/index.html.twig', [
                'controller_name' => 'ProjectsController',
                'message' => $this->message,
                'subprojects' => $this->subprojectObjects,
                'projects' => $this->projectObjects,
            ]);
        }

        return $this->render('subprojects/index.html.twig', [
            'controller_name' => 'ProjectsController',
            'message' => $this->message = "You have no subprojects yet!",
            'subprojects' => $this->subprojectObjects,
            'projects' => $this->projectObjects,
        ]);

    }

    #[Route('/createSubproject', name: 'createSubproject')]
    public function createSubproject(ManagerRegistry $doctrine, Request $request,): RedirectResponse
    {
        $subprojectName = $request->request->get('subprojectName');
        $projectId = $request->request->get('project');
        
        var_dump($subprojectName, $projectId);

        $subprojects = SubprojectRepository::findSubprojectByName($doctrine, $subprojectName);
        $projectsId = []; 

        if($subprojects){
            foreach($subprojects as $subproject){
                array_push($projectsId, $subproject->getProjectId());
            }
        }
        var_dump($projectsId);

        if(!in_array($projectId, $projectsId)){

            $subproject = new Subproject($projectId, $subprojectName, 1);
            SubprojectRepository::createSubroject($doctrine, $subproject);

            return $this->redirectToRoute('subprojects');
        }

        return $this->redirectToRoute('subprojects');
         
    }
}
