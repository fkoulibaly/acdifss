<?php

namespace BudgetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/budget")
     */
    public function indexAction()
    {
        // return $this->render('../../../src/BudgetBundle/Resources/views/Default/index.html.twig');
        return $this->render('@Budget/Default/index.html.twig');
    }
}
