<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameWorkExtraBundle\Configuration\Method;

    
    class RmaOrderController extends AbstractController
    {
        /**
         * @Route("/")
         */
        public function index(){
            $orders = ['Order 1','Order 2'];
            return $this->render('articles/index.html.twig', array('orders' => $orders));
        }

    }