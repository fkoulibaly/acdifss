<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Entity\ProjetBailleur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Projetbailleur controller.
 *
 * @Route("projetbailleur")
 */
class ProjetBailleurController extends Controller
{
    /**
     * Lists all projetBailleur entities.
     *
     * @Route("/", name="projetbailleur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projetBailleurs = $em->getRepository('ProjetBundle:ProjetBailleur')->findAll();

        return $this->render('projetbailleur/index.html.twig', array(
            'projetBailleurs' => $projetBailleurs,
        ));
    }

    /**
     * Creates a new projetBailleur entity.
     *
     * @Route("/new", name="projetbailleur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $projetBailleur = new Projetbailleur();
        $form = $this->createForm('ProjetBundle\Form\ProjetBailleurType', $projetBailleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projetBailleur);
            $em->flush();

            return $this->redirectToRoute('projetbailleur_show', array('id' => $projetBailleur->getId()));
        }

        return $this->render('projetbailleur/new.html.twig', array(
            'projetBailleur' => $projetBailleur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a projetBailleur entity.
     *
     * @Route("/{id}", name="projetbailleur_show")
     * @Method("GET")
     */
    public function showAction(ProjetBailleur $projetBailleur)
    {
        $deleteForm = $this->createDeleteForm($projetBailleur);

        return $this->render('projetbailleur/show.html.twig', array(
            'projetBailleur' => $projetBailleur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing projetBailleur entity.
     *
     * @Route("/{id}/edit", name="projetbailleur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProjetBailleur $projetBailleur)
    {
        $deleteForm = $this->createDeleteForm($projetBailleur);
        $editForm = $this->createForm('ProjetBundle\Form\ProjetBailleurType', $projetBailleur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projetbailleur_edit', array('id' => $projetBailleur->getId()));
        }

        return $this->render('projetbailleur/edit.html.twig', array(
            'projetBailleur' => $projetBailleur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a projetBailleur entity.
     *
     * @Route("/{id}", name="projetbailleur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProjetBailleur $projetBailleur)
    {
        $form = $this->createDeleteForm($projetBailleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projetBailleur);
            $em->flush();
        }

        return $this->redirectToRoute('projetbailleur_index');
    }

    /**
     * Creates a form to delete a projetBailleur entity.
     *
     * @param ProjetBailleur $projetBailleur The projetBailleur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProjetBailleur $projetBailleur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projetbailleur_delete', array('id' => $projetBailleur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
