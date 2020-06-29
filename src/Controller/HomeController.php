<?php
    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Request;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use App\Form\NewsletterFormType;
    use App\Entity\NewsletterUsers;

    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;

    class HomeController extends AbstractController{

        /**
         * @Route("/", name="Hone_page")
         */
        public function AddUserToNewsletter(Request $request)
        {
            $email = new NewsletterUsers();
            $form = $this->createForm(NewsletterFormType::class, $email, [
                'action' => $this->generateUrl('Hone_page')
            ]);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $en = $this->getDoctrine()->getManager();

                $en->persist($email);
                $en->flush();
            }
            return $this->render('home/index.html.twig', [
                'form' => $form->createView()
            ]);
        }
    }