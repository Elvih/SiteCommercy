<?php
namespace App\Controller;

use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EcoleController extends AbstractController
{

    /**
     * @Route("/Ecole", name="ecole")
     * @return Response
     */
    public function index(EvenementRepository $repository): Response
    {

        $evenement = $repository->findEcole();
        
        return $this->render('pages/ecole.html.twig',[
            'current_menu' => 'ecole',
            'evenements' => $evenement
        ]);
    }
    

}