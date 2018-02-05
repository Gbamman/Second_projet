<?php

namespace ConfigBundle\Controller;

use ConfigBundle\Entity\ConfSchemaOperation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Confschemaoperation controller.
 *
 * @Route("schemaoperation")
 */
class ConfSchemaOperationController extends Controller
{
    /**
     * Lists all confSchemaOperation entities.
     *
     * @Route("/", name="schemaoperation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $confSchemaOperations = $em->getRepository('ConfigBundle:ConfSchemaOperation')->findAll();

        return $this->render('confschemaoperation/index.html.twig', array(
            'confSchemaOperations' => $confSchemaOperations,
        ));
    }

    /**
     * Creates a new confSchemaOperation entity.
     *
     * @Route("/new", name="schemaoperation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $confSchemaOperation = new Confschemaoperation();
        $form = $this->createForm('ConfigBundle\Form\ConfSchemaOperationType', $confSchemaOperation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confSchemaOperation);
            $em->flush();

            return $this->redirectToRoute('schemaoperation_show', array('id' => $confSchemaOperation->getId()));
        }

        return $this->render('confschemaoperation/new.html.twig', array(
            'confSchemaOperation' => $confSchemaOperation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a confSchemaOperation entity.
     *
     * @Route("/{id}", name="schemaoperation_show")
     * @Method("GET")
     */
    public function showAction(ConfSchemaOperation $confSchemaOperation)
    {
        $deleteForm = $this->createDeleteForm($confSchemaOperation);

        return $this->render('confschemaoperation/show.html.twig', array(
            'confSchemaOperation' => $confSchemaOperation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing confSchemaOperation entity.
     *
     * @Route("/{id}/edit", name="schemaoperation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfSchemaOperation $confSchemaOperation)
    {
        $deleteForm = $this->createDeleteForm($confSchemaOperation);
        $editForm = $this->createForm('ConfigBundle\Form\ConfSchemaOperationType', $confSchemaOperation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('schemaoperation_edit', array('id' => $confSchemaOperation->getId()));
        }

        return $this->render('confschemaoperation/edit.html.twig', array(
            'confSchemaOperation' => $confSchemaOperation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a confSchemaOperation entity.
     *
     * @Route("/{id}", name="schemaoperation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfSchemaOperation $confSchemaOperation)
    {
        $form = $this->createDeleteForm($confSchemaOperation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confSchemaOperation);
            $em->flush();
        }

        return $this->redirectToRoute('schemaoperation_index');
    }

    /**
     * Creates a form to delete a confSchemaOperation entity.
     *
     * @param ConfSchemaOperation $confSchemaOperation The confSchemaOperation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfSchemaOperation $confSchemaOperation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('schemaoperation_delete', array('id' => $confSchemaOperation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
