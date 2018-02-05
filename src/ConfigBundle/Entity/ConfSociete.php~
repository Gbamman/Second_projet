<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfSociete
 *
 * @ORM\Table(name="conf_societe")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfSocieteRepository")
 */
class ConfSociete
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
     * @ORM\Column(name="code_societe", type="string", length=255, unique=true)
     */
    private $codeSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="sigle", type="string", length=255)
     */
    private $sigle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var bool
     *
     * @ORM\Column(name="supprimer", type="boolean")
     */
    private $supprimer;

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codeSociete
     *
     * @param string $codeSociete
     *
     * @return ConfSociete
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
     * Set sigle
     *
     * @param string $sigle
     *
     * @return ConfSociete
     */
    public function setSigle($sigle)
    {
        $this->sigle = $sigle;

        return $this;
    }

    /**
     * Get sigle
     *
     * @return string
     */
    public function getSigle()
    {
        return $this->sigle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ConfSociete
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
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }



    /**
     * Set supprimer
     *
     * @param boolean $supprimer
     *
     * @return ConfSociete
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
}
