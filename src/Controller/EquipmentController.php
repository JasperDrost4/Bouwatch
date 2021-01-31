<?php
    namespace App\Controller;

    
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameWorkExtraBundle\Configuration\Method;

    use App\Entity\Equipment;
    use App\Entity\ProductionLog;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    class EquipmentController extends AbstractController
    {
        /**
         * @Route("/equipment", name="equipment")
         * Method({"GET", "POST"})
         */
        public function index(Request $request){
            $equipment = $this->getDoctrine()->getRepository(Equipment::class)->findall();

            $new_equipment = new Equipment();
            $form = $this->createFormBuilder($new_equipment)
            ->add('Type', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('Model', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('Productiondate', DateType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('Revision', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('Serialnumber', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('StatusStatus', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('save', SubmitType::class, array('label' => 'Create','attr' => array('class' => 'btn btn-primary mt-3')))
            ->getForm();


            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
              $new_equipment = $form->getData();
      
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($new_equipment);
              $entityManager->flush();
      
              return $this->redirectToRoute('equipment');
            }


            return $this->render('articles/equipment.html.twig', array(
                'equipment' => $equipment,
                'form' => $form->createView()));
        }

        /**
         * @Route("/equipment/remove/{id}")
         * Method({"DELETE"})
         */
        public function delete(Request $request, $id) {
            $equipment = $this->getDoctrine()->getRepository(Equipment::class)->find($id);

            $entityManager = $this->getDoctrine()->getManager();
            #get logs for this equipment
            $logs = $this->getDoctrine()->getRepository(Productionlog::class)->findall();
            foreach($logs as $log){
                $entityManager->remove($log);
                $entityManager->flush();
            }
            
            $entityManager->remove($equipment);
            $entityManager->flush();

            
            return $this->redirectToRoute('equipment');
        }

        /**
         * @Route("/equipment/{id}", name="equipment_show_log")
         * Method(["GET","POST"])
         */
        public function show_log($id, Request $request) {
            $equipment = $this->getDoctrine()->getRepository(Equipment::class)->find($id);
            $logs = $this->getDoctrine()->getRepository(Productionlog::class)->findBy(['equipment_id' =>$equipment->getId()]);
            
            

            $new_log = new ProductionLog();
            $form = $this->createFormBuilder($new_log)
            ->add('log', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('successfull_produced', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('mac_adress', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('production_location', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('save', SubmitType::class, array('label' => 'Create','attr' => array('class' => 'btn btn-primary mt-3')))
            ->getForm();


            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
              $new_log = $form->getData();
              $new_log->setEquipmentId($equipment);
      
              
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($new_log);
              $entityManager->flush();
      
              return $this->redirectToRoute('equipment');
            }

            return $this->render('articles/equipment_show.html.twig', array(
                'equipment' => $equipment,
                'logs' => $logs,
                'form' => $form->createView()));
        }
    }