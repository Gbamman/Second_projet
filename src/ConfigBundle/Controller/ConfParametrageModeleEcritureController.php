<?php

namespace ConfigBundle\Controller;

use ConfigBundle\Entity\ConfDetailModele;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Confdetailmodele controller.
 *
 * @Route("parametrage")
 */
class ConfParametrageModeleEcritureController extends Controller
{


    /**
     * Lists all confPlan entities.
     *
     * @Route("/", name="detailmodele_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $plans = $this->get("doctrine")->getRepository("ConfigBundle:ConfPlan")->findBy(array("supprimer" => false));
        $typesoperations = $this->get("doctrine")->getRepository("ConfigBundle:ConfTypeOperation")->findBy(array("supprimer" => false));
        $natures = array();
        $schemas = array();

        return $this->render('confdetailmodele/parametrage.html.twig',
                        array("plans" => $plans,
                              "typesoperations" => $typesoperations,
                              "natures" => $natures,
                              "schemas" => $schemas));
    }




    /**
     * On recherche le compte comptable.
     *
     * @Route("/find/comptecomptable", name="parametrage_findcompte", options = { "expose" = true })
     * @Method("POST")
     */
    public function findCompteComptableAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $name = $request->get("name");
            $codeplan = $request->get("codeplan");
            $plan = $this->get("doctrine")->getRepository("ConfigBundle:ConfPlan")->findOneBy(array("codePlan" => $codeplan));

