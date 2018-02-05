<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfIbRubrique
 *
 * @ORM\Table(name="conf_ib_rubrique")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfIbRubriqueRepository")
 */
class ConfIbRubrique
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
     * @ORM\Column(name="code_rubrique", type="string", length=255)
     */
    private $codeRubrique;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_rubrique", type="string", length=255)
     */
    private $libelleRubrique;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="ConfIbApplication")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ibApplication;

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
     * Set codeRubrique
     *
     * @param string $codeRubrique
     *
     * @return ConfIbRubrique
     */
    public function setCodeRubrique($codeRubrique)
    {
        $this->codeRubrique = $codeRubrique;

        return $this;
    }

    /**
     * Get codeRubrique
     *
     * @return string
     */
    public function getCodeRubrique()
    {
        return $this->codeRubrique;
    }

    /**
     * Set libelleRubrique
     *
     * @param string $libelleRubrique
     *
     * @return ConfIbRubrique
     */
    public function setLibelleRubrique($libelleRubrique)
    {
        $this->libelleRubrique = $libelleRubrique;

        return $this;
    }

    /**
     * Get libelleRubrique
     *
     * @return string
     */
    public function getLibelleRubrique()
    {
        return $this->libelleRubrique;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ConfIbRubrique
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
     * @return ConfIbRubrique
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
     * Set ibApplication
     *
     * @param \ConfigBundle\Entity\ConfIbApplication $ibApplication
     *
     * @return ConfIbRubrique
     */
    public function setIbApplication(\ConfigBundle\Entity\ConfIbApplication $ibApplication)
    {
        $this->ibApplication = $ibApplication;

        return $this;
    }

    /**
     * Get ibApplication
     *
     * @return \ConfigBundle\Entity\ConfIbApplication
     */
    public function getIbApplication()
    {
        return $this->ibApplication;
    }
}
