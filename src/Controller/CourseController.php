<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{
    #[Route('/course', name: 'app_course')]
    public function index(CourseRepository $repo): Response
    {
        dump($repo->findAll()); //Un genre de var_dump "amélioré" qui affiche les informations dans la console symfony, ne marche qu'avec twig
        return $this->render('course/index.html.twig', [
            'controller_name' => 'CourseController',
        ]);
    }
}
