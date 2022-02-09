<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Project;
use App\Repository\ProjectRepository;

class ProjectsController extends AbstractController
{
    private string $message = "";
    #[Route('/projects', name: 'projects')]
    public function index(): Response
    {
        return $this->render('projects/index.html.twig', [
            'controller_name' => 'ProjectsController',
        ]);
    }

    #[Route('/createProject', name: 'createProject')]
    public function createProject(Request $request, ManagerRegistry $doctrine): Response
    {
        $name = $request->request->get('projectName');
        $coordinator = $request->request->get('coordinator');
        $fundingInstitution = $request->request->get('funding');

        var_dump($name, $coordinator, $fundingInstitution);

        $project = new Project($name, $coordinator, $fundingInstitution, 1);

        ProjectRepository::createProject($doctrine, $project);

        return $this->render('projects/index.html.twig', [
            'controller_name' => 'ProjectsController',
        ]);
    }
}
