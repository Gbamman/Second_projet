<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfParametrageCompteComptable
 *
 * @ORM\Table(name="conf_parametrage_compte_comptable")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfParametrageCompteComptableRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"parametragecompteordinaire" = "ConfParametrageCompteComptableOrdinaire", "parametragecomptetitre" = "ConfParametrageCompteComptableTitre"})
 */
abstract class ConfParametrageCompteComptable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="ConfCompteComptablePlan")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compte;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_compte_comptable_societe", type="string", length=500)
     */
    private $libelleCompteComptableSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="code_compte_comptable_societe", type="string", length=30)
     */
    private $codeCompteComptableSociete;

    /**
     * @ORM\ManyToOne(targetEntity="ConfPlan")
     * @ORM\JoinColumn(nullable=false)
     */
    private $plan;

    /**
     * @ORM\ManyToOne(targetEntity="ConfTypeTiers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeTiers;





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
     * Set libelleCompteComptableSociete
     *
     * @param string $libelleCompteComptableSociete
     *
     * @return ConfParametrageCompteComptable
     */
    public function setLibelleCompteComptableSociete($libelleCompteComptableSociete)
    {
        $this->libelleCompteComptableSociete = $libelleCompteComptableSociete;

        return $this;
    }

    /**
     * Get libelleCompteComptableSociete
     *
     * @return string
     */
    public function getLibelleCompteComptableSociete()
    {
        return $this->libelleCompteComptableSociete;
    }

    /**
     * Set codeCompteComptableSociete
     *
     * @param string $codeCompteComptableSociete
     *
     * @return ConfParametrageCompteComptable
     */
    public function setCodeCompteComptableSociete($codeCompteComptableSociete)
    {
        $this->codeCompteComptableSociete = $codeCompteComptableSociete;

        return $this;
    }

    /**
     * Get codeCompteComptableSociete
     *
     * @return string
     */
    public function getCodeCompteComptableSociete()
    {
        return $this->codeCompteComptableSociete;
    }

    /**
     * Set compte
     *
     * @param \ConfigBundle\Entity\ConfCompteComptablePlan $compte
     *
     * @return ConfParametrageCompteComptable
     */
    public function setCompte(\ConfigBundle\Entity\ConfCompteComptablePlan $compte)
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get compte
     *
     * @return \ConfigBundle\Entity\ConfCompteComptablePlan
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * Set plan
     *
     * @param \ConfigBundle\Entity\ConfPlan $plan
     *
     * @return ConfParametrageCompteComptable
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
     * Set typeTiers
     *
     * @param \ConfigBundle\Entity\ConfTypeTiers $typeTiers
     *
     * @return ConfParametrageCompteComptable
     */
    public function setTypeTiers(\ConfigBundle\Entity\ConfTypeTiers $typeTiers)
    {
        $this->typeTiers = $typeTiers;

        return $this;
    }

    /**
     * Get typeTiers
     *
     * @return \ConfigBundle\Entity\ConfTypeTiers
     */
    public function getTypeTiers()
    {
        return $this->typeTiers;
    }
}
