<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Entity\ProjetAgenceFinancement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Projetagencefinancement controller.
 *
 * @Route("projetagencefinancement")
 */
class ProjetAgenceFinancementController extends Controller
{
    /**
     * Lists all projetAgenceFinancement entities.
     *
     * @Route("/", name="projetagencefinancement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projetAgenceFinancements = $em->getRepository('ProjetBundle:ProjetAgenceFinancement')->findAll();

        return $this->render('@Projet/projetagencefinancement/index.html.twig', array(
            'projetAgenceFinancements' => $projetAgenceFinancements,
        ));
    }

    /**
     * Creates a new projetAgenceFinancement entity.
     *
     * @Route("/new", name="projetagencefinancement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $projetAgenceFinancement = new Projetagencefinancement();
        $form = $this->createForm('ProjetBundle\Form\ProjetAgenceFinancementType', $projetAgenceFinancement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projetAgenceFinancement);
            $em->flush();

            return $this->redirectToRoute('projetagencefinancement_show', array('id' => $projetAgenceFinancement->getId()));
        }

        return $this->render('@Projet/projetagencefinancement/new.html.twig', array(
            'projetAgenceFinancement' => $projetAgenceFinancement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a projetAgenceFinancement entity.
     *
     * @Route("/{id}", name="projetagencefinancement_show")
     * @Method("GET")
     */
    public function showAction(ProjetAgenceFinancement $projetAgenceFinancement)
    {
        $deleteForm = $this->createDeleteForm($projetAgenceFinancement);

        return $this->render('@Projet/projetagencefinancement/show.html.twig', array(
            'projetAgenceFinancement' => $projetAgenceFinancement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing projetAgenceFinancement entity.
     *
     * @Route("/{id}/edit", name="projetagencefinancement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProjetAgenceFinancement $projetAgenceFinancement)
    {
        $deleteForm = $this->createDeleteForm($projetAgenceFinancement);
        $editForm = $this->createForm('ProjetBundle\Form\ProjetAgenceFinancementType', $projetAgenceFinancement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projetagencefinancement_edit', array('id' => $projetAgenceFinancement->getId()));
        }

        return $this->render('@Projet/projetagencefinancement/edit.html.twig', array(
            'projetAgenceFinancement' => $projetAgenceFinancement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a projetAgenceFinancement entity.
     *
     * @Route("/{id}", name="projetagencefinancement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProjetAgenceFinancement $projetAgenceFinancement)
    {
        $form = $this->createDeleteForm($projetAgenceFinancement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projetAgenceFinancement);
            $em->flush();
        }

        return $this->redirectToRoute('projetagencefinancement_index');
    }

    /**
     * Creates a form to delete a projetAgenceFinancement entity.
     *
     * @param ProjetAgenceFinancement $projetAgenceFinancement The projetAgenceFinancement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProjetAgenceFinancement $projetAgenceFinancement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projetagencefinancement_delete', array('id' => $projetAgenceFinancement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
