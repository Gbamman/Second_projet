<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;


/**
 * ConfTypeTiers
 *
 * @ORM\Table(name="conf_type_tiers", indexes={@Index(name="typeib_index", columns={"type_ib"})})
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfTypeTiersRepository")
 */
class ConfTypeTiers
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type_ib", type="string", length=15)
     */
    private $typeIb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

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
        $this->created = new \DateTime();
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
     * Set description
     *
     * @param string $description
     *
     * @return ConfTypeTiers
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set typeIb
     *
     * @param string $typeIb
     *
     * @return ConfTypeTiers
     */
    public function setTypeIb($typeIb)
    {
        $this->typeIb = $typeIb;

        return $this;
    }

    /**
     * Get typeIb
     *
     * @return string
     */
    public function getTypeIb()
    {
        return $this->typeIb;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ConfTypeTiers
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
     * Set typeAnalytique
     *
     * @param \ConfigBundle\Entity\ConfTypeAnalytique $typeAnalytique
     *
     * @return ConfTypeTiers
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
