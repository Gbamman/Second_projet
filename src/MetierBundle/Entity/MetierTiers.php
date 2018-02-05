<?php

namespace MetierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetierTiers
 *
 * @ORM\Table(name="metier_tiers")
 * @ORM\Entity(repositoryClass="MetierBundle\Repository\MetierTiersRepository")
 */
class MetierTiers
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
     * @ORM\Column(name="libelle", type="text")
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="code_analytique_tiers", type="string", length=255)
     */
    private $codeAnalytiqueTiers;

    /**
     * @ORM\ManyToOne(targetEntity="ConfigBundle\Entity\ConfTypeTiers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeTiers;

    /**
     * @ORM\ManyToOne(targetEntity="ConfigBundle\Entity\ConfSociete")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

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
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return MetierTiers
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
     * Set codeAnalytiqueTiers
     *
     * @param string $codeAnalytiqueTiers
     *
     * @return MetierTiers
     */
    public function setCodeAnalytiqueTiers($codeAnalytiqueTiers)
    {
        $this->codeAnalytiqueTiers = $codeAnalytiqueTiers;

        return $this;
    }

    /**
     * Get codeAnalytiqueTiers
     *
     * @return string
     */
    public function getCodeAnalytiqueTiers()
    {
        return $this->codeAnalytiqueTiers;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return MetierTiers
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
     * Set typeTiers
     *
     * @param \ConfigBundle\Entity\ConfTypeTiers $typeTiers
     *
     * @return MetierTiers
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

    /**
     * Set societe
     *
     * @param \ConfigBundle\Entity\ConfSociete $societe
     *
     * @return MetierTiers
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
