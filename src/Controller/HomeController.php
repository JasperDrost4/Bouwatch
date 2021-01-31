<?php
    namespace App\Controller;

    
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameWorkExtraBundle\Configuration\Method;

    class HomeController extends AbstractController
    {
        /**
         * @Route("/", name="home")
         * Method("GET")
         */
        public function index(){
            return $this->render('articles/index.html.twig');
        }

    }