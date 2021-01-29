<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameWorkExtraBundle\Configuration\Method;

    
    class ProductionLogController extends AbstractController
    {
        /**
         * @Route("/productionlog")
         */
        public function index(){
            $orders = ['Order 1','Order 2'];
            return $this->render('articles/productionlog.html.twig', array('orders' => $orders));
        }

    }