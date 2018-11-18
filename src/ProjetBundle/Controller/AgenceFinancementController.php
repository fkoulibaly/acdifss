<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Entity\AgenceFinancement;
use ProjetBundle\ProjetBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    public function indexAction(Request $request=null)
    {
        /*
        $em = $this->getDoctrine()->getManager();

        $agenceFinancements = $em->getRepository('ProjetBundle:AgenceFinancement')->findAll();

       $content = $this->renderView('@Projet/agencefinancement/index.content.html.twig',
           array('agenceFinancements' => $agenceFinancements)
       );
        return $this->render('@Projet/agencefinancement/index.html.twig',
            array('content' => $content)
            );

        */

        $em = $this->getDoctrine()->getManager();

        $listeAgenceFinancements = $em->getRepository('ProjetBundle:AgenceFinancement')->findAll();

        $AgenceFinancements  = $this->get('knp_paginator')->paginate(
            $listeAgenceFinancements,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            6/*nbre d'éléments par page*/
        );

        $content = $this->renderView('@Projet/agencefinancement/msn.html.twig',
            array('agencefinancements' => $AgenceFinancements)
        );

        return $this->render('@Projet/agencefinancement/index.html.twig',
            array('content' => $content)
        );
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

        $content = $this->renderView('@Projet/agencefinancement/new.content.html.twig',
            array('agenceFinancement' => $agenceFinancement, 'form' => $form->createView())
        );

        return $this->render('@Projet/agencefinancement/index.html.twig',
            array('content' => $content));
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
/*
        return $this->render('@Projet/agencefinancement/show.html.twig', array(
            'agenceFinancement' => $agenceFinancement,
            'delete_form' => $deleteForm->createView(),
        ));
        */

        $content = $this->renderView('@Projet/agencefinancement/show.content.html.twig',
            array('agenceFinancement' => $agenceFinancement, 'delete_form' => $deleteForm->createView())
        );

        return $this->render('@Projet/agencefinancement/index.html.twig',
            array('content' => $content));
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
/*
        return $this->render('@Projet/agencefinancement/edit.html.twig', array(
            'agenceFinancement' => $agenceFinancement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
*/

        $content = $this->renderView('@Projet/agencefinancement/edit.content.html.twig',
            array('agenceFinancement' => $agenceFinancement,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                )
        );

        return $this->render('@Projet/agencefinancement/index.html.twig',
            array('content' => $content));

    }

    /**
     * Deletes a agenceFinancement entity.
     *
     * @Route("/delete/{id}", name="agencefinancement_delete")
     * @Method({"POST"})
     */
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $agence = $em->getRepository('ProjetBundle:AgenceFinancement')->find($id);

        if(! $agence){
            throw  new NotFoundHttpException(" Agence ".$id." n'existe pas ");
        }

        $em->remove($agence);

        $em->flush();

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
