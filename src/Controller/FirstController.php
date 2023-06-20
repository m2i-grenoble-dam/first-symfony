<?php
 
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController {

    
    
    /**
     * Dans les contrôleurs, on définit nos routes via des annotation. Cela indique au routeur de symfony que lorsque
     * l'on entrera l'url localhost:8000/test par exemple, alors la méthode définit sous la route sera lancée et le client
     * recevra le résultat de cette méthode.
     */
    #[Route("/test")]
    public function test() {
        /**
         * Ici la méthode fait un render (car on utilise twig), ce qui signifie que symfony va interpréter le fichier
         * twig indiqué en paramètre et renvoyé en réponse HTTP le HTML généré par ce template
         */
        return $this->render("first.html.twig", [
            "variable" => "From PHP",
            "isOk" => true
        ]);
    }

    /**
     * Les routes peuvent être "paramétrées" en utilisant les {param} dans l'url, la valeur qui sera entrée
     * dans l'url lorsqu'on accède à la route sera récupérable dans un paramètre de la fonction avec le même nom, 
     * donc si on a mis "/truc/{param}" comme route, alors on pourra y accéder via localhost:8000/truc/valeur ou localhost:8000/truc/machin ou autre
     * et "valeur" ou "machin" ou autre seront accessible dans un paramètre $param de la méthode
     */
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

    #[Route("/form-example")]
    public function formExample(Request $request) {
        dump($request->request->all());
        return $this->render('form-example.html.twig');
    }

}