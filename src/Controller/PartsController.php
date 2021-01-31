<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

    use App\Entity\Parts;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    
    class PartsController extends AbstractController
    {
        /**
         * @Route("/parts", name="parts")
         */
        public function index(){
            $parts = $this->getDoctrine()->getRepository(Parts::class)->findall();
            return $this->render('articles/parts.html.twig', array('parts' => $parts));
        }

        /**
         * @Route("/part/new", name="new_part")
         * Method({"GET", "POST"})
         */
        public function new(Request $request){
            $part = new Parts();

            $form = $this->createFormBuilder($part)
            ->add('Name', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('price', TextType::class, array( 'attr' => array('class' => 'mt-3 form-control')))
            ->add('save', SubmitType::class, array(
            'label' => 'Create',
            'attr' => array('class' => 'btn btn-primary mt-3')
            ))
            ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
              $part = $form->getData();
      
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($part);
              $entityManager->flush();
      
              return $this->redirectToRoute('parts');
            }


            return $this->render('articles/new_parts.html.twig', array(
                'form' => $form->createView()
            ));
        }

        /**
         * @Route("/parts/remove/{id}")
         * Method({"DELETE"})
         */
        public function delete(Request $request, $id) {
            $part = $this->getDoctrine()->getRepository(Parts::class)->find($id);

            $entityManager = $this->getDoctrine()->getManager();
            
            $entityManager->remove($part);
            $entityManager->flush();

            
            return $this->redirectToRoute('parts');
        }
    
    }