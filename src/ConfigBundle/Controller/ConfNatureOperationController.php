<?php

namespace ConfigBundle\Controller;

use ConfigBundle\Entity\ConfNatureOperation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Confnatureoperation controller.
 *
 * @Route("natureoperation")
 */
class ConfNatureOperationController extends Controller
{
    /**
     * Lists all confNatureOperation entities.
     *
     * @Route("/", name="natureoperation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $confNatureOperations = $em->getRepository('ConfigBundle:ConfNatureOperation')->findAll();

        return $this->render('confnatureoperation/index.html.twig', array(
            'confNatureOperations' => $confNatureOperations,
        ));
    }

    /**
     * Creates a new confNatureOperation entity.
     *
     * @Route("/new", name="natureoperation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $confNatureOperation = new Confnatureoperation();
        $form = $this->createForm('ConfigBundle\Form\ConfNatureOperationType', $confNatureOperation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confNatureOperation);
            $em->flush();

            return $this->redirectToRoute('natureoperation_show', array('id' => $confNatureOperation->getId()));
        }

        return $this->render('confnatureoperation/new.html.twig', array(
            'confNatureOperation' => $confNatureOperation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a confNatureOperation entity.
     *
     * @Route("/{id}", name="natureoperation_show")
     * @Method("GET")
     */
    public function showAction(ConfNatureOperation $confNatureOperation)
    {
        $deleteForm = $this->createDeleteForm($confNatureOperation);

        return $this->render('confnatureoperation/show.html.twig', array(
            'confNatureOperation' => $confNatureOperation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing confNatureOperation entity.
     *
     * @Route("/{id}/edit", name="natureoperation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfNatureOperation $confNatureOperation)
    {
        $deleteForm = $this->createDeleteForm($confNatureOperation);
        $editForm = $this->createForm('ConfigBundle\Form\ConfNatureOperationType', $confNatureOperation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('natureoperation_edit', array('id' => $confNatureOperation->getId()));
        }

        return $this->render('confnatureoperation/edit.html.twig', array(
            'confNatureOperation' => $confNatureOperation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a confNatureOperation entity.
     *
     * @Route("/{id}", name="natureoperation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfNatureOperation $confNatureOperation)
    {
        $form = $this->createDeleteForm($confNatureOperation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confNatureOperation);
            $em->flush();
        }

        return $this->redirectToRoute('natureoperation_index');
    }

    /**
     * Creates a form to delete a confNatureOperation entity.
     *
     * @param ConfNatureOperation $confNatureOperation The confNatureOperation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfNatureOperation $confNatureOperation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('natureoperation_delete', array('id' => $confNatureOperation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
