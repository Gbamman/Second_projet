<?php

namespace MetierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MetierBundle\Entity\MetierMouvement;

/**
 * MetierMouvementOrdinaire
 *
 * @ORM\Table(name="metier_mouvement_ordinaire")
 * @ORM\Entity(repositoryClass="MetierBundle\Repository\MetierMouvementOrdinaireRepository")
 */
class MetierMouvementOrdinaire extends MetierMouvement
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
