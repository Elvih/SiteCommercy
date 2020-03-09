<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{

    /**
     * @Route("/Produit", name="produit")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('pages/produit.html.twig',[
            'current_menu' => 'produit'
        ]);
    }
    

}