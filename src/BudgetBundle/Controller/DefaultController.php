<?php

namespace BudgetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Default controller.
 *
 * @Route("budget")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage_budget")
     */
    public function indexAction()
    {
        // return $this->render('../../../src/BudgetBundle/Resources/views/Default/fabou.html.twig');
        return $this->render('@Budget/Default/index.html.twig');
    }
}
