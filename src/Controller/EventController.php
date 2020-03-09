<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{

    /**
     * @Route("/Evenement", name="event")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('pages/event.html.twig',[
            'current_menu' => 'event'
        ]);
    }
    

}