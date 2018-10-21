<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Entity\ProjetInstitution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Projetinstitution controller.
 *
 * @Route("projetinstitution")
 */
class ProjetInstitutionController extends Controller
{
    /**
     * Lists all projetInstitution entities.
     *
     * @Route("/", name="projetinstitution_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projetInstitutions = $em->getRepository('ProjetBundle:ProjetInstitution')->findAll();

        return $this->render('projetinstitution/index.html.twig', array(
            'projetInstitutions' => $projetInstitutions,
        ));
    }

    /**
     * Creates a new projetInstitution entity.
     *
     * @Route("/new", name="projetinstitution_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $projetInstitution = new Projetinstitution();
        $form = $this->createForm('ProjetBundle\Form\ProjetInstitutionType', $projetInstitution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projetInstitution);
            $em->flush();

            return $this->redirectToRoute('projetinstitution_show', array('id' => $projetInstitution->getId()));
        }

        return $this->render('projetinstitution/new.html.twig', array(
            'projetInstitution' => $projetInstitution,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a projetInstitution entity.
     *
     * @Route("/{id}", name="projetinstitution_show")
     * @Method("GET")
     */
    public function showAction(ProjetInstitution $projetInstitution)
    {
        $deleteForm = $this->createDeleteForm($projetInstitution);

        return $this->render('projetinstitution/show.html.twig', array(
            'projetInstitution' => $projetInstitution,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing projetInstitution entity.
     *
     * @Route("/{id}/edit", name="projetinstitution_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProjetInstitution $projetInstitution)
    {
        $deleteForm = $this->createDeleteForm($projetInstitution);
        $editForm = $this->createForm('ProjetBundle\Form\ProjetInstitutionType', $projetInstitution);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projetinstitution_edit', array('id' => $projetInstitution->getId()));
        }

        return $this->render('projetinstitution/edit.html.twig', array(
            'projetInstitution' => $projetInstitution,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a projetInstitution entity.
     *
     * @Route("/{id}", name="projetinstitution_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProjetInstitution $projetInstitution)
    {
        $form = $this->createDeleteForm($projetInstitution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projetInstitution);
            $em->flush();
        }

        return $this->redirectToRoute('projetinstitution_index');
    }

    /**
     * Creates a form to delete a projetInstitution entity.
     *
     * @param ProjetInstitution $projetInstitution The projetInstitution entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProjetInstitution $projetInstitution)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projetinstitution_delete', array('id' => $projetInstitution->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
