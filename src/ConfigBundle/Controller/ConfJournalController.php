<?php

namespace ConfigBundle\Controller;

use ConfigBundle\Entity\ConfJournal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Confjournal controller.
 *
 * @Route("journal")
 */
class ConfJournalController extends Controller
{
    /**
     * Lists all confJournal entities.
     *
     * @Route("/", name="journal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $confJournals = $em->getRepository('ConfigBundle:ConfJournal')->findAll();

        return $this->render('confjournal/index.html.twig', array(
            'confJournals' => $confJournals,
        ));
    }

    /**
     * Creates a new confJournal entity.
     *
     * @Route("/new", name="journal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $confJournal = new Confjournal();
        $form = $this->createForm('ConfigBundle\Form\ConfJournalType', $confJournal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confJournal);
            $em->flush();

            return $this->redirectToRoute('journal_show', array('id' => $confJournal->getId()));
        }

        return $this->render('confjournal/new.html.twig', array(
            'confJournal' => $confJournal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a confJournal entity.
     *
     * @Route("/{id}", name="journal_show")
     * @Method("GET")
     */
    public function showAction(ConfJournal $confJournal)
    {
        $deleteForm = $this->createDeleteForm($confJournal);

        return $this->render('confjournal/show.html.twig', array(
            'confJournal' => $confJournal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing confJournal entity.
     *
     * @Route("/{id}/edit", name="journal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfJournal $confJournal)
    {
        $deleteForm = $this->createDeleteForm($confJournal);
        $editForm = $this->createForm('ConfigBundle\Form\ConfJournalType', $confJournal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('journal_edit', array('id' => $confJournal->getId()));
        }

        return $this->render('confjournal/edit.html.twig', array(
            'confJournal' => $confJournal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a confJournal entity.
     *
     * @Route("/{id}", name="journal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfJournal $confJournal)
    {
        $form = $this->createDeleteForm($confJournal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confJournal);
            $em->flush();
        }

        return $this->redirectToRoute('journal_index');
    }

    /**
     * Creates a form to delete a confJournal entity.
     *
     * @param ConfJournal $confJournal The confJournal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfJournal $confJournal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('journal_delete', array('id' => $confJournal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
