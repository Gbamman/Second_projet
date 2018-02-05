<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfFisc
 *
 * @ORM\Table(name="conf_fisc")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfFiscRepository")
 */
class ConfFisc
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
     * @ORM\Column(name="code_fisc", type="string", length=255)
     */
    private $codeFisc;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="text")
     */
    private $libelle;

    /**
     * @var bool
     *
     * @ORM\Column(name="supprimer", type="boolean")
     */
    private $supprimer;

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
     * Set codeFisc
     *
     * @param string $codeFisc
     *
     * @return ConfFisc
     */
    public function setCodeFisc($codeFisc)
    {
        $this->codeFisc = $codeFisc;

        return $this;
    }

    /**
     * Get codeFisc
     *
     * @return string
     */
    public function getCodeFisc()
    {
        return $this->codeFisc;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return ConfFisc
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
     * Set supprimer
     *
     * @param boolean $supprimer
     *
     * @return ConfFisc
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ConfFisc
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
     * @return ConfFisc
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
}
