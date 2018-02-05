<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * ConfNatureOperation
 *
 * @ORM\Table(name="conf_nature_operation", indexes={ @Index(name="code_nature_operation_index", columns={"code_nature_operation"})})
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfNatureOperationRepository")
 */
class ConfNatureOperation
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
     * @ORM\Column(name="code_nature_operation", type="string", length=255)
     */
    private $codeNatureOperation;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="text")
     */
    private $designation;

    /**
     * @var int
     *
     * @ORM\Column(name="num_ordre", type="integer")
     */
    private $numOrdre;

    /**
     * @var bool
     *
     * @ORM\Column(name="supprimer", type="boolean")
     */
    private $supprimer;


    /**
     * @ORM\ManyToOne(targetEntity="ConfSchemaOperation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $schemaOperation;

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
     * Set codeNatureOperation
     *
     * @param string $codeNatureOperation
     *
     * @return ConfNatureOperation
     */
    public function setCodeNatureOperation($codeNatureOperation)
    {
        $this->codeNatureOperation = $codeNatureOperation;

        return $this;
    }

    /**
     * Get codeNatureOperation
     *
     * @return string
     */
    public function getCodeNatureOperation()
    {
        return $this->codeNatureOperation;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return ConfNatureOperation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set numOrdre
     *
     * @param integer $numOrdre
     *
     * @return ConfNatureOperation
     */
    public function setNumOrdre($numOrdre)
    {
        $this->numOrdre = $numOrdre;

        return $this;
    }

    /**
     * Get numOrdre
     *
     * @return int
     */
    public function getNumOrdre()
    {
        return $this->numOrdre;
    }

    /**
     * Set supprimer
     *
     * @param boolean $supprimer
     *
     * @return ConfNatureOperation
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
     * Set schemaOperation
     *
     * @param \ConfigBundle\Entity\ConfSchemaOperation $schemaOperation
     *
     * @return ConfNatureOperation
     */
    public function setSchemaOperation(\ConfigBundle\Entity\ConfSchemaOperation $schemaOperation)
    {
        $this->schemaOperation = $schemaOperation;

        return $this;
    }

    /**
     * Get schemaOperation
     *
     * @return \ConfigBundle\Entity\ConfSchemaOperation
     */
    public function getSchemaOperation()
    {
        return $this->schemaOperation;
    }
}
