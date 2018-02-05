<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfSchemaOperation
 *
 * @ORM\Table(name="conf_schema_operation")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfSchemaOperationRepository")
 */
class ConfSchemaOperation
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
     * @ORM\Column(name="code_schema", type="string", length=255, unique=true)
     */
    private $codeSchema;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="text")
     */
    private $designation;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_etape", type="integer")
     */
    private $nbrEtape;

    /**
     * @var bool
     *
     * @ORM\Column(name="supprimer", type="boolean")
     */
    private $supprimer;


    /**
     * @ORM\ManyToOne(targetEntity="ConfSociete")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;


    /**
     * @ORM\ManyToOne(targetEntity="ConfJournal")
     * @ORM\JoinColumn(nullable=false)
     */
    private $journal;


    /**
     * @ORM\ManyToOne(targetEntity="ConfTypeOperation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeOperation;

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
     * Set designation
     *
     * @param string $designation
     *
     * @return ConfSchemaOperation
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
     * Set nbrEtape
     *
     * @param integer $nbrEtape
     *
     * @return ConfSchemaOperation
     */
    public function setNbrEtape($nbrEtape)
    {
        $this->nbrEtape = $nbrEtape;

        return $this;
    }

    /**
     * Get nbrEtape
     *
     * @return int
     */
    public function getNbrEtape()
    {
        return $this->nbrEtape;
    }

    /**
     * Set supprimer
     *
     * @param boolean $supprimer
     *
     * @return ConfSchemaOperation
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
     * Set societe
     *
     * @param \ConfigBundle\Entity\ConfSociete $societe
     *
     * @return ConfSchemaOperation
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
     * Set journal
     *
     * @param \ConfigBundle\Entity\ConfJournal $journal
     *
     * @return ConfSchemaOperation
     */
    public function setJournal(\ConfigBundle\Entity\ConfJournal $journal)
    {
        $this->journal = $journal;

        return $this;
    }

    /**
     * Get journal
     *
     * @return \ConfigBundle\Entity\ConfJournal
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * Set typeOperation
     *
     * @param \ConfigBundle\Entity\ConfTypeOperation $typeOperation
     *
     * @return ConfSchemaOperation
     */
    public function setTypeOperation(\ConfigBundle\Entity\ConfTypeOperation $typeOperation)
    {
        $this->typeOperation = $typeOperation;

        return $this;
    }

    /**
     * Get typeOperation
     *
     * @return \ConfigBundle\Entity\ConfTypeOperation
     */
    public function getTypeOperation()
    {
        return $this->typeOperation;
    }

    /**
     * Set codeSchema
     *
     * @param string $codeSchema
     *
     * @return ConfSchemaOperation
     */
    public function setCodeSchema($codeSchema)
    {
        $this->codeSchema = $codeSchema;

        return $this;
    }

    /**
     * Get codeSchema
     *
     * @return string
     */
    public function getCodeSchema()
    {
        return $this->codeSchema;
    }
}
