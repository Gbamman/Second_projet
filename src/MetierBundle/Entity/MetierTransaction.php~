<?php

namespace MetierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetierTransaction
 *
 * @ORM\Table(name="metier_transaction")
 * @ORM\Entity(repositoryClass="MetierBundle\Repository\MetierTransactionRepository")
 */
class MetierTransaction
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_transaction", type="date")
     */
    private $dateTransaction;

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
     * @ORM\ManyToOne(targetEntity="ConfigBundle\Entity\ConfSchemaOperation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $schemaOperation;



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
     * Set dateTransaction
     *
     * @param \DateTime $dateTransaction
     *
     * @return MetierTransaction
     */
    public function setDateTransaction($dateTransaction)
    {
        $this->dateTransaction = $dateTransaction;

        return $this;
    }

    /**
     * Get dateTransaction
     *
     * @return \DateTime
     */
    public function getDateTransaction()
    {
        return $this->dateTransaction;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return MetierTransaction
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
     * @return MetierTransaction
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
     * Set schemaOperation
     *
     * @param \ConfigBundle\Entity\ConfSchemaOperation $schemaOperation
     *
     * @return MetierTransaction
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
}
