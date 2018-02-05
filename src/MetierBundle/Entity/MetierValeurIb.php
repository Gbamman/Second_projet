<?php

namespace MetierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetierValeurIb
 *
 * @ORM\Table(name="metier_valeur_ib")
 * @ORM\Entity(repositoryClass="MetierBundle\Repository\MetierValeurIbRepository")
 */
class MetierValeurIb
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
     * @ORM\Column(name="type_tiers", type="string", length=255)
     */
    private $typeTiers;

    /**
     * @var int
     *
     * @ORM\Column(name="id_operation_front", type="integer")
     */
    private $idOperationFront;

    /**
     * @var string
     *
     * @ORM\Column(name="code_societe", type="string", length=255)
     */
    private $codeSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="decimal", precision=10, scale=2)
     */
    private $valeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


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
     * Set typeTiers
     *
     * @param string $typeTiers
     *
     * @return ValeurIb
     */
    public function setTypeTiers($typeTiers)
    {
        $this->typeTiers = $typeTiers;

        return $this;
    }

    /**
     * Get typeTiers
     *
     * @return string
     */
    public function getTypeTiers()
    {
        return $this->typeTiers;
    }

    /**
     * Set idOperationFront
     *
     * @param integer $idOperationFront
     *
     * @return ValeurIb
     */
    public function setIdOperationFront($idOperationFront)
    {
        $this->idOperationFront = $idOperationFront;

        return $this;
    }

    /**
     * Get idOperationFront
     *
     * @return int
     */
    public function getIdOperationFront()
    {
        return $this->idOperationFront;
    }

    /**
     * Set codeSociete
     *
     * @param string $codeSociete
     *
     * @return ValeurIb
     */
    public function setCodeSociete($codeSociete)
    {
        $this->codeSociete = $codeSociete;

        return $this;
    }

    /**
     * Get codeSociete
     *
     * @return string
     */
    public function getCodeSociete()
    {
        return $this->codeSociete;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     *
     * @return ValeurIb
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ValeurIb
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
}
