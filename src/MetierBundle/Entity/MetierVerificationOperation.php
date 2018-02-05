<?php

namespace MetierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetierVerificationOperation
 *
 * @ORM\Table(name="metier_verification_operation")
 * @ORM\Entity(repositoryClass="MetierBundle\Repository\MetierVerificationOperationRepository")
 */
class MetierVerificationOperation
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
     * @ORM\Column(name="niveau_verification", type="integer")
     */
    private $niveauVerification;

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
     * Set niveauVerification
     *
     * @param integer $niveauVerification
     *
     * @return VerificationOperation
     */
    public function setNiveauVerification($niveauVerification)
    {
        $this->niveauVerification = $niveauVerification;

        return $this;
    }

    /**
     * Get niveauVerification
     *
     * @return int
     */
    public function getNiveauVerification()
    {
        return $this->niveauVerification;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return VerificationOperation
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
