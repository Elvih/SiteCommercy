<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{

    /**
     * @Route("/Contact", name="contact")
     * @return Response
     */
    public function index(Request $request,ContactNotification $notification): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notify($contact);              
            $this->addFlash('success', 'Votre email à bien été envoyé');     
            return $this->redirectToRoute('contact');                    
        }
        

        return $this->render('pages/contact.html.twig',[
            'current_menu' => 'contact',
            'form' =>$form->createView()

        ]);
        
    }
}