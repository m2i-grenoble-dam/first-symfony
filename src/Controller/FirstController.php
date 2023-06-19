<?php
 
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController {

    
    

    #[Route("/test")]
    public function test() {
        return $this->render("first.html.twig", [
            "variable" => "From PHP",
            "isOk" => true
        ]);
    }

    #[Route("/example/{name}")]
    public function paramExample(string $name) {
        
        return  new Response("Bonjour ".$name);
    }


    #[Route("/exo-twig")]
    public function exoTwig() {
        $names = ["Name 1", "Name 2", "Name 3", "Name 4"];

        return $this->render("exo-twig.html.twig", [
            "names" => $names
        ]);
    }

}