<?php

// Gabriel Radzięta

namespace App\Controller;

use App\Entity\NewsletterUsers;
use App\Entity\Newsletter;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class MailerController extends AbstractController
{
    /**
     * @Route("/admin/newsletter/send", name="newsletter_send")
     */
    public function sendEmail(MailerInterface $mailer, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Newsletter::class);

        $id = $request->query->get('id');
        $entity = $repository->find($id);
        $content = $entity->getContent();
        
        $users = $this->getDoctrine()->getRepository(NewsletterUsers::class)->findAll();

        foreach ($users as $value) {
            $emailValue = $value->getEmail();

            $email = (new Email())
            ->from('symfonytest11@gmail.com')
            ->to($emailValue)
            ->subject('Newsletter update')
            ->html($content);

            $mailer->send($email);
        } 
        

        return $this->redirectToRoute('easyadmin', [
            'action' => 'list',
            'entity' => $request->query->get('entity'),
        ]);
    }
}