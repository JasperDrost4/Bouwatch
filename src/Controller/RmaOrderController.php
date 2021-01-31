<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameWorkExtraBundle\Configuration\Method;

    use App\Entity\RMAORderRule;
    use App\Entity\RMAOrder;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    
    
    class RmaOrderController extends AbstractController
    {
        /**
         * @Route("/rmaorders", name="rmaorders")
         * Method(["GET", "POST"])
         */
        public function index(Request $request){
            $rma_orders = $this->getDoctrine()->getRepository(RMAOrder::class)->findall();
            $rma_order_rules = $this->getDoctrine()->getRepository(RMAORderRule::class)->findall();
            
            $rma_order = new RMAOrder();
            $form = $this->createFormBuilder($rma_order)
            ->add('customer', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('handledby', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('date', DateType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('status', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('save', SubmitType::class, array('label' => 'Create','attr' => array('class' => 'btn btn-primary mt-3')
            ))
            ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $new_order = $form->getData();
        
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($new_order);
                $entityManager->flush();
        
                return $this->redirectToRoute('rmaorders');
            }

            return $this->render('articles/rma_order.html.twig', array(
                'rma_orders' => $rma_orders,
                'form' => $form->createView()));
            
           
        }

         /**
         * @Route("/rmaorders/addrules/{id}")
         * Method({["GET", "POST"]})
         */
        public function addrules(Request $request, $id) {
            $order = $this->getDoctrine()->getRepository(RMAOrder::class)->find($id);
            $orderRules = $this->getDoctrine()->getRepository(RMAOrderRule::class)->findall();
            $present_order_rules = $order->getRMAOrderRules();
            
           
            


            return $this->render('articles/rma_order_add_rule.html.twig', array(
                'order' => $order,
                'order_rules' => $orderRules,
                'present_order_rules' => $present_order_rules));
        }

        /**
         * @Route("/rmaorderrules/{id}/add/{ruleid}")
         * Method({["GET", "POST"]})
         */
        public function addrule(Request $request, $id, $ruleid) {
            $order = $this->getDoctrine()->getRepository(RMAOrder::class)->find($id);
            $orderRule = $this->getDoctrine()->getRepository(RMAOrderRule::class)->find($ruleid);
            $present_order_rules = $order->getRMAOrderRules();

            $em = $this->getDoctrine()->getManager();
            $order->addRMAOrderRule($orderRule);
            $em->flush();
            return $this->redirectToRoute('rmaorders');
        }


        /**
         * @Route("/rmaorders/remove/{id}")
         * Method({"DELETE"})
         */
        public function delete(Request $request, $id) {
            $order = $this->getDoctrine()->getRepository(RMAOrder::class)->find($id);

            $entityManager = $this->getDoctrine()->getManager();
            
            $entityManager->remove($order);
            $entityManager->flush();

            
            return $this->redirectToRoute('rmaorders');
        }

    }