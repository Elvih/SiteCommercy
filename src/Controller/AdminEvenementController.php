<?php
namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Entity\EvenementSearch;
use App\Form\EvenementSearchType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/admin", name="admin")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request):Response
    {
        
        $evenements =$this->repository->findAll();
        $search = new EvenementSearch();
        $form = $this->createForm(EvenementSearchType::class, $search);
        $form->handleRequest($request);

        return $this->render('admin/index.html.twig',[
            'form' => $form->createView(),
            'evenements' => $evenements
            ]);
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
            return $this->redirectToRoute('admin');
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
    public function edit(Request $request,Evenement $evenements)
    {
        
        $form = $this->createForm(EvenementType::class, $evenements);
        $form -> handleRequest($request);

        if($form->isSubmitted() && $form ->isValid() ){
            $this->em->flush();
            $this->addFlash('success','Bien modifier avec succès');
            return $this->redirectToRoute('admin');
        }
                return $this->render('admin/edit.html.twig',[
            'form' =>$form->createView(),
            'evenements' => $evenements
        ]);
    }

    /**
     * @Route("/admin/{id}", name="admin.delete", methods="DELETE")
     * @param 
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request,Evenement $evenements)
    {
        if($this->isCsrfTokenValid('delete' . $evenements->getId(), $request->get('_token'))){
            $this->em->remove($evenements);
            $this->em->flush();
            $this->addFlash('success','Bien supprimer avec succès');  
            }
            return $this->redirectToRoute('admin');
    }

}