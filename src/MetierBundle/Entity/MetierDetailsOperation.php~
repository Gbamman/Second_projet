<?php

namespace MetierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetierDetailsOperation
 *
 * @ORM\Table(name="metier_details_operation")
 * @ORM\Entity(repositoryClass="MetierBundle\Repository\MetierDetailsOperationRepository")
 */
class MetierDetailsOperation
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
     * @ORM\Column(name="est_op_extourne", type="boolean")
     */
    private $estOpExtourne;

    /**
     * @var bool
     *
     * @ORM\Column(name="est_op_verifier", type="boolean")
     */
    private $estOpVerifier;

    /**
     * @var bool
     *
     * @ORM\Column(name="est_extourner", type="boolean")
     */
    private $estExtourner;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_saisie", type="datetime")
     */
    private $dateSaisie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_valeur", type="datetime")
     */
    private $dateValeur;

    /**
     * @ORM\ManyToOne(targetEntity="MetierOperation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $operation;

    /**
     * @ORM\ManyToOne(targetEntity="MetierVerificationOperation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $verificationOperation;

    /**
     * @ORM\ManyToOne(targetEntity="MetierExtourneOperation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $extourneOperation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estExtourner = false;
        $this->estOpExtourne = false;
        $this->estOpVerifier = false;

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
     * Set estOpExtourne
     *
     * @param boolean $estOpExtourne
     *
     * @return DetailOperation
     */
    public function setEstOpExtourne($estOpExtourne)
    {
        $this->estOpExtourne = $estOpExtourne;

        return $this;
    }

    /**
     * Get estOpExtourne
     *
     * @return bool
     */
    public function getEstOpExtourne()
    {
        return $this->estOpExtourne;
    }

    /**
     * Set estOpVerifier
     *
     * @param boolean $estOpVerifier
     *
     * @return DetailOperation
     */
    public function setEstOpVerifier($estOpVerifier)
    {
        $this->estOpVerifier = $estOpVerifier;

        return $this;
    }

    /**
     * Get estOpVerifier
     *
     * @return bool
     */
    public function getEstOpVerifier()
    {
        return $this->estOpVerifier;
    }

    /**
     * Set estExtourner
     *
     * @param boolean $estExtourner
     *
     * @return DetailOperation
     */
    public function setEstExtourner($estExtourner)
    {
        $this->estExtourner = $estExtourner;

        return $this;
    }

    /**
     * Get estExtourner
     *
     * @return bool
     */
    public function getEstExtourner()
    {
        return $this->estExtourner;
    }

    /**
     * Set dateSaisie
     *
     * @param \DateTime $dateSaisie
     *
     * @return DetailOperation
     */
    public function setDateSaisie($dateSaisie)
    {
        $this->dateSaisie = $dateSaisie;

        return $this;
    }

    /**
     * Get dateSaisie
     *
     * @return \DateTime
     */
    public function getDateSaisie()
    {
        return $this->dateSaisie;
    }

    /**
     * Set dateValeur
     *
     * @param \DateTime $dateValeur
     *
     * @return DetailOperation
     */
    public function setDateValeur($dateValeur)
    {
        $this->dateValeur = $dateValeur;

        return $this;
    }

    /**
     * Get dateValeur
     *
     * @return \DateTime
     */
    public function getDateValeur()
    {
        return $this->dateValeur;
    }

    /**
     * Set operation
     *
     * @param \MetierBundle\Entity\MetierOperation $operation
     *
     * @return MetierDetailsOperation
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
     * Set verificationOperation
     *
     * @param \MetierBundle\Entity\MetierVerificationOperation $verificationOperation
     *
     * @return MetierDetailsOperation
     */
    public function setVerificationOperation(\MetierBundle\Entity\MetierVerificationOperation $verificationOperation = null)
    {
        $this->verificationOperation = $verificationOperation;

        return $this;
    }

    /**
     * Get verificationOperation
     *
     * @return \MetierBundle\Entity\MetierVerificationOperation
     */
    public function getVerificationOperation()
    {
        return $this->verificationOperation;
    }

    /**
     * Set extourneOperation
     *
     * @param \MetierBundle\Entity\MetierExtourneOperation $extourneOperation
     *
     * @return MetierDetailsOperation
     */
    public function setExtourneOperation(\MetierBundle\Entity\MetierExtourneOperation $extourneOperation = null)
    {
        $this->extourneOperation = $extourneOperation;

        return $this;
    }

    /**
     * Get extourneOperation
     *
     * @return \MetierBundle\Entity\MetierExtourneOperation
     */
    public function getExtourneOperation()
    {
        return $this->extourneOperation;
    }
}
