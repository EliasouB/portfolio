<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request,MailerInterface $mailer)
    {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();
            $email = (new Email())
            ->from($contact->getEmail())
            ->to('elias.bouabdellah@gmail.com')
            ->subject('[Portfolio] Demande de contact')
            ->html($this->renderView('mail/contact.html.twig', ['contact' => $contact]));

            $mailer->send($email);
            $this->addFlash('success', "Demande de contact bien envoyée !");
            return $this->redirectToRoute('contact');
        }

        
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
   
}
