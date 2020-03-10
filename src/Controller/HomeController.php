<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{


    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(): Response
    {
        setlocale(LC_ALL, 'fr');
        $date_string = strftime('%A %d %B %Y');        
        $heure = strftime('%X');

        return $this->render('pages/home.html.twig',[
            'current_menu' => 'home',
            'today' => $date_string,
            'heure' => $heure
        ]);
    }
    

}