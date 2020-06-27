<?php
    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class HomeController extends AbstractController{

        /**
         * @Route("/")
         */
        public function index() {
            return $this->render('home/index.html.twig');
        }
        
    }