            //die($codeplan);
            $comptes = $this->get("doctrine")->getRepository("ConfigBundle:ConfCompteComptablePlan")->findComptecomptable($name, $plan->getId());
            return $this->render("confdetailmodele/findcomptecomptable.html.twig", array('comptes' => $comptes));
        }
        else{
            die("erreur");
        }

    }


    /**
     * Get DetailModele .
     *
     * @Route("/get/modeles", name="parametrage_getmodele", options = { "expose" = true })
     * @Method("POST")
     */
    public function getModeleEcritureAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $nature = $request->get("nature");
            $plan = $request->get("plan");

            $planO = $this->get("doctrine")->getRepository("ConfigBundle:ConfPlan")->findOneBy(array("codePlan" => $plan));
            $natureO = $this->get("doctrine")->getRepository("ConfigBundle:ConfNatureOperation")->findOneBy(array("codeNatureOperation" => $nature));

            $modeles = $this->get("doctrine")->getRepository("ConfigBundle:ConfDetailModele")->findBy(array("plan" => $planO, "natureOperation" => $natureO));

            //die(dump($plan, $planO, $nature, $natureO, $modeles));
            return $this->render("confdetailmodele/modeleecriture.html.twig", array('modeles' => $modeles));
        }
        else{
            die("Erreur");
        }

    }



    /**
     * Get SchemaOperation .
     *
     * @Route("/get/schema", name="parametrage_getschema", options = { "expose" = true })
     * @Method("POST")
     */
    public function getSchemaOperationAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $codeplan = $request->get("codeplan");
            $typeop = $request->get("typeop");
            $plan = $this->get("doctrine")->getRepository("ConfigBundle:ConfPlan")->findOneBy(array("codePlan" => $codeplan));
            $typeoperation = $this->get("doctrine")->getRepository("ConfigBundle:ConfTypeOperation")->findOneBy(array("codeTypeOperation" => $typeop));

            $schemas = $this->get("doctrine")->getRepository("ConfigBundle:ConfSchemaOperation")->findBy(array("typeOperation" => $typeoperation, "societe" => $plan->getSociete()));

            /*die(dump($codeplan, $typeop, $plan, $typeoperation,  $schemas));*/
            return $this->render("confdetailmodele/schemaoperation.html.twig", array('schemas' => $schemas));
        }
        else{
            die("erreur");
        }

    }





    /**
     * Get Nature Operation .
     *
     * @Route("/get/nature", name="parametrage_getnature", options = { "expose" = true })
     * @Method("POST")
     */
    public function getNatureOperationAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $codeschema = $request->get("codeschema");

            $schema = $this->get("doctrine")->getRepository("ConfigBundle:ConfSchemaOperation")->findOneBy(array("codeSchema" => $codeschema));


            $natures = $this->get("doctrine")->getRepository("ConfigBundle:ConfNatureOperation")->findBy(array("schemaOperation" => $schema));

            return $this->render("confdetailmodele/natureoperation.html.twig", array('natures' => $natures));
        }
        else{
            die("Erreur");
        }

    }




    /**
     * Get Formules .
     *
     * @Route("/get/formule", name="parametrage_getformule", options = { "expose" = true })
     * @Method("POST")
     */
    public function getFormulesNatureAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $codenature = $request->get("codenature");
            $natureO = $this->get("doctrine")->getRepository("ConfigBundle:ConfNatureOperation")->findOneBy(array("codeNatureOperation" => $codenature));

            $formules = $this->get("doctrine")->getRepository("ConfigBundle:ConfFormuleNatureOperation")->findBy(array("natureOperation" =>$natureO));

            return $this->render("confdetailmodele/formulenatureoperation.html.twig", array('formules' => $formules));
        }
        else{
            die("Erreur");
        }

    }




    /**
     * Sauvegarde du jeu d'écriture .
     *
     * @Route("/save/modele", name="parametrage_savemodele", options = { "expose" = true })
     * @Method("POST")
     */
    public function saveModeleAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $table = $request->get("table");
            $codeplan = $request->get("plan");
            $codenature = $request->get("nature");

            $plan = $this->get("doctrine")->getRepository("ConfigBundle:ConfPlan")->findOneBy(array("codePlan" => $codeplan));
            $nature = $this->get("doctrine")->getRepository("ConfigBundle:ConfNatureOperation")->findOneBy(array("codeNatureOperation" => $codenature));

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

      /****************************************Pyrex**********************************/
    /**
     *formulaire de parametre à partie du schema .
     *
     * @Route("/formulaire/parametrage/schema", name="affichage_modele_a_partir_du_schema", options = { "expose" = true })
     * @Method("GET")
     */

    public function FormulaireSchemaParametregeAction()
    {
       $plans = $this->get("doctrine")->getRepository("ConfigBundle:ConfPlan")->findBy(array("supprimer" => false));
        $typesoperations = $this->get("doctrine")->getRepository("ConfigBundle:ConfTypeOperation")->findBy(array("supprimer" => false));
        $TypeTiersAll = $this->get("doctrine")->getRepository("ConfigBundle:ConfTypeTiers")->findAll();
        $titre = $this->get("doctrine")->getRepository("ConfigBundle:ConfTypeTiers")->findBy(array("typeIb" => "TRE"));
        $titreAll = $this->get("doctrine")->getRepository("MetierBundle:MetierTiers")->findBy(array("typeTiers" => $titre));
        $natures = array();
        $schemas = array();
        $tiersAll = array();
        $titre = array();
        foreach ($TypeTiersAll as $key => $value) {
          if ($value->getTypeIb() == "TRE") {
          } else {
            //$total = count((array)$value);
            //var_dump(sizeof($value));
              $tiersRecup = $this->get("doctrine")->getRepository("MetierBundle:MetierTiers")->findBy(array("typeTiers" => $value));
              if(count($tiersRecup)>0){
            array_push($tiersAll,$tiersRecup[0]);
            }
          }
        }
        //die(dump($titreAll,$tiersAll));
        return $this->render('confdetailmodele/modeleecritureformulaireschema.html.twig',
                        array("plans" => $plans,
                              "typesoperations" => $typesoperations,
                              "titres" => $titreAll,
                              "tiers" => $tiersAll,
                              "schemas" => $schemas));
    }

    /**
     * Sauvegarde du jeu d'écriture .
     *
     * @Route("/charger/modele/schema", name="charger_modele_a_partir_du_schema", options = { "expose" = true })
     * @Method("POST")
     */
    public function AffichageDuModeleApartirDuSchemaAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $codeplan = $request->get("plan");
            $schema = $request->get("schema");

            $planO = $this->get("doctrine")->getRepository("ConfigBundle:ConfPlan")->findOneBy(array("codePlan" => $codeplan));
            //
            $societeId = $planO->getSociete()->getId();
            $schemaO = $this->get("doctrine")->getRepository("ConfigBundle:ConfSchemaOperation")->findOneBy(array("codeSchema" => $schema,"societe"=>$societeId));
           
            $schemaId = $schemaO->getId();
            $natureO = $this->get("doctrine")->getRepository("ConfigBundle:ConfNatureOperation")->findBy(array("schemaOperation" => $schemaId));
            //die(dump($natureO));
              $modeleArray = array();
              foreach ($natureO as $key => $value) {
                 $modeles = $this->get("doctrine")->getRepository("ConfigBundle:ConfDetailModele")->findBy(array("plan" => $planO, "natureOperation" => $value), array('natureOperation' => 'asc'));
                  //$modeles['designation'] = $value->getDesignation();
                 array_push($modeleArray, $modeles);
              }
               //die(dump($modeleArray));
            /*$modeles = $this->get("doctrine")->getRepository("ConfigBundle:ConfDetailModele")->findBy(array("plan" => $planO, "natureOperation" => $natureO));*/
             //die(dump($modeles));
            //die(dump($plan, $planO, $nature, $natureO, $modeles));
            return $this->render("confdetailmodele/modeleecriture2.html.twig", array('modeles' => $modeleArray));
        }
        else{
            die("Erreur");
        }
    }

 /****************************************End Pyrex**********************************/




}
