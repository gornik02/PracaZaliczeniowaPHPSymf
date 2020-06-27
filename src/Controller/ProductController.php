<?php
    namespace App\Controller;

    use App\Entity\Product;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class ProductController extends AbstractController{

        /**
         * @Route("/products")
         */
        public function index() {
            $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

            return $this->render('products/index.html.twig', array(
                'products' => $products
            ));
        }
        
    }