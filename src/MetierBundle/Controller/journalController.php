<?php

namespace MetierBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use ConfigBundle\Entity\ConfSociete;

class journalController extends Controller
{
    /**
     * Liste des journaux à l'etat initial.
     *
     * @Route("journaux/", name="journaux_index")
     * @Method("GET")
     */
    public function indexAction()
    {
          $em = $this->getDoctrine()->getManager();
          $confSocietes = $em->getRepository('ConfigBundle:ConfSociete')->findAll();
        return $this->render('journaux/index.html.twig', array(
            'societes' => $confSocietes,'Journaux'=>'',
        ));
    }

    /**
     * Liste des journaux.
     *
     * @Route("/liste/journaux", name="liste_journaux", options = { "expose" = true },condition="request.isXmlHttpRequest()")
     * @Method({"GET", "POST"})
     */
    public function listAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
                $data = $request->request->get('request');
                $datedebut = $this->dateToMySQL($request->get('date_debut'));
                $datefin = $this->dateToMySQL($request->get('date_fin'));
                $datedebut = $datedebut.' 00:00:00';
                 $datefin  =  $datefin.' 23:59:59';
                 $idsociete = $request->get('idsociete');
                $session = new Session();
                $session->set('datedebut',$datedebut);
                $session->set('datefin',$datefin);
                $session->set('idsociete',$idsociete);
                $em = $this->getDoctrine()->getManager();
                $Journaux = $em->getRepository('MetierBundle:MetierOperation')->getTypeJournalParPeriode($datedebut,$datefin,$idsociete);
                //die(dump($Journaux));
             //$Journaux = ['foo1' => $datedebut, 'foo2' => $datefin,'foo3' => $idsociete];
            
            return $this->container->get('templating')->renderResponse('journaux/include/tableau.html.twig', array('Journaux' =>$Journaux));
        /*$response = new Response();
            $response->setContent(json_encode($Journaux));
            $response->headers->set('Content-Type', 'application/json');
        return $response;*/
    }
    return new JsonResponse('no results found', Response::HTTP_NOT_FOUND);  
       
    }

     /**
     * Liste des opérations
     *
     * @Route("liste/operation/{id}", name="liste_operation")
     * @Method({"GET", "POST"})
     */
    public function listOperationAction(Request $request, $id)
    {
                
                $session = new Session();
                $datedebut = $session->get('datedebut');
                $datefin = $session->get('datefin');
                $idsociete = $session->get('idsociete');
                $idjournal = $id;
                 //$idsociete = $request->get('idsociete');
                $em = $this->getDoctrine()->getManager();
                $Operations = $em->getRepository('MetierBundle:MetierOperation')->getTypeOperationParPeriode($datedebut,$datefin,$idsociete,$idjournal);
            //die(dump($Operations));
        return $this->render('journaux/operation.html.twig',array('Operations' => $Operations,'Mouvements' => ""));
        /*$response = new Response();
            $response->setContent(json_encode($Journaux));
            $response->headers->set('Content-Type', 'application/json');
        return $response;*/
    
    return new JsonResponse('no results found', Response::HTTP_NOT_FOUND);  
       
    }

    /**
     * Afficahe des mouvement pour une opération selectionnées.
     *
     * @Route("liste/mouvements", name="liste_mouvement",options = { "expose" = true },condition="request.isXmlHttpRequest()")
     * @Method({"GET", "POST"})
     */
    public function listMouvementAction(Request $request)
    {
                
                $session = new Session();
                $datedebut = $session->get('datedebut');
                $datefin = $session->get('datefin');
                $idsociete = $session->get('idsociete');
                $idoperation = $request->get('idoperation');
                 //$idsociete = $request->get('idsociete');
                $em = $this->getDoctrine()->getManager();
                $Mouvements = $em->getRepository('MetierBundle:MetierOperation')->getMouventParPeriodeEtParTypeOperation($datedebut,$datefin,$idoperation);
                $MouvementSend = array();
                $allTab  = array();
                $valeurTemoin = "";
                foreach ($Mouvements as $key => $value) {
                    //dump($value['codeNatureOperation']);
                    if($valeurTemoin == ""){
                        $valeurTemoin = $value['codeNatureOperation'];
                    }else if($valeurTemoin == $value['codeNatureOperation']){
                    }else{
                         $allTab  = array();
                         $valeurTemoin = $value['codeNatureOperation'];
                         
                    }
                    array_push($allTab,$value);
                    $MouvementSend[$valeurTemoin] = $allTab;
                }
            //die(dump($MouvementSend,$valeurTemoin));
        return $this->render('journaux/include/modaloperation.html.twig',array('Mouvements' => $MouvementSend));
        /*$response = new Response();
            $response->setContent(json_encode($Journaux));
            $response->headers->set('Content-Type', 'application/json');
        return $response;*/
    
    return new JsonResponse('no results found', Response::HTTP_NOT_FOUND);  
       
    }

    private function dateToMySQL($date){
        $tabDate = explode('/' , $date);
        $date  = $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
        $date = date( 'Y-m-d', strtotime($date) );
        return $date;
    }
}
