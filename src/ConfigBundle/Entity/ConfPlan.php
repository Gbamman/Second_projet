<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * ConfPlan
 *
 * @ORM\Table(name="conf_plan", indexes={@Index(name="code_plan_index", columns={"code_plan"})})
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfPlanRepository")
 */
class ConfPlan
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
     * @var string
     *
     * @ORM\Column(name="code_plan", type="string", length=255, unique=true)
     */
    private $codePlan;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="text")
     */
    private $designation;

    /**
     * @var int
     *
     * @ORM\Column(name="compte_capital_social", type="integer")
     */
    private $compteCapitalSocial;

    /**
     * @var int
     *
     * @ORM\Column(name="compte_resultat_instance_distribution", type="integer")
     */
    private $compteResultatInstanceDistribution;

    /**
     * @var int
     *
     * @ORM\Column(name="compte_benefice", type="integer")
     */
    private $compteBenefice;

    /**
     * @var int
     *
     * @ORM\Column(name="compte_perte", type="integer")
     */
    private $comptePerte;

    /**
     * @var bool
     *
     * @ORM\Column(name="supprimer", type="boolean")
     */
    private $supprimer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="ConfSociete")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->created = New \DateTime();
        $this->supprimer = false;
    }


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
     * Set codePlan
     *
     * @param string $codePlan
     *
     * @return ConfPlan
     */
    public function setCodePlan($codePlan)
    {
        $this->codePlan = $codePlan;

        return $this;
    }

    /**
     * Get codePlan
     *
     * @return string
     */
    public function getCodePlan()
    {
        return $this->codePlan;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return ConfPlan
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set compteCapitalSocial
     *
     * @param integer $compteCapitalSocial
     *
     * @return ConfPlan
     */
    public function setCompteCapitalSocial($compteCapitalSocial)
    {
        $this->compteCapitalSocial = $compteCapitalSocial;

        return $this;
    }

    /**
     * Get compteCapitalSocial
     *
     * @return int
     */
    public function getCompteCapitalSocial()
    {
        return $this->compteCapitalSocial;
    }

    /**
     * Set compteResultatInstanceDistribution
     *
     * @param integer $compteResultatInstanceDistribution
     *
     * @return ConfPlan
     */
    public function setCompteResultatInstanceDistribution($compteResultatInstanceDistribution)
    {
        $this->compteResultatInstanceDistribution = $compteResultatInstanceDistribution;

        return $this;
    }

    /**
     * Get compteResultatInstanceDistribution
     *
     * @return int
     */
    public function getCompteResultatInstanceDistribution()
    {
        return $this->compteResultatInstanceDistribution;
    }

    /**
     * Set compteBenefice
     *
     * @param integer $compteBenefice
     *
     * @return ConfPlan
     */
    public function setCompteBenefice($compteBenefice)
    {
        $this->compteBenefice = $compteBenefice;

        return $this;
    }

    /**
     * Get compteBenefice
     *
     * @return int
     */
    public function getCompteBenefice()
    {
        return $this->compteBenefice;
    }

    /**
     * Set comptePerte
     *
     * @param integer $comptePerte
     *
     * @return ConfPlan
     */
    public function setComptePerte($comptePerte)
    {
        $this->comptePerte = $comptePerte;

        return $this;
    }

    /**
     * Get comptePerte
     *
     * @return int
     */
    public function getComptePerte()
    {
        return $this->comptePerte;
    }

    /**
     * Set supprimer
     *
     * @param boolean $supprimer
     *
     * @return ConfPlan
     */
    public function setSupprimer($supprimer)
    {
        $this->supprimer = $supprimer;

        return $this;
    }

    /**
     * Get supprimer
     *
     * @return bool
     */
    public function getSupprimer()
    {
        return $this->supprimer;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ConfPlan
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set societe
     *
     * @param \ConfigBundle\Entity\ConfSociete $societe
     *
     * @return ConfPlan
     */
    public function setSociete(\ConfigBundle\Entity\ConfSociete $societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return \ConfigBundle\Entity\ConfSociete
     */
    public function getSociete()
    {
        return $this->societe;
    }
}
