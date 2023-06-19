<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{
    /**
     * Ici on indique le CourseRepository directement en argument de la méthode, ça signifie que Symfony va
     * vérifier s'il sait faire une instance de cette classe et si oui la fera automatiquement sans qu'on ait besoin
     * de faire de new (pour cette classe là ça n'a pas un intérêt incroyable, mais pour d'autres cas, c'est obligatoire
     * de procéder de cette manière). C'est ce qu'on appelle "L'injection de dépendance"
     */
    #[Route('/course', name: 'app_course')]
    public function index(CourseRepository $repo): Response
    {
        dump($repo->findAll()); //Un genre de var_dump "amélioré" qui affiche les informations dans la console symfony, ne marche qu'avec twig
        return $this->render('course/index.html.twig', [
            'courses' => $repo->findAll()
        ]);
    }
}
