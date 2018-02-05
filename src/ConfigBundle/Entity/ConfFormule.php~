<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * ConfFormule
 *
 * @ORM\Table(name="conf_formule",
 *     indexes={
 *         @Index(name="code_formule_index", columns={"code_formule"}),
 *         @Index(name="libelle_unique_index", columns={"libelle_unique"})
 * })
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfFormuleRepository")
 */
class ConfFormule
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
     * @ORM\Column(name="code_formule", type="integer", unique=true)
     */
    private $codeFormule;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_unique", type="string", length=255, unique=true, nullable=true)
     */
    private $libelleUnique;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

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
     * Set codeFormule
     *
     * @param integer $codeFormule
     *
     * @return ConfFormule
     */
    public function setCodeFormule($codeFormule)
    {
        $this->codeFormule = $codeFormule;

        return $this;
    }

    /**
     * Get codeFormule
     *
     * @return int
     */
    public function getCodeFormule()
    {
        return $this->codeFormule;
    }



    /**
     * Set description
     *
     * @param string $description
     *
     * @return ConfFormule
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
     * Set supprimer
     *
     * @param boolean $supprimer
     *
     * @return ConfFormule
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
     * Set libelleUnique
     *
     * @param string $libelleUnique
     *
     * @return ConfFormule
     */
    public function setLibelleUnique($libelleUnique)
    {
        $this->libelleUnique = $libelleUnique;

        return $this;
    }

    /**
     * Get libelleUnique
     *
     * @return string
     */
    public function getLibelleUnique()
    {
        return $this->libelleUnique;
    }
}
