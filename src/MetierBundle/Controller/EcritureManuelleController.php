<?php

namespace MetierBundle\Controller;

use MetierBundle\Entity\MetierDetailsOperation;
use MetierBundle\Entity\MetierOperation;
use MetierBundle\Entity\MetierTransaction;
use MetierBundle\Entity\MetierMouvementOrdinaire;
use MetierBundle\Entity\MetierMouvementTitre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use ConfigBundle\Entity\ConfSociete;
use ConfigBundle\Entity\ConfDetailModele;

/**
 * Confagence controller.
 *
 * @Route("ecritures")
 */

class EcritureManuelleController extends Controller
{
    /**
     * Passer des écritures comptables manuellement
     *
     * @Route("/manuelle", name="ecriture_manuelle")
     * @Method({"GET", "POST"})
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $plans = $em->getRepository('ConfigBundle:ConfPlan')->findAll();
        $titres = array();

        $analityque_titre = $em->getRepository("ConfigBundle:ConfTypeTiers")->findOneBy(array("typeIb" => "TRE"));

        if(null != $analityque_titre)
            $titres = $em->getRepository('MetierBundle:MetierTiers')->findBy(array("typeTiers" => $analityque_titre));


        return $this->render('ecrituremanuelle/ecrituremanuelle.html.twig', array(
            'plans' => $plans,
            'titres' => $titres,
        ));
    }


    /**
     * Get Journaux .
     *
     * @Route("/get/journaux", name="ecriture_getjournaux", options = { "expose" = true })
     * @Method("POST")
     */
    public function getJournauxAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $plan = $request->get("plan");

            $planO = $this->get("doctrine")->getRepository("ConfigBundle:ConfPlan")->findOneBy(array("codePlan" => $plan));

            $journaux = $this->get("doctrine")->getRepository("ConfigBundle:ConfJournal")->findBy(array("societe" => $planO->getSociete()));

