<?php

namespace ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/projet")
     */
    public function indexAction()
    {
        return $this->render('@Projet/Default/index.html.twig');
    }
}
