<?php

namespace MetierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetierOperation
 *
 * @ORM\Table(name="metier_operation")
 * @ORM\Entity(repositoryClass="MetierBundle\Repository\MetierOperationRepository")
 */
class MetierOperation
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
     * @ORM\Column(name="id_operation_front", type="integer")
     */
    private $idOperationFront;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="decimal", precision=10, scale=2)
     */
    private $valeur;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle",  type="string", length=200)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


    /**
     * @ORM\ManyToOne(targetEntity="ConfigBundle\Entity\ConfSociete")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * @ORM\ManyToOne(targetEntity="ConfigBundle\Entity\ConfJournal")
     * @ORM\JoinColumn(nullable=false)
     */
    private $journal;

    /**
     * @ORM\ManyToOne(targetEntity="ConfigBundle\Entity\ConfSchemaOperation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $schemaOperation;

    /**
     * @ORM\ManyToOne(targetEntity="ConfigBundle\Entity\ConfAgence")
     * @ORM\JoinColumn(nullable=true)
     */
    private $agence;

    /**
     * @ORM\ManyToOne(targetEntity="MetierTransaction")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transaction;




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->created = New \DateTime();
    }


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
     * Set idOperationFront
     *
     * @param integer $idOperationFront
     *
     * @return MetierOperation
     */
    public function setIdOperationFront($idOperationFront)
    {
        $this->idOperationFront = $idOperationFront;

        return $this;
    }

    /**
     * Get idOperationFront
     *
     * @return integer
     */
    public function getIdOperationFront()
    {
        return $this->idOperationFront;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     *
     * @return MetierOperation
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return MetierOperation
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return MetierOperation
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
     * @return MetierOperation
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
     * Set journal
     *
     * @param \ConfigBundle\Entity\ConfJournal $journal
     *
     * @return MetierOperation
     */
    public function setJournal(\ConfigBundle\Entity\ConfJournal $journal)
    {
        $this->journal = $journal;

        return $this;
    }

    /**
     * Get journal
     *
     * @return \ConfigBundle\Entity\ConfJournal
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * Set schemaOperation
     *
     * @param \ConfigBundle\Entity\ConfSchemaOperation $schemaOperation
     *
     * @return MetierOperation
     */
    public function setSchemaOperation(\ConfigBundle\Entity\ConfSchemaOperation $schemaOperation)
    {
        $this->schemaOperation = $schemaOperation;

        return $this;
    }

    /**
     * Get schemaOperation
     *
     * @return \ConfigBundle\Entity\ConfSchemaOperation
     */
    public function getSchemaOperation()
    {
        return $this->schemaOperation;
    }

    /**
     * Set agence
     *
     * @param \ConfigBundle\Entity\ConfAgence $agence
     *
     * @return MetierOperation
     */
    public function setAgence(\ConfigBundle\Entity\ConfAgence $agence)
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * Get agence
     *
     * @return \ConfigBundle\Entity\ConfAgence
     */
    public function getAgence()
    {
        return $this->agence;
    }

    /**
     * Set transaction
     *
     * @param \MetierBundle\Entity\MetierTransaction $transaction
     *
     * @return MetierOperation
     */
    public function setTransaction(\MetierBundle\Entity\MetierTransaction $transaction)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return \MetierBundle\Entity\MetierTransaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }
}
