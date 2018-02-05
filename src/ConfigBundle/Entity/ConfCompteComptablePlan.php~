<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * ConfCompteComptablePlan
 *
 * @ORM\Table(name="conf_compte_comptable_plan",
 *     indexes={
 *         @Index(name="num_compte_comptable_index", columns={"num_compte_comptable"}),
 *         @Index(name="sens_augmentation_index", columns={"sens_augmentation"})
 * })
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfCompteComptablePlanRepository")
 */
class ConfCompteComptablePlan
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
     * @ORM\Column(name="num_compte_comptable", type="integer")
     */
    private $numCompteComptable;

    /**
     * @var string
     *
     * @ORM\Column(name="sens_augmentation", type="string", length=3)
     */
    private $sensAugmentation;

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
     * @var bool
     *
     * @ORM\Column(name="espece", type="boolean", nullable=true)
     */
    private $espece;

    /**
     * @ORM\ManyToOne(targetEntity="ConfPlan")
     * @ORM\JoinColumn(nullable=false)
     */
    private $plan;

    /**
 * @ORM\ManyToOne(targetEntity="ConfTypeAnalytique")
 * @ORM\JoinColumn(nullable=true)
 */
    private $typeAnalytique;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

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
     * Set numCompteComptable
     *
     * @param integer $numCompteComptable
     *
     * @return ConfCompteComptablePlan
     */
    public function setNumCompteComptable($numCompteComptable)
    {
        $this->numCompteComptable = $numCompteComptable;

        return $this;
    }

    /**
     * Get numCompteComptable
     *
     * @return integer
     */
    public function getNumCompteComptable()
    {
        return $this->numCompteComptable;
    }

    /**
     * Set sensAugmentation
     *
     * @param string $sensAugmentation
     *
     * @return ConfCompteComptablePlan
     */
    public function setSensAugmentation($sensAugmentation)
    {
        $this->sensAugmentation = $sensAugmentation;

        return $this;
    }

    /**
     * Get sensAugmentation
     *
     * @return string
     */
    public function getSensAugmentation()
    {
        return $this->sensAugmentation;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ConfCompteComptablePlan
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
     * @return ConfCompteComptablePlan
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
     * Set espece
     *
     * @param boolean $espece
     *
     * @return ConfCompteComptablePlan
     */
    public function setEspece($espece)
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * Get espece
     *
     * @return boolean
     */
    public function getEspece()
    {
        return $this->espece;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ConfCompteComptablePlan
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
     * Set plan
     *
     * @param \ConfigBundle\Entity\ConfPlan $plan
     *
     * @return ConfCompteComptablePlan
     */
    public function setPlan(\ConfigBundle\Entity\ConfPlan $plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return \ConfigBundle\Entity\ConfPlan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set typeAnalytique
     *
     * @param \ConfigBundle\Entity\ConfTypeAnalytique $typeAnalytique
     *
     * @return ConfCompteComptablePlan
     */
    public function setTypeAnalytique(\ConfigBundle\Entity\ConfTypeAnalytique $typeAnalytique = null)
    {
        $this->typeAnalytique = $typeAnalytique;

        return $this;
    }

    /**
     * Get typeAnalytique
     *
     * @return \ConfigBundle\Entity\ConfTypeAnalytique
     */
    public function getTypeAnalytique()
    {
        return $this->typeAnalytique;
    }
}
