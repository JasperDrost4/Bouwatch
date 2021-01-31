<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameWorkExtraBundle\Configuration\Method;
    use App\Entity\RMAOrderRule;
    use App\Entity\Parts;
    use App\Entity\Equipment;

    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    
    class RmaOrderRuleController extends AbstractController
    {
        /**
         * @Route("/rmaorderrules", name="rmaorderrules")
         * Method(["GET","POST"])
         */
        public function index(Request $request){
            $order_rules = $this->getDoctrine()->getRepository(RMAOrderRule::class)->findall();
            $parts = $this->getDoctrine()->getRepository(Parts::class)->findall();
            $equipment = $this->getDoctrine()->getRepository(Equipment::class)->findall();
            $part_names = array();
            foreach($parts as $part){
                $name = $part->getName();
                array_push($part_names,$name);
            }
            $order_rule = new RMAOrderRule();
            $form = $this->createFormBuilder($order_rule)
            ->add('Price', TextType::class, array('attr' => array('class' => 'form-control ')))
            ->add('part_id', ChoiceType::class, array('choices' => $parts, 'attr' => array('class' => 'mt-3 form-control')))
            ->add('equipment_id', ChoiceType::class, array('choices' => $equipment, 'attr' => array('class' => 'mt-3 form-control')))
            ->add('save', SubmitType::class, array('label' => 'Create','attr' => array('class' => 'btn btn-primary mt-3')))
            ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
              $order_rule = $form->getData();
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($order_rule);
              $entityManager->flush();
      
              return $this->redirectToRoute('rmaorderrules');
            }
            
            return $this->render('articles/rma_order_rule.html.twig', array(
            'order_rules' => $order_rules,
            'form' => $form->createView()));
        }

        /**
         * @Route("/rmaorderrules/remove/{id}")
         * Method({"DELETE"})
         */
        public function delete(Request $request, $id) {
            $orderRule = $this->getDoctrine()->getRepository(RMAOrderRule::class)->find($id);

            $entityManager = $this->getDoctrine()->getManager();
            
            $entityManager->remove($orderRule);
            $entityManager->flush();

            
            return $this->redirectToRoute('rmaorderrules');
        }
    }