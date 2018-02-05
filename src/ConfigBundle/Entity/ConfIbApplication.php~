<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * ConfIbApplication
 *
 * @ORM\Table(name="conf_ib_application", indexes={@Index(name="code_ib_index", columns={"code_ib"})})
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfIbApplicationRepository")
 */
class ConfIbApplication
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
     * @ORM\Column(name="code_ib", type="string", length=255)
     */
    private $codeIb;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="ConfSociete")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * @var bool
     *
     * @ORM\Column(name="supprimer", type="boolean")
     */
    private $supprimer;

    /**
     * @ORM\ManyToOne(targetEntity="ConfTypeTiers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeTiers;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->created = New \DateTime();
        $this->supprimer = false;
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
     * Set codeIb
     *
     * @param string $codeIb
     *
     * @return ConfIbApplication
     */
    public function setCodeIb($codeIb)
    {
        $this->codeIb = $codeIb;

        return $this;
    }

    /**
     * Get codeIb
     *
     * @return string
     */
    public function getCodeIb()
    {
        return $this->codeIb;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ConfIbApplication
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ConfIbApplication
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
     * Set supprimer
     *
     * @param boolean $supprimer
     *
     * @return ConfIbApplication
     */
    public function setSupprimer($supprimer)
    {
        $this->supprimer = $supprimer;

        return $this;
    }

    /**
     * Get supprimer
     *
     * @return boolean
     */
    public function getSupprimer()
    {
        return $this->supprimer;
    }

    /**
     * Set societe
     *
     * @param \ConfigBundle\Entity\ConfSociete $societe
     *
     * @return ConfIbApplication
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
     * Set typeTiers
     *
     * @param \ConfigBundle\Entity\ConfTypeTiers $typeTiers
     *
     * @return ConfIbApplication
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
