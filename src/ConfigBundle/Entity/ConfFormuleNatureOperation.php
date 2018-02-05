<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfFormuleNatureOperation
 *
 * @ORM\Table(name="conf_formule_nature_operation")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfFormuleNatureOperationRepository")
 */
class ConfFormuleNatureOperation
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
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="ConfNatureOperation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $natureOperation;

    /**
     * @ORM\ManyToOne(targetEntity="ConfFormule")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formule;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->created = New \DateTime();
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ConfFormuleNatureOperation
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
     * Set natureOperation
     *
     * @param \ConfigBundle\Entity\ConfNatureOperation $natureOperation
     *
     * @return ConfFormuleNatureOperation
     */
    public function setNatureOperation(\ConfigBundle\Entity\ConfNatureOperation $natureOperation)
    {
        $this->natureOperation = $natureOperation;

        return $this;
    }

    /**
     * Get natureOperation
     *
     * @return \ConfigBundle\Entity\ConfNatureOperation
     */
    public function getNatureOperation()
    {
        return $this->natureOperation;
    }

    /**
     * Set formule
     *
     * @param \ConfigBundle\Entity\ConfFormule $formule
     *
     * @return ConfFormuleNatureOperation
     */
    public function setFormule(\ConfigBundle\Entity\ConfFormule $formule)
    {
        $this->formule = $formule;

        return $this;
    }

    /**
     * Get formule
     *
     * @return \ConfigBundle\Entity\ConfFormule
     */
    public function getFormule()
    {
        return $this->formule;
    }
}
