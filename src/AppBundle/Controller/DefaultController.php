<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/acdifss", name="homepage")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('@App/default/index.html.twig');
    }

    /**
     * @return Response
     * @Route("/lucky/number/{max}",name="lucky",requirements={"max"="\d+"})
     */
    public function numberAction($max){
        $number = random_int(0,$max);

        return $this->render("@App/default/number.html.twig", array('number' => $number));

        //return new Response('<html><header><title>Lucky Number</title><body>'.$number.'</body></header></html>');
    }
}
