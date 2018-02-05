<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfDetailModele
 *
 * @ORM\Table(name="conf_detail_modele")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfDetailModeleRepository")
 */
class ConfDetailModele
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="num_ordre", type="integer")
     */
    private $numOrdre;

    /**
     * @var string
     *
     * @ORM\Column(name="sens", type="string", length=3)
     */
    private $sens;

    /**
     * @ORM\ManyToOne(targetEntity="ConfCompteComptablePlan")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteComptablePlan;

    /**
     * @ORM\ManyToOne(targetEntity="ConfPlan")
     * @ORM\JoinColumn(nullable=false)
     */
    private $plan;

    /**
     * @ORM\ManyToOne(targetEntity="ConfNatureOperation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $natureOperation;

    /**
     * @ORM\ManyToOne(targetEntity="ConfFormule")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formule;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numOrdre
     *
     * @param integer $numOrdre
     *
     * @return ConfDetailModele
     */
    public function setNumOrdre($numOrdre)
    {
        $this->numOrdre = $numOrdre;

        return $this;
    }

    /**
     * Get numOrdre
     *
     * @return int
     */
    public function getNumOrdre()
    {
        return $this->numOrdre;
    }

    /**
     * Set sens
     *
     * @param string $sens
     *
     * @return ConfDetailModele
     */
    public function setSens($sens)
    {
        $this->sens = $sens;

        return $this;
    }

    /**
     * Get sens
     *
     * @return string
     */
    public function getSens()
    {
        return $this->sens;
    }

    /**
     * Set compteComptablePlan
     *
     * @param \ConfigBundle\Entity\ConfCompteComptablePlan $compteComptablePlan
     *
     * @return ConfDetailModele
     */
    public function setCompteComptablePlan(\ConfigBundle\Entity\ConfCompteComptablePlan $compteComptablePlan)
    {
        $this->compteComptablePlan = $compteComptablePlan;

        return $this;
    }

    /**
     * Get compteComptablePlan
     *
     * @return \ConfigBundle\Entity\ConfCompteComptablePlan
     */
    public function getCompteComptablePlan()
    {
        return $this->compteComptablePlan;
    }

    /**
     * Set plan
     *
     * @param \ConfigBundle\Entity\ConfPlan $plan
     *
     * @return ConfDetailModele
     */
    public function setPlan(\ConfigBundle\Entity\ConfPlan $plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return \ConfigBundle\Entity\ConfPlan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set natureOperation
     *
     * @param \ConfigBundle\Entity\ConfNatureOperation $natureOperation
     *
     * @return ConfDetailModele
     */
    public function setNatureOperation(\ConfigBundle\Entity\ConfNatureOperation $natureOperation)
    {
        $this->natureOperation = $natureOperation;

        return $this;
    }

    /**
     * Get natureOperation
     *
     * @return \ConfigBundle\Entity\ConfNatureOperation
     */
    public function getNatureOperation()
    {
        return $this->natureOperation;
    }

    /**
     * Set formule
     *
     * @param \ConfigBundle\Entity\ConfFormule $formule
     *
     * @return ConfDetailModele
     */
    public function setFormule(\ConfigBundle\Entity\ConfFormule $formule)
    {
        $this->formule = $formule;

        return $this;
    }

    /**
     * Get formule
     *
     * @return \ConfigBundle\Entity\ConfFormule
     */
    public function getFormule()
    {
        return $this->formule;
    }
}
