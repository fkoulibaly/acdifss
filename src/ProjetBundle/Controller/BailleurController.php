<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Entity\Bailleur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Bailleur controller.
 *
 * @Route("bailleur")
 */
class BailleurController extends Controller
{
    /**
     * Lists all bailleur entities.
     *
     * @Route("/", name="bailleur_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        /*
        $em = $this->getDoctrine()->getManager();

        $bailleurs = $em->getRepository('ProjetBundle:Bailleur')->findAll();

       $content = $this->renderView('@Projet/bailleur/index.content.html.twig',
            array('bailleurs' => $bailleurs)
        );
        return $this->render('@Projet/bailleur/index.html.twig'
             , array('content' => $content)
        );
        */

        $em = $this->getDoctrine()->getManager();

        $listeBailleurs = $em->getRepository('ProjetBundle:Bailleur')->findAll();

        $bailleurs  = $this->get('knp_paginator')->paginate(
            $listeBailleurs,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            6/*nbre d'éléments par page*/
        );

        $content = $this->renderView('@Projet/bailleur/msn.html.twig',
            array('bailleurs' => $bailleurs)
        );

        return $this->render('@Projet/bailleur/index.html.twig',
            array('content' => $content)
        );

    }

    /**
     * Creates a new bailleur entity.
     *
     * @Route("/new", name="bailleur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bailleur = new Bailleur();
        $form = $this->createForm('ProjetBundle\Form\BailleurType', $bailleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bailleur);
            $em->flush();

            return $this->redirectToRoute('bailleur_show', array('id' => $bailleur->getId()));
        }
        /*
        return $this->render('@Projet/bailleur/new.html.twig', array(
            'bailleur' => $bailleur,
            'form' => $form->createView(),
        ));

        */

        $content = $this->renderView('@Projet/bailleur/new.content.html.twig',
            array('bailleur' => $bailleur, 'form' => $form->createView())
        );

        return $this->render('@Projet/bailleur/index.html.twig',
            array('content' => $content));
    }

    /**
     * Finds and displays a bailleur entity.
     *
     * @Route("/{id}", name="bailleur_show")
     * @Method("GET")
     */
    public function showAction(Bailleur $bailleur)
    {
        $deleteForm = $this->createDeleteForm($bailleur);

        /*
        return $this->render('@Projet/bailleur/show.html.twig', array(
            'bailleur' => $bailleur,
            'delete_form' => $deleteForm->createView(),
        ));
        */

        $content = $this->renderView('@Projet/bailleur/show.content.html.twig',
            array('bailleur' => $bailleur, 'delete_form' => $deleteForm->createView())
        );

        return $this->render('@Projet/bailleur/index.html.twig',
            array('content' => $content));
    }

    /**
     * Displays a form to edit an existing bailleur entity.
     *
     * @Route("/{id}/edit", name="bailleur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bailleur $bailleur)
    {
        $deleteForm = $this->createDeleteForm($bailleur);
        $editForm = $this->createForm('ProjetBundle\Form\BailleurType', $bailleur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bailleur_edit', array('id' => $bailleur->getId()));
        }
        /*
        return $this->render('@Projet/bailleur/edit.html.twig', array(
            'bailleur' => $bailleur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
        */

        $content = $this->renderView('@Projet/bailleur/edit.content.html.twig',
            array('bailleur' => $bailleur,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );

        return $this->render('@Projet/bailleur/index.html.twig',
            array('content' => $content));
    }

    /**
     * Deletes a bailleur entity.
     *
     * @Route("/delete/{id}", name="bailleur_delete")
     * @Method("POST")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $bailleur = $em->getRepository('ProjetBundle:Bailleur')->find($id);

        if(! $bailleur){
            throw  new NotFoundHttpException(" Bailleur ".$id." n'existe pas ");
        }

        $em->remove($bailleur);

        $em->flush();

        return $this->redirectToRoute('bailleur_index');

    }

    /**
     * Creates a form to delete a bailleur entity.
     *
     * @param Bailleur $bailleur The bailleur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bailleur $bailleur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bailleur_delete', array('id' => $bailleur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
