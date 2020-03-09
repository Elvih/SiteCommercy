<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActuController extends AbstractController
{

    /**
     * @Route("/Actualite", name="actu")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('pages/actu.html.twig',[
            'current_menu' => 'actu'
        ]);
    }
    

}