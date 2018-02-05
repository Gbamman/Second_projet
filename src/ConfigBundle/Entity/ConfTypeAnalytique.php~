<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;


/**
 * ConfTypeAnalytique
 *
 * @ORM\Table(name="conf_type_analytique", indexes={@Index(name="code_type_analytique_index", columns={"code_type_analytique"})})
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfTypeAnalytiqueRepository")
 */
class ConfTypeAnalytique
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="code_type_analytique", type="string", length=15, unique=true)
     */
    private $codeTypeAnalytique;

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ConfTypeAnalytique
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
     * Set codeTypeAnalytique
     *
     * @param string $codeTypeAnalytique
     *
     * @return ConfTypeAnalytique
     */
    public function setCodeTypeAnalytique($codeTypeAnalytique)
    {
        $this->codeTypeAnalytique = $codeTypeAnalytique;

        return $this;
    }

    /**
     * Get codeTypeAnalytique
     *
     * @return string
     */
    public function getCodeTypeAnalytique()
    {
        return $this->codeTypeAnalytique;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ConfTypeAnalytique
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
}
