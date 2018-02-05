<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * ConfJournal
 *
 * @ORM\Table(name="conf_journal", indexes={ @Index(name="code_journal", columns={"code_journal"})})
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfJournalRepository")
 */
class ConfJournal
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
     * @ORM\Column(name="code_journal", type="string", length=255)
     */
    private $codeJournal;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="text")
     */
    private $libelle;

    /**
     * @var int
     *
     * @ORM\Column(name="compte_contre_partie", type="integer")
     */
    private $compteContrePartie;

    /**
     * @var bool
     *
     * @ORM\Column(name="est_banque", type="boolean")
     */
    private $estBanque;

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
     * Set codeJournal
     *
     * @param string $codeJournal
     *
     * @return ConfJournal
     */
    public function setCodeJournal($codeJournal)
    {
        $this->codeJournal = $codeJournal;

        return $this;
    }

    /**
     * Get codeJournal
     *
     * @return string
     */
    public function getCodeJournal()
    {
        return $this->codeJournal;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return ConfJournal
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
     * Set compteContrePartie
     *
     * @param integer $compteContrePartie
     *
     * @return ConfJournal
     */
    public function setCompteContrePartie($compteContrePartie)
    {
        $this->compteContrePartie = $compteContrePartie;

        return $this;
    }

    /**
     * Get compteContrePartie
     *
     * @return int
     */
    public function getCompteContrePartie()
    {
        return $this->compteContrePartie;
    }

    /**
     * Set estBanque
     *
     * @param boolean $estBanque
     *
     * @return ConfJournal
     */
    public function setEstBanque($estBanque)
    {
        $this->estBanque = $estBanque;

        return $this;
    }

    /**
     * Get estBanque
     *
     * @return bool
     */
    public function getEstBanque()
    {
        return $this->estBanque;
    }

    /**
     * Set supprimer
     *
     * @param boolean $supprimer
     *
     * @return ConfJournal
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
     * @return ConfJournal
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
     * @return ConfJournal
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
