<?php

namespace MetierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetierMouvement
 *
 * @ORM\Table(name="metier_mouvement")
 * @ORM\Entity(repositoryClass="MetierBundle\Repository\MetierMouvementRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"mouvementordinaire" = "MetierMouvementOrdinaire", "mouvementtitre" = "MetierMouvementTitre"})
 */
 abstract  class MetierMouvement
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
     * @var string
     *
     * @ORM\Column(name="sens", type="string", length=3)
     */
    private $sens;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="decimal", precision=10, scale=2)
     */
    private $valeur;

    /**
     * @var string
     *
     * @ORM\Column(name="ancien_solde", type="decimal", precision=10, scale=2)
     */
    private $ancienSolde;

    /**
     * @var string
     *
     * @ORM\Column(name="nouveau_solde", type="decimal", precision=10, scale=2)
     */
    private $nouveauSolde;

    /**
     * @var bool
     *
     * @ORM\Column(name="espece", type="boolean",nullable=true)
     */
    private $espece;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var int
     *
     * @ORM\Column(name="id_titre", type="integer",nullable=true)
     */
    private $idTitre;

    /**
     * @ORM\ManyToOne(targetEntity="MetierOperation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $operation;

    /**
     * @ORM\ManyToOne(targetEntity="ConfigBundle\Entity\ConfNatureOperation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $natureOperation;

    /**
     * @ORM\ManyToOne(targetEntity="ConfigBundle\Entity\ConfCompteComptablePlan")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteComptablePlan;

     /**
     * @ORM\ManyToOne(targetEntity="MetierTiers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tiers;



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
     * Set sens
     *
     * @param string $sens
     *
     * @return MetierMouvement
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
     * Set valeur
     *
     * @param string $valeur
     *
     * @return MetierMouvement
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set ancienSolde
     *
     * @param string $ancienSolde
     *
     * @return MetierMouvement
     */
    public function setAncienSolde($ancienSolde)
    {
        $this->ancienSolde = $ancienSolde;

        return $this;
    }

    /**
     * Get ancienSolde
     *
     * @return string
     */
    public function getAncienSolde()
    {
        return $this->ancienSolde;
    }

    /**
     * Set nouveauSolde
     *
     * @param string $nouveauSolde
     *
     * @return MetierMouvement
     */
    public function setNouveauSolde($nouveauSolde)
    {
        $this->nouveauSolde = $nouveauSolde;

        return $this;
    }

    /**
     * Get nouveauSolde
     *
     * @return string
     */
    public function getNouveauSolde()
    {
        return $this->nouveauSolde;
    }

    /**
     * Set espece
     *
     * @param boolean $espece
     *
     * @return MetierMouvement
     */
    public function setEspece($espece)
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * Get espece
     *
     * @return boolean
     */
    public function getEspece()
    {
        return $this->espece;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return MetierMouvement
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
     * Set idTitre
     *
     * @param integer $idTitre
     *
     * @return MetierMouvement
     */
    public function setIdTitre($idTitre)
    {
        $this->idTitre = $idTitre;

        return $this;
    }

    /**
     * Get idTitre
     *
     * @return integer
     */
    public function getIdTitre()
    {
        return $this->idTitre;
    }

    /**
     * Set operation
     *
     * @param \MetierBundle\Entity\MetierOperation $operation
     *
     * @return MetierMouvement
     */
    public function setOperation(\MetierBundle\Entity\MetierOperation $operation)
    {
        $this->operation = $operation;

        return $this;
    }

    /**
     * Get operation
     *
     * @return \MetierBundle\Entity\MetierOperation
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set natureOperation
     *
     * @param \ConfigBundle\Entity\ConfNatureOperation $natureOperation
     *
     * @return MetierMouvement
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
     * Set compteComptablePlan
     *
     * @param \ConfigBundle\Entity\ConfCompteComptablePlan $compteComptablePlan
     *
     * @return MetierMouvement
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
     * Set tiers
     *
     * @param \MetierBundle\Entity\MetierTiers $tiers
     *
     * @return MetierMouvement
     */
    public function setTiers(\MetierBundle\Entity\MetierTiers $tiers)
    {
        $this->tiers = $tiers;

        return $this;
    }

    /**
     * Get tiers
     *
     * @return \MetierBundle\Entity\MetierTiers
     */
    public function getTiers()
    {
        return $this->tiers;
    }
}
