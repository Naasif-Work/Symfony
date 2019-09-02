<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        $this->addFlash('info','some info');

        if ($form->isSubmitted() && $form->isValid()){
            $contactFormData = $form->getData();
            dump($contactFormData);

            $message = (new \Swift_Message('you got mail'))
                ->setFrom($contactFormData['email'])
                ->setTo('poyoc@doc-mail.net')
                ->setBody(

                    $contactFormData['message'],
                    'text/html'
                );

            $mailer->send($message);
            $this->addFlash('success','message was sent');
        }

        return $this->render('contact/contact.html.twig',[
           'our_form' => $form->createView()

       ]);
    }
}