            //die(dump($plan, $planO, $nature, $natureO, $modeles));
            return $this->render("ecrituremanuelle/journal.html.twig", array('journaux' => $journaux));
        }
        else{
            die("Erreur");
        }

    }


     /**
     * Get Tiers .
     *
     * @Route("/get/tiers", name="ecriture_gettiers", options = { "expose" = true })
     * @Method("POST")
     */
    public function getTiersAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $plan = $request->get("plan");

            $planO = $this->get("doctrine")->getRepository("ConfigBundle:ConfPlan")->findOneBy(array("codePlan" => $plan));

            $tiers = $this->get("doctrine")->getRepository("MetierBundle:MetierTiers")->findBy(array("societe" => $planO->getSociete()));

            //die(dump($plan, $planO, $nature, $natureO, $modeles));
            return $this->render("ecrituremanuelle/tiers.html.twig", array('tiers' => $tiers));
        }
        else{
            die("Erreur");
        }

    }



    /**
     * Sauvegarde du jeu d'écriture .
     *
     * @Route("/manuel/ecriture", name="ecriture_passer_manuelle", options = { "expose" = true })
     * @Method("POST")
     */
    public function passerEcritureManuelleAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $table = $request->get("table");
            $codeplan = $request->get("plan");
            $codejournal = $request->get("journal");
            $datesaisie = $this->dateToMySQL($request->get("datesaisie"));
            $dateoperation = $this->dateToMySQL($request->get("dateoperation"));

            $em = $this->get("doctrine")->getManager();

            $plan = $this->get("doctrine")->getRepository("ConfigBundle:ConfPlan")->findOneBy(array("codePlan" => $codeplan));
            $journal = $this->get("doctrine")->getRepository("ConfigBundle:ConfJournal")->findOneBy(array("codeJournal" => $codejournal));

            //$transaction = $em->getRepository("MetierBundle:MetierTransaction")->find


            //On crée l'opération
            $idop = $plan->getSociete()->getcodeSociete().$this->random(10);
            $operation = new MetierOperation();
            $operation->setIdOperationFront($idop)
                ->setValeur(00)
                ->setJournal($journal)
                ->setSociete($plan->getSociete())
                ->setAgence(null)
                ->setLibelle("Opération Manuelle")
                ->setTransaction()
                ->set;
            $detailOperation =  new MetierDetailsOperation();
            $detailOperation->setDateSaisie($datesaisie)
                ->setDateValeur($dateoperation)
                ->setOperation($operation);


            $modelesexistants = $this->get("doctrine")->getRepository("ConfigBundle:ConfDetailModele")->findBy(array("natureOperation" => $nature, "plan" => $plan));

            $data = $table;
            //die(dump($data));

            $a = 0;
            $statut = 500;
            $message = "";
            $new = count($data) - 1;
            for($i=1; $i<count($data); $i++){

                $modele = null;
                //On gère en fonction d'une ligne nouvelle ou pas
                if($data[$i][0] != "0")
                    $modele = $this->get("doctrine")->getRepository("ConfigBundle:ConfDetailModele")->find($data[$i][0]);
                else{
                    $modele = new ConfDetailModele();
                    $new = $new +1;
                    $modele->setNumOrdre($new);
                }

                $comptecomptable = $this->get("doctrine")->getRepository("ConfigBundle:ConfCompteComptablePlan")->findOneBy(array("plan" => $plan, "numCompteComptable" => $data[$i][1]));

                $formule = $this->get("doctrine")->getRepository("ConfigBundle:ConfFormule")->findOneBy(array("codeFormule" => $data[$i][3]));

                $modele->setCompteComptablePlan($comptecomptable)
                    ->setSens($data[$i][2])
                    ->setFormule($formule)
//                ->setTypevaleur($data[$i][4])
                    ->setNatureOperation($nature)
                    ->setPlan($plan);

                $this->get("doctrine")->getManager()->persist($modele);
                $a = $a +1;

                //On met à jour notre liste de tableau
                if(null != $modelesexistants){
                    for($j=0; $j<count($modelesexistants); $j++){

                        if($modelesexistants[$j]->getId() == $modele->getId()){
                            unset($modelesexistants[$j]);
                            $modelesexistants = array_values($modelesexistants);

                        }
                    }
                }
                /*(dump($modele));*/
            }

            /*(dump($modelesexistants));
            die();*/
            if($a > 0)
            {
                try{

                    for($i=0; $i<count($modelesexistants); $i++){
                        $this->get("doctrine")->getManager()->remove($modelesexistants[$i]);
                    }
                    $this->get("doctrine")->getManager()->flush();

                    $message = "Le modèle a bien été enregistré ";
                    $statut = 200;
                }catch (\Exception $e){
                    $message = "Erreur: ".$e->getMessage();
                    $statut = 500;
                }

            }

            return $this->json(array('statut' => $statut, 'message' => $message));
        }
        else{
            die("erreur");
        }

    }

    /**
     * Sauvegarde du jeu d'écriture .
     *
     * @Route("/manuel/ecriture/schema", name="ecriture_passer_manuelle_schema", options = { "expose" = true })
     * @Method("POST")
     */
    public function passerEcritureManuelleAPartireAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $table = $request->get("table");
            $codeplan = $request->get("plan");
            $schema = $request->get("schema");
            $tiers  = $request->get("tiers");
            $titres = $request->get("titres");
            $libelle = $request->get("libelle");
            $message = "Le modèle a bien été enregistré ";
            $statut = 200;
            //die(dump($libelleOperation));
            /**$table = $request->get("table");
            $codeplan = $request->get("plan");
            $codejournal = $request->get("journal");
            $datesaisie = date_create_from_format("d/m/Y", $request->get("datesaisie"));
            $dateoperation = date_create_from_format("d/m/Y",$request->get("dateoperation"));
            $estTitre = $request->get("est_titre");
            $code_titre = $request->get("titre");*/

            $em = $this->get("doctrine")->getManager();

            $plan = $this->get("doctrine")->getRepository("ConfigBundle:ConfPlan")->findOneBy(array("codePlan" => $codeplan));
            /*$journal = $this->get("doctrine")->getRepository("ConfigBundle:ConfJournal")->findOneBy(array("codeJournal" => $codejournal));*/

            $schemaOp = $this->get("doctrine")->getRepository("ConfigBundle:ConfSchemaOperation")->findOneBy(array("codeSchema" => $schema));
            //$nature = $this->get("doctrine")->getRepository("ConfigBundle:ConfNatureOperation")->findOneBy(array("codeNatureOperation" => "OP_MANUELLE"));
            //die(dump($schemaOp));
           /// return $this->json(array('codeplan' =>$codeplan,'schema' =>$schemaOp,'statut' => $statut, 'message' => $message,'table' => $table[0]['natureOp']));
           // exit;
           /* if($nature == null){
                //on gère l'erreur et on arrête le processus
            }*/

            $date = new \DateTime();
            $transaction = $em->getRepository("MetierBundle:MetierTransaction")->findOneBy(array("schemaOperation" => $schemaOp, "dateTransaction" =>$date));

            if(null == $transaction){
                $transaction = new MetierTransaction();
                $transaction->setSociete($plan->getSociete())
                    ->setDateTransaction($date)
                    ->setCreated($date)
                    ->setSchemaOperation($schemaOp);
                $em->persist($transaction);
            }


            //On crée l'opération
             $date = new \DateTime();
             $dateoperation = new \DateTime();
             $datesaisie = new \DateTime();
            $idop = $plan->getSociete()->getcodeSociete().$this->random(10);
            $operation = new MetierOperation();
            $operation->setIdOperationFront($idop)
                ->setValeur(00)
                ->setJournal($schemaOp->getJournal())
                ->setSociete($plan->getSociete())
                ->setLibelle($libelle)
                ->setSchemaOperation($schemaOp)
                ->setTransaction($transaction);

            $em->persist($operation);

            $detailOperation =  new MetierDetailsOperation();
            $detailOperation->setDateSaisie($datesaisie)
                ->setDateValeur($dateoperation)
                ->setOperation($operation);
            $em->persist($detailOperation);

            $data = $table;
            //die(dump($data));

            $debit = 0;
            $credit = 0;
            //On vérifie si l'opération est équilibrée
            for($i=0; $i<count($data); $i++){
                if($data[$i]['natureSens'] == "D")
                    $debit += $data[$i]['valeursaisie'];
                else
                    $credit += $data[$i]['valeursaisie'];
            }

            $statut = 200;
            $message = "ecritures comptables passées";
            $estTitre = 'false';
            //Si l'opération est équilibrée
            if($credit == $debit){

                //die(dump($data));
                $tot = count($data);
                foreach ($data as $i => $value) {
                    # code...
                //for($i=0;$i<=$tot; $i++){
                    //s$tiers = null;
                    
                   if("" != $titres){
                        $mouvement = new MetierMouvementTitre();
                        $titre = $this->get("doctrine")->getRepository("MetierBundle:MetierTiers")->findOneBy( array("codeAnalytiqueTiers" => $titres, "societe" =>  $plan->getSociete()));
                        $mouvement->setTitre($titre);
                    } else{
                        $mouvement = new MetierMouvementOrdinaire();
                    }
                        

                     //if("" != $tiers)
                       


                    /*$comptecomptable = $this->get("doctrine")->getRepository("ConfigBundle:ConfCompteComptablePlan")->findOneBy(array("plan" => $plan, "numCompteComptable" => $data[$i][1]));*/
                    $nature = $this->get("doctrine")->getRepository("ConfigBundle:ConfNatureOperation")->findOneBy(array("id" => $value['natureId']));
                    $comptecomptable = $this->get("doctrine")->getRepository("ConfigBundle:ConfCompteComptablePlan")->findOneBy(array("plan" => $plan, "numCompteComptable" => $value['numComptePlan']));
                    $comptecomptableParametrage = $this->get("doctrine")->getRepository("ConfigBundle:ConfParametrageCompteComptable")->findOneBy(array("compte" => $comptecomptable));
                    //die(dump($comptecomptableParametrage->getTypeTiers()));
                     $tiersValRetour = $this->get("doctrine")->getRepository("MetierBundle:MetierTiers")->findOneBy(array("typeTiers" => $comptecomptableParametrage, "societe" => $plan->getSociete()));
                       //die(dump($tiersValRetour));
                     if ($tiersValRetour == null) {
                         $tiersVal = $this->get("doctrine")->getRepository("MetierBundle:MetierTiers")->findOneBy(array("codeAnalytiqueTiers" => $tiers, "societe" => $plan->getSociete()));
                     }else {
                         $tiersVal = $tiersValRetour;
                     }
                    
                    $mouvement->setNatureOperation($nature)
                        ->setSens($value['natureSens'])
                        ->setOperation($operation)
                        ->setCompteComptablePlan($comptecomptable)
                        ->setAncienSolde(0)
                        ->setNouveauSolde(0)
                         ->setCreated($date)
                        ->setTiers($tiersVal)
                        ->setValeur($value['valeursaisie']);

                    try{
                        $em->persist($mouvement);
                    }catch (\Exception $exception){
                        $statut = "500";
                        $message = "";
                    }
                }
                $em->flush();
            }
            else{ //Si l'opération est déséquilibrée

                $statut = "500";
                $message = "Opération déséquilibrée";
                
            }

            return $this->json(array('statut' => $statut, 'message' => $message,'debit'=>$debit,'credit'=>$credit));
        }
        else{
            die("erreur");
        }  

    }

    /**
     * Génère un mot de passe aléatoire
     */
    function random($nbrcar) {
        $string = "";
        $chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        srand((double)microtime()*1000000);
        for($i=0; $i<$nbrcar; $i++) {
            $string .= $chaine[rand()%strlen($chaine)];
        }
        return $string;
    }



    private function dateToMySQL($date){
        $tabDate = explode('/' , $date);
        $date  = $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
        $date = date( 'Y-m-d', strtotime($date) );
        return $date;
    }
}
