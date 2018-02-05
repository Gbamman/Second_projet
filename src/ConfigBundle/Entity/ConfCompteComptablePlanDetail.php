<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfCompteComptablePlanDetail
 *
 * @ORM\Table(name="conf_compte_comptable_plan_detail")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfCompteComptablePlanDetailRepository")
 */
class ConfCompteComptablePlanDetail
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
     * @var bool
     *
     * @ORM\Column(name="est_compte_mouvement", type="boolean")
     */
    private $estCompteMouvement;

    /**
     * @var bool
     *
     * @ORM\Column(name="est_compte_tiers", type="boolean")
     */
    private $estCompteTiers;

    /**
     * @var bool
     *
     * @ORM\Column(name="est_compte_banque", type="boolean")
     */
    private $estCompteBanque;

    /**
     * @var bool
     *
     * @ORM\Column(name="est_compte_caisse", type="boolean")
     */
    private $estCompteCaisse;

    /**
     * @ORM\ManyToOne(targetEntity="ConfCompteComptablePlan")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteComptablePlan;

    /**
     * @ORM\ManyToOne(targetEntity="TypeCompteComptable")
     * @ORM\JoinColumn(nullable=true)
     */
    private $typeCompteComptable;

    /**
     * @ORM\ManyToOne(targetEntity="ConfCategorieBilan")
     * @ORM\JoinColumn(nullable=true)
     */
    private $confCategorieBilan;




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set estCompteMouvement
     *
     * @param boolean $estCompteMouvement
     *
     * @return ConfCompteComptablePlanDetail
     */
    public function setEstCompteMouvement($estCompteMouvement)
    {
        $this->estCompteMouvement = $estCompteMouvement;

        return $this;
    }

    /**
     * Get estCompteMouvement
     *
     * @return boolean
     */
    public function getEstCompteMouvement()
    {
        return $this->estCompteMouvement;
    }

    /**
     * Set estCompteTiers
     *
     * @param boolean $estCompteTiers
     *
     * @return ConfCompteComptablePlanDetail
     */
    public function setEstCompteTiers($estCompteTiers)
    {
        $this->estCompteTiers = $estCompteTiers;

        return $this;
    }

    /**
     * Get estCompteTiers
     *
     * @return boolean
     */
    public function getEstCompteTiers()
    {
        return $this->estCompteTiers;
    }

    /**
     * Set estCompteBanque
     *
     * @param boolean $estCompteBanque
     *
     * @return ConfCompteComptablePlanDetail
     */
    public function setEstCompteBanque($estCompteBanque)
    {
        $this->estCompteBanque = $estCompteBanque;

        return $this;
    }

    /**
     * Get estCompteBanque
     *
     * @return boolean
     */
    public function getEstCompteBanque()
    {
        return $this->estCompteBanque;
    }

    /**
     * Set estCompteCaisse
     *
     * @param boolean $estCompteCaisse
     *
     * @return ConfCompteComptablePlanDetail
     */
    public function setEstCompteCaisse($estCompteCaisse)
    {
        $this->estCompteCaisse = $estCompteCaisse;

        return $this;
    }

    /**
     * Get estCompteCaisse
     *
     * @return boolean
     */
    public function getEstCompteCaisse()
    {
        return $this->estCompteCaisse;
    }

    /**
     * Set compteComptablePlan
     *
     * @param \ConfigBundle\Entity\ConfCompteComptablePlan $compteComptablePlan
     *
     * @return ConfCompteComptablePlanDetail
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
     * Set typeCompteComptable
     *
     * @param \ConfigBundle\Entity\TypeCompteComptable $typeCompteComptable
     *
     * @return ConfCompteComptablePlanDetail
     */
    public function setTypeCompteComptable(\ConfigBundle\Entity\TypeCompteComptable $typeCompteComptable = null)
    {
        $this->typeCompteComptable = $typeCompteComptable;

        return $this;
    }

    /**
     * Get typeCompteComptable
     *
     * @return \ConfigBundle\Entity\TypeCompteComptable
     */
    public function getTypeCompteComptable()
    {
        return $this->typeCompteComptable;
    }

    /**
     * Set confCategorieBilan
     *
     * @param \ConfigBundle\Entity\ConfCategorieBilan $confCategorieBilan
     *
     * @return ConfCompteComptablePlanDetail
     */
    public function setConfCategorieBilan(\ConfigBundle\Entity\ConfCategorieBilan $confCategorieBilan = null)
    {
        $this->confCategorieBilan = $confCategorieBilan;

        return $this;
    }

    /**
     * Get confCategorieBilan
     *
     * @return \ConfigBundle\Entity\ConfCategorieBilan
     */
    public function getConfCategorieBilan()
    {
        return $this->confCategorieBilan;
    }
}
