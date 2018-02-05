<?php

namespace ConfigBundle\Controller;

use ConfigBundle\Entity\ConfTypeOperation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Conftypeoperation controller.
 *
 * @Route("typeoperation")
 */
class ConfTypeOperationController extends Controller
{
    /**
     * Lists all confTypeOperation entities.
     *
     * @Route("/", name="typeoperation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $confTypeOperations = $em->getRepository('ConfigBundle:ConfTypeOperation')->findAll();

        return $this->render('conftypeoperation/index.html.twig', array(
            'confTypeOperations' => $confTypeOperations,
        ));
    }

    /**
     * Creates a new confTypeOperation entity.
     *
     * @Route("/new", name="typeoperation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $confTypeOperation = new Conftypeoperation();
        $form = $this->createForm('ConfigBundle\Form\ConfTypeOperationType', $confTypeOperation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confTypeOperation);
            $em->flush();

            return $this->redirectToRoute('typeoperation_show', array('id' => $confTypeOperation->getId()));
        }

        return $this->render('conftypeoperation/new.html.twig', array(
            'confTypeOperation' => $confTypeOperation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a confTypeOperation entity.
     *
     * @Route("/{id}", name="typeoperation_show")
     * @Method("GET")
     */
    public function showAction(ConfTypeOperation $confTypeOperation)
    {
        $deleteForm = $this->createDeleteForm($confTypeOperation);

        return $this->render('conftypeoperation/show.html.twig', array(
            'confTypeOperation' => $confTypeOperation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing confTypeOperation entity.
     *
     * @Route("/{id}/edit", name="typeoperation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfTypeOperation $confTypeOperation)
    {
        $deleteForm = $this->createDeleteForm($confTypeOperation);
        $editForm = $this->createForm('ConfigBundle\Form\ConfTypeOperationType', $confTypeOperation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeoperation_edit', array('id' => $confTypeOperation->getId()));
        }

        return $this->render('conftypeoperation/edit.html.twig', array(
            'confTypeOperation' => $confTypeOperation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a confTypeOperation entity.
     *
     * @Route("/{id}", name="typeoperation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfTypeOperation $confTypeOperation)
    {
        $form = $this->createDeleteForm($confTypeOperation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confTypeOperation);
            $em->flush();
        }

        return $this->redirectToRoute('typeoperation_index');
    }

    /**
     * Creates a form to delete a confTypeOperation entity.
     *
     * @param ConfTypeOperation $confTypeOperation The confTypeOperation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfTypeOperation $confTypeOperation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeoperation_delete', array('id' => $confTypeOperation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
