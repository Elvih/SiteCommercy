<?php
namespace App\Controller;

use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{

    /**
     * @Route("/Festivite", name="event")
     * @return Response
     */
    public function index(EvenementRepository $repository): Response
    {

        $evenement = $repository->FindFestivite();

        return $this->render('pages/event.html.twig',[
            'current_menu' => 'event',
            'evenements' => $evenement
        ]);
    }
    

}