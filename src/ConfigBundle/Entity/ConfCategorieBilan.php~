<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfCategorieBilan
 *
 * @ORM\Table(name="conf_categorie_bilan")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfCategorieBilanRepository")
 */
class ConfCategorieBilan
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
     * @ORM\Column(name="libunique", type="string", length=255, nullable=true)
     */
    private $libunique;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


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
     * Set libunique
     *
     * @param string $libunique
     *
     * @return ConfCategorieBilan
     */
    public function setLibunique($libunique)
    {
        $this->libunique = $libunique;

        return $this;
    }

    /**
     * Get libunique
     *
     * @return string
     */
    public function getLibunique()
    {
        return $this->libunique;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ConfCategorieBilan
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
}
