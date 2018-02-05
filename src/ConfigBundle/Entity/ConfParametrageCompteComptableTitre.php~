<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ConfigBundle\Entity\ConfParametrageCompteComptable;

/**
 * ConfParametrageCompteComptableTitre
 *
 * @ORM\Table(name="conf_parametrage_compte_comptable_titre")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfParametrageCompteComptableTitreRepository")
 */
class ConfParametrageCompteComptableTitre extends  ConfParametrageCompteComptable
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
     * @ORM\ManyToOne(targetEntity="ConfIbRubrique")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ibRubrique;



    /**
     * Set ibRubrique
     *
     * @param \ConfigBundle\Entity\ConfIbRubrique $ibRubrique
     *
     * @return ConfParametrageCompteComptableTitre
     */
    public function setIbRubrique(\ConfigBundle\Entity\ConfIbRubrique $ibRubrique)
    {
        $this->ibRubrique = $ibRubrique;

        return $this;
    }

    /**
     * Get ibRubrique
     *
     * @return \ConfigBundle\Entity\ConfIbRubrique
     */
    public function getIbRubrique()
    {
        return $this->ibRubrique;
    }
}
