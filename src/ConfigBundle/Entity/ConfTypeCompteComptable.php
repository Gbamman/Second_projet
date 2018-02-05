<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * ConfTypeCompteComptable
 *
 * @ORM\Table(name="conf_type_compte_comptable", indexes={@Index(name="code_type_compte_index", columns={"code_type_compte"})})
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfTypeCompteComptableRepository")
 */
class ConfTypeCompteComptable
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
     * @ORM\Column(name="code_type_compte", type="string", length=255, unique=true)
     */
    private $codeTypeCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_type_compte", type="text")
     */
    private $libelleTypeCompte;


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
     * Set codeTypeCompte
     *
     * @param string $codeTypeCompte
     *
     * @return ConfTypeCompteComptable
     */
    public function setCodeTypeCompte($codeTypeCompte)
    {
        $this->codeTypeCompte = $codeTypeCompte;

        return $this;
    }

    /**
     * Get codeTypeCompte
     *
     * @return string
     */
    public function getCodeTypeCompte()
    {
        return $this->codeTypeCompte;
    }

    /**
     * Set libelleTypeCompte
     *
     * @param string $libelleTypeCompte
     *
     * @return ConfTypeCompteComptable
     */
    public function setLibelleTypeCompte($libelleTypeCompte)
    {
        $this->libelleTypeCompte = $libelleTypeCompte;

        return $this;
    }

    /**
     * Get libelleTypeCompte
     *
     * @return string
     */
    public function getLibelleTypeCompte()
    {
        return $this->libelleTypeCompte;
    }
}
