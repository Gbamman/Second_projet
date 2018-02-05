<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfTauxFiscalApplique
 *
 * @ORM\Table(name="conf_taux_fiscal_applique")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfTauxFiscalAppliqueRepository")
 */
class ConfTauxFiscalApplique
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
     * @ORM\Column(name="num_taux_fisc", type="integer")
     */
    private $numTauxFisc;

    /**
     * @var bool
     *
     * @ORM\Column(name="est_taux_applique_ifu", type="boolean")
     */
    private $estTauxAppliqueIfu;

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
     * @ORM\ManyToOne(targetEntity="ConfFisc")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fisc;

    /**
     * @ORM\ManyToOne(targetEntity="ConfCompteComptablePlan")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteComptablePlan;


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
     * Set numTauxFisc
     *
     * @param integer $numTauxFisc
     *
     * @return ConfTauxFiscalApplique
     */
    public function setNumTauxFisc($numTauxFisc)
    {
        $this->numTauxFisc = $numTauxFisc;

        return $this;
    }

    /**
     * Get numTauxFisc
     *
     * @return int
     */
    public function getNumTauxFisc()
    {
        return $this->numTauxFisc;
    }

    /**
     * Set estTauxAppliqueIfu
     *
     * @param boolean $estTauxAppliqueIfu
     *
     * @return ConfTauxFiscalApplique
     */
    public function setEstTauxAppliqueIfu($estTauxAppliqueIfu)
    {
        $this->estTauxAppliqueIfu = $estTauxAppliqueIfu;

        return $this;
    }

    /**
     * Get estTauxAppliqueIfu
     *
     * @return bool
     */
    public function getEstTauxAppliqueIfu()
    {
        return $this->estTauxAppliqueIfu;
    }

    /**
     * Set supprimer
     *
     * @param boolean $supprimer
     *
     * @return ConfTauxFiscalApplique
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
     * @return ConfTauxFiscalApplique
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
     * @return ConfTauxFiscalApplique
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

    /**
     * Set fisc
     *
     * @param \ConfigBundle\Entity\ConfFisc $fisc
     *
     * @return ConfTauxFiscalApplique
     */
    public function setFisc(\ConfigBundle\Entity\ConfFisc $fisc)
    {
        $this->fisc = $fisc;

        return $this;
    }

    /**
     * Get fisc
     *
     * @return \ConfigBundle\Entity\ConfFisc
     */
    public function getFisc()
    {
        return $this->fisc;
    }

    /**
     * Set compteComptablePlan
     *
     * @param \ConfigBundle\Entity\ConfCompteComptablePlan $compteComptablePlan
     *
     * @return ConfTauxFiscalApplique
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
}
