<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameWorkExtraBundle\Configuration\Method;

    
    class RmaOrderRuleController extends AbstractController
    {
        /**
         * @Route("/rmaorderrule")
         */
        public function index(){
            $orders = ['Order 1','Order 2'];
            return $this->render('articles/rma_order_rule.html.twig', array('orders' => $orders));
        }

    }