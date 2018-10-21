<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Entity\ObjectifSpecifique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Objectifspecifique controller.
 *
 * @Route("objectifspecifique")
 */
class ObjectifSpecifiqueController extends Controller
{
    /**
     * Lists all objectifSpecifique entities.
     *
     * @Route("/", name="objectifspecifique_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $objectifSpecifiques = $em->getRepository('ProjetBundle:ObjectifSpecifique')->findAll();

        return $this->render('objectifspecifique/index.html.twig', array(
            'objectifSpecifiques' => $objectifSpecifiques,
        ));
    }

    /**
     * Creates a new objectifSpecifique entity.
     *
     * @Route("/new", name="objectifspecifique_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $objectifSpecifique = new Objectifspecifique();
        $form = $this->createForm('ProjetBundle\Form\ObjectifSpecifiqueType', $objectifSpecifique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($objectifSpecifique);
            $em->flush();

            return $this->redirectToRoute('objectifspecifique_show', array('id' => $objectifSpecifique->getId()));
        }

        return $this->render('objectifspecifique/new.html.twig', array(
            'objectifSpecifique' => $objectifSpecifique,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a objectifSpecifique entity.
     *
     * @Route("/{id}", name="objectifspecifique_show")
     * @Method("GET")
     */
    public function showAction(ObjectifSpecifique $objectifSpecifique)
    {
        $deleteForm = $this->createDeleteForm($objectifSpecifique);

        return $this->render('objectifspecifique/show.html.twig', array(
            'objectifSpecifique' => $objectifSpecifique,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing objectifSpecifique entity.
     *
     * @Route("/{id}/edit", name="objectifspecifique_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ObjectifSpecifique $objectifSpecifique)
    {
        $deleteForm = $this->createDeleteForm($objectifSpecifique);
        $editForm = $this->createForm('ProjetBundle\Form\ObjectifSpecifiqueType', $objectifSpecifique);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('objectifspecifique_edit', array('id' => $objectifSpecifique->getId()));
        }

        return $this->render('objectifspecifique/edit.html.twig', array(
            'objectifSpecifique' => $objectifSpecifique,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a objectifSpecifique entity.
     *
     * @Route("/{id}", name="objectifspecifique_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ObjectifSpecifique $objectifSpecifique)
    {
        $form = $this->createDeleteForm($objectifSpecifique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($objectifSpecifique);
            $em->flush();
        }

        return $this->redirectToRoute('objectifspecifique_index');
    }

    /**
     * Creates a form to delete a objectifSpecifique entity.
     *
     * @param ObjectifSpecifique $objectifSpecifique The objectifSpecifique entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ObjectifSpecifique $objectifSpecifique)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('objectifspecifique_delete', array('id' => $objectifSpecifique->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
