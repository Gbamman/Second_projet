<?php

namespace ConfigBundle\Controller;

use ConfigBundle\Entity\ConfPlan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Confplan controller.
 *
 * @Route("plan")
 */
class ConfPlanController extends Controller
{
    /**
     * Lists all confPlan entities.
     *
     * @Route("/", name="plan_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $confPlans = $em->getRepository('ConfigBundle:ConfPlan')->findAll();

        return $this->render('confplan/index.html.twig', array(
            'confPlans' => $confPlans,
        ));
    }

    /**
     * Creates a new confPlan entity.
     *
     * @Route("/new", name="plan_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $confPlan = new Confplan();
        $form = $this->createForm('ConfigBundle\Form\ConfPlanType', $confPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confPlan);
            $em->flush();

            return $this->redirectToRoute('plan_show', array('id' => $confPlan->getId()));
        }

        return $this->render('confplan/new.html.twig', array(
            'confPlan' => $confPlan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a confPlan entity.
     *
     * @Route("/{id}", name="plan_show")
     * @Method("GET")
     */
    public function showAction(ConfPlan $confPlan)
    {
        $deleteForm = $this->createDeleteForm($confPlan);

        return $this->render('confplan/show.html.twig', array(
            'confPlan' => $confPlan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing confPlan entity.
     *
     * @Route("/{id}/edit", name="plan_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfPlan $confPlan)
    {
        $deleteForm = $this->createDeleteForm($confPlan);
        $editForm = $this->createForm('ConfigBundle\Form\ConfPlanType', $confPlan);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('plan_edit', array('id' => $confPlan->getId()));
        }

        return $this->render('confplan/edit.html.twig', array(
            'confPlan' => $confPlan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a confPlan entity.
     *
     * @Route("/{id}", name="plan_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfPlan $confPlan)
    {
        $form = $this->createDeleteForm($confPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confPlan);
            $em->flush();
        }

        return $this->redirectToRoute('plan_index');
    }

    /**
     * Creates a form to delete a confPlan entity.
     *
     * @param ConfPlan $confPlan The confPlan entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfPlan $confPlan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('plan_delete', array('id' => $confPlan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
