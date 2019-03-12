<?php

namespace App\Controller;

use App\Entity\Contact;
//use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {

        $contact = new Contact();
        $form = $this->createFormBuilder($contact)
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('subject', TextType::class)
            ->add('message', TextType::class)
            ->add('send', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form['name']->getData();
            $email = $form['email']->getData();
            $subject = $form['subject']->getData();
            $message = $form['message']->getData();
            $this->addFlash(
                'notice',
                'your message are correctly sent'
            );

            # set form data

            $contact->setName($name);
            $contact->setEmail($email);
            $contact->setSubject($subject);
            $contact->setMessage($message);

            # finally add data in database

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('contact');


        }
        return $this->render('contact/index.html.twig', [
            'formContact' => $form->createView()
        ]);
    }

    /**
     * @Route("/contact/mail", name="mail")
     * @param \Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mail(Request $request, \Swift_Mailer $mailer)
    {
        $form = $request->get('form');
        $surname = $form['name'];
        $email = $form['email'];
        $subject = $form['subject'];
        $message = $form['message'];

        $messageReceive = (new \Swift_Message($subject))
            ->setTo('hlantillon@gmail.com')
            ->setSender('hlantillon@gmail.com')
            ->setReplyTo($email)
            ->setBody(
                $this->renderView(
                // templates/emails/registration.html.twig
                    'contact/confirmation.html.twig',
                    [
                        'name' => $surname,
                        'email' => $email,
                        'message'   => $message
                    ]),
                'text/html'
            );

        $mailer->send($messageReceive);

        return $this->render('contact/confirmation.html.twig', [
            'name'      => $surname,
            'email'     => $email,
            'message'   => $message
        ]);
    }
}

