<?php
namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminEvenementController extends AbstractController{

    /**
     * @var $repository
     */
    private $repository;

    public function __construct(EvenementRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/admin", name="index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $evenements =$this->repository->findAll();
        return $this->render('admin/index.html.twig', compact('evenements'));
    }

    /**
    * @Route("/admin/creer", name="admin.new")
    *
    */
    public function new(Request $request)
    {
        $evenements = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenements);
        $form -> handleRequest($request);

        if($form->isSubmitted() && $form ->isValid() ){
            $this->em->persist($evenements);
            $this->em->flush();
            $this->addFlash('success','Bien créer avec succès');
            return $this->redirectToRoute('index');
        }
                return $this->render('admin/new.html.twig',[
            'form' =>$form->createView()
        ]);
        
    }

    /**
     * @Route("/admin/{id}", name="admin.edit", methods="GET|POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request)
    {
        return $this->render('admin/edit.html.twig');
    }

    /**
     * @Route("/admin/{id}", name="admin.delete", methods="DELETE")
     * @param 
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request)
    {

        return $this->redirectToRoute('index');
    }

}