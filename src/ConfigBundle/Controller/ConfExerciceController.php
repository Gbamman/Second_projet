<?php

namespace ConfigBundle\Controller;

use ConfigBundle\Entity\ConfExercice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Confexercice controller.
 *
 * @Route("exercice")
 */
class ConfExerciceController extends Controller
{
    /**
     * Lists all confExercice entities.
     *
     * @Route("/", name="exercice_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $confExercices = $em->getRepository('ConfigBundle:ConfExercice')->findAll();

        return $this->render('confexercice/index.html.twig', array(
            'confExercices' => $confExercices,
        ));
    }

    /**
     * Creates a new confExercice entity.
     *
     * @Route("/new", name="exercice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $confExercice = new Confexercice();
        $form = $this->createForm('ConfigBundle\Form\ConfExerciceType', $confExercice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confExercice);
            $em->flush();

            return $this->redirectToRoute('exercice_show', array('id' => $confExercice->getId()));
        }

        return $this->render('confexercice/new.html.twig', array(
            'confExercice' => $confExercice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a confExercice entity.
     *
     * @Route("/{id}", name="exercice_show")
     * @Method("GET")
     */
    public function showAction(ConfExercice $confExercice)
    {
        $deleteForm = $this->createDeleteForm($confExercice);

        return $this->render('confexercice/show.html.twig', array(
            'confExercice' => $confExercice,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing confExercice entity.
     *
     * @Route("/{id}/edit", name="exercice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfExercice $confExercice)
    {
        $deleteForm = $this->createDeleteForm($confExercice);
        $editForm = $this->createForm('ConfigBundle\Form\ConfExerciceType', $confExercice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('exercice_edit', array('id' => $confExercice->getId()));
        }

        return $this->render('confexercice/edit.html.twig', array(
            'confExercice' => $confExercice,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a confExercice entity.
     *
     * @Route("/{id}", name="exercice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfExercice $confExercice)
    {
        $form = $this->createDeleteForm($confExercice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confExercice);
            $em->flush();
        }

        return $this->redirectToRoute('exercice_index');
    }

    /**
     * Creates a form to delete a confExercice entity.
     *
     * @param ConfExercice $confExercice The confExercice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfExercice $confExercice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('exercice_delete', array('id' => $confExercice->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
