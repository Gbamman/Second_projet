<?php

namespace ConfigBundle\Controller;

use ConfigBundle\Entity\ConfSociete;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Confsociete controller.
 *
 * @Route("societe")
 */
class ConfSocieteController extends Controller
{
    /**
     * Lists all confSociete entities.
     *
     * @Route("/", name="societe_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $confSocietes = $em->getRepository('ConfigBundle:ConfSociete')->findAll();
        return $this->render('confsociete/index.html.twig', array(
            'confSocietes' => $confSocietes,
        ));
    }

    /**
     * Creates a new confSociete entity.
     *
     * @Route("/new", name="societe_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $confSociete = new Confsociete();
        $form = $this->createForm('ConfigBundle\Form\ConfSocieteType', $confSociete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($confSociete);
            $em->flush();

            return $this->redirectToRoute('societe_show', array('id' => $confSociete->getId()));
        }

        return $this->render('confsociete/new.html.twig', array(
            'confSociete' => $confSociete,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a confSociete entity.
     *
     * @Route("/{id}", name="societe_show")
     * @Method("GET")
     */
    public function showAction(ConfSociete $confSociete)
    {
        $deleteForm = $this->createDeleteForm($confSociete);

        return $this->render('confsociete/show.html.twig', array(
            'confSociete' => $confSociete,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing confSociete entity.
     *
     * @Route("/{id}/edit", name="societe_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ConfSociete $confSociete)
    {
        $deleteForm = $this->createDeleteForm($confSociete);
        $editForm = $this->createForm('ConfigBundle\Form\ConfSocieteType', $confSociete);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('societe_edit', array('id' => $confSociete->getId()));
        }

        return $this->render('confsociete/edit.html.twig', array(
            'confSociete' => $confSociete,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a confSociete entity.
     *
     * @Route("/{id}", name="societe_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ConfSociete $confSociete)
    {
        $form = $this->createDeleteForm($confSociete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($confSociete);
            $em->flush();
        }

        return $this->redirectToRoute('societe_index');
    }

    /**
     * Creates a form to delete a confSociete entity.
     *
     * @param ConfSociete $confSociete The confSociete entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ConfSociete $confSociete)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('societe_delete', array('id' => $confSociete->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**
     * @Route("/ajax/societe/",
     *     options = { "expose" = true },
     *     name = "societe_ajax_form_search",
     * )
     * @Method("POST")
     */
    public function loadListeSocieteByAjaxSearchAction(Request $request){
         if($request->isXmlHttpRequest()){
             $text = $request->get("text");
             $em = $this->getDoctrine()->getManager();
             $societes = $em->getRepository("ConfigBundle:ConfSociete")->findSocieteByAjaxSearchAction($text);
             //die(dump($societes));
             return $this->container->get('templating')->renderResponse('confsociete/include/tableau.html.twig', array('confSocietes' => $societes));

         }
    }
}
