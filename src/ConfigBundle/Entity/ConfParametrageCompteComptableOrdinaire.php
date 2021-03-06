<?php

namespace ConfigBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use ConfigBundle\Entity\ConfParametrageCompteComptable;


/**
 * ConfParametrageCompteComptableOrdinaire
 *
 * @ORM\Table(name="conf_parametrage_compte_comptable_ordinaire")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfParametrageCompteComptableOrdinaireRepository")
 */
class ConfParametrageCompteComptableOrdinaire extends ConfParametrageCompteComptable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

}
