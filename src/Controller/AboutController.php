<?php

// Krzysztof Lewiarz

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AboutController extends AbstractController{

    /**
     * @Route("/about")
     */
    public function index() {
        return $this->render('about/index.html.twig');
    }

}