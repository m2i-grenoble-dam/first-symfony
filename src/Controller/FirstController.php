<?php
 
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController {

    #[Route("/test")]
    public function test() {
        return $this->render("first.html.twig", [
            "variable" => "From PHP",
            "isOk" => true
        ]);
    }
}