<?php

namespace ConfigBundle\Controller;

use ConfigBundle\Entity\ConfCompteComptablePlan;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Confcomptecomptableplan controller.
 *
 * @Route("comptecomptableplan")
 */
class ConfCompteComptablePlanController extends Controller
{
    /**
     * Lists all confCompteComptablePlan entities.
     *
     * @Route("/page/{page}", name="comptecomptableplan_index")
     * @Method("GET")
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        $nbMaxParPage = 8;
        $confCompteComptablePlans = $em->getRepository('ConfigBundle:ConfCompteComptablePlan')->findAllComptesPagineEtTrie($page, $nbMaxParPage);

        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($confCompteComptablePlans) / $nbMaxParPage),
            'nomRoute' => 'comptecomptableplan_index',
            'paramsRoute' => array()
        );

        return $this->render('confcomptecomptableplan/index.html.twig', array(
            'confCompteComptablePlans' => $confCompteComptablePlans,'pagination'=>$pagination
        ));
    }

    /**
     * Creates a new confCompteComptablePlan entity.
     *
     * @Route("/new", name="comptecomptableplan_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $confCompteComptablePlan = new Confcomptecomptableplan();
        $form = $this->createForm('ConfigBundle\Form\ConfCompteComptablePlanType', $confCompteComptablePlan);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confCompteComptablePlan);
            $em->flush();

            return $this->redirectToRoute('comptecomptableplan_show', array('id' => $confCompteComptablePlan->getId()));
        }

        return $this->render('confcomptecomptableplan/new.html.twig', array(
            'confCompteComptablePlan' => $confCompteComptablePlan,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a confCompteComptablePlan entity.
     *
     * @Route("/{id}", name="comptecomptableplan_show")
     * @Method("GET")
     */
    public function showAction(ConfCompteComptablePlan $confCompteComptablePlan)
    {
        $deleteForm = $this->createDeleteForm($confCompteComptablePlan);

        return $this->render('confcomptecomptableplan/show.html.twig', array(
            'confCompteComptablePlan' => $confCompteComptablePlan,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing confCompteComptablePlan entity.
     *
     * @Route("/{id}/edit", name="comptecomptableplan_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfCompteComptablePlan $confCompteComptablePlan)
    {
        $deleteForm = $this->createDeleteForm($confCompteComptablePlan);
        $editForm = $this->createForm('ConfigBundle\Form\ConfCompteComptablePlanType', $confCompteComptablePlan);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comptecomptableplan_edit', array('id' => $confCompteComptablePlan->getId()));
        }

        return $this->render('confcomptecomptableplan/edit.html.twig', array(
            'confCompteComptablePlan' => $confCompteComptablePlan,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a confCompteComptablePlan entity.
     *
     * @Route("/{id}", name="comptecomptableplan_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfCompteComptablePlan $confCompteComptablePlan)
    {
        $form = $this->createDeleteForm($confCompteComptablePlan);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confCompteComptablePlan);
            $em->flush();
        }

        return $this->redirectToRoute('comptecomptableplan_index');
    }

    /**
     * Creates a form to delete a confCompteComptablePlan entity.
     *
     * @param ConfCompteComptablePlan $confCompteComptablePlan The confCompteComptablePlan entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfCompteComptablePlan $confCompteComptablePlan)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comptecomptableplan_delete', array('id' => $confCompteComptablePlan->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
