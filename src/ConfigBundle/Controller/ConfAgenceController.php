<?php

namespace ConfigBundle\Controller;

use ConfigBundle\Entity\ConfAgence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Confagence controller.
 *
 * @Route("agence")
 */
class ConfAgenceController extends Controller
{
    /**
     * Lists all confAgence entities.
     *
     * @Route("/", name="agence_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $confAgences = $em->getRepository('ConfigBundle:ConfAgence')->findAll();

        return $this->render('confagence/index.html.twig', array(
            'confAgences' => $confAgences,
        ));
    }

    /**
     * Creates a new confAgence entity.
     *
     * @Route("/new", name="agence_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $confAgence = new Confagence();
        $form = $this->createForm('ConfigBundle\Form\ConfAgenceType', $confAgence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confAgence);
            $em->flush();

            return $this->redirectToRoute('agence_show', array('id' => $confAgence->getId()));
        }

        return $this->render('confagence/new.html.twig', array(
            'confAgence' => $confAgence,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a confAgence entity.
     *
     * @Route("/{id}", name="agence_show")
     * @Method("GET")
     */
    public function showAction(ConfAgence $confAgence)
    {
        $deleteForm = $this->createDeleteForm($confAgence);

        return $this->render('confagence/show.html.twig', array(
            'confAgence' => $confAgence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing confAgence entity.
     *
     * @Route("/{id}/edit", name="agence_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfAgence $confAgence)
    {
        $deleteForm = $this->createDeleteForm($confAgence);
        $editForm = $this->createForm('ConfigBundle\Form\ConfAgenceType', $confAgence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('agence_edit', array('id' => $confAgence->getId()));
        }

        return $this->render('confagence/edit.html.twig', array(
            'confAgence' => $confAgence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a confAgence entity.
     *
     * @Route("/{id}", name="agence_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfAgence $confAgence)
    {
        $form = $this->createDeleteForm($confAgence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confAgence);
            $em->flush();
        }

        return $this->redirectToRoute('agence_index');
    }

    /**
     * Creates a form to delete a confAgence entity.
     *
     * @param ConfAgence $confAgence The confAgence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfAgence $confAgence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('agence_delete', array('id' => $confAgence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
