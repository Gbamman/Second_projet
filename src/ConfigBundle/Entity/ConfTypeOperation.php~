<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfTypeOperation
 *
 * @ORM\Table(name="conf_type_operation")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfTypeOperationRepository")
 */
class ConfTypeOperation
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
     * @ORM\Column(name="code_type_operation", type="string", length=255, unique=true)
     */
    private $codeTypeOperation;

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
     * Set codeTypeOperation
     *
     * @param string $codeTypeOperation
     *
     * @return ConfTypeOperation
     */
    public function setCodeTypeOperation($codeTypeOperation)
    {
        $this->codeTypeOperation = $codeTypeOperation;

        return $this;
    }

    /**
     * Get codeTypeOperation
     *
     * @return string
     */
    public function getCodeTypeOperation()
    {
        return $this->codeTypeOperation;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return ConfTypeOperation
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
     * @return ConfTypeOperation
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
}
