<?php

namespace MetierBundle\Entity;

use MetierBundle\Entity\MetierMouvement;
use Doctrine\ORM\Mapping as ORM;

/**
 * MetierMouvementTitre
 *
 * @ORM\Table(name="metier_mouvement_titre")
 * @ORM\Entity(repositoryClass="MetierBundle\Repository\MetierMouvementTitreRepository")
 */
class MetierMouvementTitre extends MetierMouvement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="MetierTiers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $titre;



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
     * Set titre
     *
     * @param \MetierBundle\Entity\MetierTiers $titre
     *
     * @return MetierMouvementTitre
     */
    public function setTitre(\MetierBundle\Entity\MetierTiers $titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return \MetierBundle\Entity\MetierTiers
     */
    public function getTitre()
    {
        return $this->titre;
    }
}
