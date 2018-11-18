<?php

namespace ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Default controller.
 *
 * @Route("projet")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage_projet")
     */
    public function indexAction()
    {
        $content = $this->renderView('content.html.twig');

        return $this->render('@Projet/Default/index.html.twig'
            , array('content' => $content)
        );
    }
}
