<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Entity\AgenceFinancement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Agencefinancement controller.
 *
 * @Route("agencefinancement")
 */
class AgenceFinancementController extends Controller
{
    /**
     * Lists all agenceFinancement entities.
     *
     * @Route("/", name="agencefinancement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $agenceFinancements = $em->getRepository('ProjetBundle:AgenceFinancement')->findAll();

        return $this->render('agencefinancement/index.html.twig', array(
            'agenceFinancements' => $agenceFinancements,
        ));
    }

    /**
     * Creates a new agenceFinancement entity.
     *
     * @Route("/new", name="agencefinancement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $agenceFinancement = new Agencefinancement();
        $form = $this->createForm('ProjetBundle\Form\AgenceFinancementType', $agenceFinancement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agenceFinancement);
            $em->flush();

            return $this->redirectToRoute('agencefinancement_show', array('id' => $agenceFinancement->getId()));
        }

        return $this->render('agencefinancement/new.html.twig', array(
            'agenceFinancement' => $agenceFinancement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a agenceFinancement entity.
     *
     * @Route("/{id}", name="agencefinancement_show")
     * @Method("GET")
     */
    public function showAction(AgenceFinancement $agenceFinancement)
    {
        $deleteForm = $this->createDeleteForm($agenceFinancement);

        return $this->render('agencefinancement/show.html.twig', array(
            'agenceFinancement' => $agenceFinancement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing agenceFinancement entity.
     *
     * @Route("/{id}/edit", name="agencefinancement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AgenceFinancement $agenceFinancement)
    {
        $deleteForm = $this->createDeleteForm($agenceFinancement);
        $editForm = $this->createForm('ProjetBundle\Form\AgenceFinancementType', $agenceFinancement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('agencefinancement_edit', array('id' => $agenceFinancement->getId()));
        }

        return $this->render('agencefinancement/edit.html.twig', array(
            'agenceFinancement' => $agenceFinancement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a agenceFinancement entity.
     *
     * @Route("/{id}", name="agencefinancement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AgenceFinancement $agenceFinancement)
    {
        $form = $this->createDeleteForm($agenceFinancement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($agenceFinancement);
            $em->flush();
        }

        return $this->redirectToRoute('agencefinancement_index');
    }

    /**
     * Creates a form to delete a agenceFinancement entity.
     *
     * @param AgenceFinancement $agenceFinancement The agenceFinancement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AgenceFinancement $agenceFinancement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agencefinancement_delete', array('id' => $agenceFinancement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
