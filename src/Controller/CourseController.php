<?php

namespace App\Controller;

use App\Entity\Course;
use App\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
    
    #[Route("/course/{id}")]
    public function one(int $id, CourseRepository $repo):Response {
        $course = $repo->findById($id);
        if($course == null) {
            throw new NotFoundHttpException("No course found with this id");
        }

        return $this->render('course/single-course.html.twig', [
            'course' => $course
        ]);
    }
    
    #[Route("/add-course")]
    public function add(CourseRepository $repo, Request $request):Response {
        $formData = $request->request->all();
        //Si le formulaire a été submit et donc contient des données
        if(!empty($formData)) {
            //alors on fait le persist avec les valeurs du formulaire maintenant que je suis sûr qu'il a été submit
            $course = new Course($formData['title'],$formData['content'], new \DateTime(), $formData['subject']);
            $repo->persist($course);
            //pourquoi pas faire une petite redirection vers la page du course que l'on vient de créer une fois persisté
            return $this->redirect('/course/'.$course->getId());
        }
        return $this->render('course/add-course.html.twig', [
        ]);
    }
        
    #[Route("/update-course/{id}")]
    public function update(int $id, CourseRepository $repo, Request $request):Response {
        $course = $repo->findById($id);
        if($course == null) {
            throw new NotFoundHttpException("No course found with this id");
        }
        $formData = $request->request->all();
        if(!empty($formData)) {
            $course->setTitle($formData['title'])
                    ->setSubject($formData['subject'])
                    ->setContent($formData['content']);

            $repo->update($course);
        }

        return $this->render('course/update-course.html.twig', [
            'course' => $course
        ]);
    }
    
    #[Route("/remove-course/{id}")]
    public function remove(int $id, CourseRepository $repo):Response {
        $repo->delete($id);

        return $this->redirect('/course');
    
    }
}
