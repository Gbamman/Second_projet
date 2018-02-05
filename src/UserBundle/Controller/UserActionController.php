<?php

namespace UserBundle\Controller;

use UserBundle\Entity\UserAction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Useraction controller.
 *
 * @Route("action")
 */
class UserActionController extends Controller
{
    /**
     * Lists all userAction entities.
     *
     * @Route("/", name="action_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userActions = $em->getRepository('UserBundle:UserAction')->findAll();

        return $this->render('useraction/index.html.twig', array(
            'userActions' => $userActions,
        ));
    }

    /**
     * Creates a new userAction entity.
     *
     * @Route("/new", name="action_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $userAction = new Useraction();
        $form = $this->createForm('UserBundle\Form\UserActionType', $userAction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($userAction);
            $em->flush();

            return $this->redirectToRoute('action_show', array('id' => $userAction->getId()));
        }

        return $this->render('useraction/new.html.twig', array(
            'userAction' => $userAction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a userAction entity.
     *
     * @Route("/{id}", name="action_show")
     * @Method("GET")
     */
    public function showAction(UserAction $userAction)
    {
        $deleteForm = $this->createDeleteForm($userAction);

        return $this->render('useraction/show.html.twig', array(
            'userAction' => $userAction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing userAction entity.
     *
     * @Route("/{id}/edit", name="action_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, UserAction $userAction)
    {
        $deleteForm = $this->createDeleteForm($userAction);
        $editForm = $this->createForm('UserBundle\Form\UserActionType', $userAction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('action_edit', array('id' => $userAction->getId()));
        }

        return $this->render('useraction/edit.html.twig', array(
            'userAction' => $userAction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a userAction entity.
     *
     * @Route("/{id}", name="action_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, UserAction $userAction)
    {
        $form = $this->createDeleteForm($userAction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($userAction);
            $em->flush();
        }

        return $this->redirectToRoute('action_index');
    }

    /**
     * Creates a form to delete a userAction entity.
     *
     * @param UserAction $userAction The userAction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UserAction $userAction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('action_delete', array('id' => $userAction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
