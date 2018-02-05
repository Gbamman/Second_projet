<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfTiersSchemaOperation
 *
 * @ORM\Table(name="conf_tiers_schema_operation")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfTiersSchemaOperationRepository")
 */
class ConfTiersSchemaOperation
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
     * @ORM\Column(name="supprimer", type="boolean")
     */
    private $supprimer;

    /**
     * @ORM\ManyToOne(targetEntity="ConfTypeAnalytique")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeAnalytique;

    /*
     * constructor
     */
    public function __construct()
    {
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
     * Set supprimer
     *
     * @param boolean $supprimer
     *
     * @return ConfTiersSchemaOperation
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
     * Set typeAnalytique
     *
     * @param \ConfigBundle\Entity\ConfTypeAnalytique $typeAnalytique
     *
     * @return ConfTiersSchemaOperation
     */
    public function setTypeAnalytique(\ConfigBundle\Entity\ConfTypeAnalytique $typeAnalytique)
    {
        $this->typeAnalytique = $typeAnalytique;

        return $this;
    }

    /**
     * Get typeAnalytique
     *
     * @return \ConfigBundle\Entity\ConfTypeAnalytique
     */
    public function getTypeAnalytique()
    {
        return $this->typeAnalytique;
    }
}
