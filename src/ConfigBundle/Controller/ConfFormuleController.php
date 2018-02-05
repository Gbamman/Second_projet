<?php

namespace ConfigBundle\Controller;

use ConfigBundle\Entity\ConfFormule;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Confformule controller.
 *
 * @Route("formule")
 */
class ConfFormuleController extends Controller
{
    /**
     * Lists all confFormule entities.
     *
     * @Route("/", name="formule_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $confFormules = $em->getRepository('ConfigBundle:ConfFormule')->findAll();

        return $this->render('confformule/index.html.twig', array(
            'confFormules' => $confFormules,
        ));
    }

    /**
     * Creates a new confFormule entity.
     *
     * @Route("/new", name="formule_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $confFormule = new Confformule();
        $form = $this->createForm('ConfigBundle\Form\ConfFormuleType', $confFormule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confFormule);
            $em->flush();

            return $this->redirectToRoute('formule_show', array('id' => $confFormule->getId()));
        }

        return $this->render('confformule/new.html.twig', array(
            'confFormule' => $confFormule,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a confFormule entity.
     *
     * @Route("/{id}", name="formule_show")
     * @Method("GET")
     */
    public function showAction(ConfFormule $confFormule)
    {
        $deleteForm = $this->createDeleteForm($confFormule);

        return $this->render('confformule/show.html.twig', array(
            'confFormule' => $confFormule,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing confFormule entity.
     *
     * @Route("/{id}/edit", name="formule_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfFormule $confFormule)
    {
        $deleteForm = $this->createDeleteForm($confFormule);
        $editForm = $this->createForm('ConfigBundle\Form\ConfFormuleType', $confFormule);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formule_edit', array('id' => $confFormule->getId()));
        }

        return $this->render('confformule/edit.html.twig', array(
            'confFormule' => $confFormule,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a confFormule entity.
     *
     * @Route("/{id}", name="formule_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfFormule $confFormule)
    {
        $form = $this->createDeleteForm($confFormule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confFormule);
            $em->flush();
        }

        return $this->redirectToRoute('formule_index');
    }

    /**
     * Creates a form to delete a confFormule entity.
     *
     * @param ConfFormule $confFormule The confFormule entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfFormule $confFormule)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formule_delete', array('id' => $confFormule->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
