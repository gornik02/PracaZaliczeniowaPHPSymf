<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    use Symfony\Component\Mailer\MailerInterface;
    use Symfony\Component\Mime\Email;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;

    class ContactController extends AbstractController{

        /**
         * @Route("/contact", name="contact_form")
         */
        public function send(Request $request, MailerInterface $mailer)
        {
            $form = $this->createFormBuilder()
                ->add('name', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('email', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('subject', TextType::class, array('attr' => array('class' => 'form-control')))
                ->add('message', TextareaType::class, array('attr' => array('class' => 'form-control')))
                ->add('submit', SubmitType::class, [
                    'label' => 'Send me',
                    'attr'  => [
                        'class' => 'btn btn-primary'
                    ]
                ])
                ->getForm();
    
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
    
                $name = $form->getData()['name'];
                $email = $form->getData()['email'];
                $subject = $form->getData()['subject'];
                $message = $form->getData()['message'];

                $mail = (new Email())
                ->from('symfonytest11@gmail.com')
                ->to('symfonytest11@gmail.com')
                ->subject($subject)
                ->html("
                    <h2>From: $name</h2>
                    <h3>Email: $email</h3>
                    <p>$message</p>
                ");
    
                $mailer->send($mail);
            }
    
            return $this->render('contact/index.html.twig', [
                'form' => $form->createView()
            ]);
        }
    }