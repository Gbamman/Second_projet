<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfParametrageContrepartieDepositaire
 *
 * @ORM\Table(name="conf_parametrage_contrepartie_depositaire")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfParametrageContrepartieDepositaireRepository")
 */
class ConfParametrageContrepartieDepositaire
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
     * @ORM\Column(name="cpt_contrepartie", type="integer")
     */
    private $cptContrepartie;

    /**
     * @var int
     *
     * @ORM\Column(name="cpt_contrepartie_cpr", type="integer")
     */
    private $cptContrepartieCpr;

    /**
     * @var string
     *
     * @ORM\Column(name="dividendes", type="string", length=16)
     */
    private $dividendes;

    /**
     * @var string
     *
     * @ORM\Column(name="coupons", type="string", length=16)
     */
    private $coupons;

    /**
     * @var int
     *
     * @ORM\Column(name="regl_titres", type="integer")
     */
    private $reglTitres;

    /**
     * @var int
     *
     * @ORM\Column(name="regl_titre_cpr", type="integer")
     */
    private $reglTitreCpr;

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
     * Set cptContrepartie
     *
     * @param integer $cptContrepartie
     *
     * @return ConfParametrageContrepartieDepositaire
     */
    public function setCptContrepartie($cptContrepartie)
    {
        $this->cptContrepartie = $cptContrepartie;

        return $this;
    }

    /**
     * Get cptContrepartie
     *
     * @return int
     */
    public function getCptContrepartie()
    {
        return $this->cptContrepartie;
    }

    /**
     * Set cptContrepartieCpr
     *
     * @param integer $cptContrepartieCpr
     *
     * @return ConfParametrageContrepartieDepositaire
     */
    public function setCptContrepartieCpr($cptContrepartieCpr)
    {
        $this->cptContrepartieCpr = $cptContrepartieCpr;

        return $this;
    }

    /**
     * Get cptContrepartieCpr
     *
     * @return int
     */
    public function getCptContrepartieCpr()
    {
        return $this->cptContrepartieCpr;
    }

    /**
     * Set dividendes
     *
     * @param string $dividendes
     *
     * @return ConfParametrageContrepartieDepositaire
     */
    public function setDividendes($dividendes)
    {
        $this->dividendes = $dividendes;

        return $this;
    }

    /**
     * Get dividendes
     *
     * @return string
     */
    public function getDividendes()
    {
        return $this->dividendes;
    }

    /**
     * Set coupons
     *
     * @param string $coupons
     *
     * @return ConfParametrageContrepartieDepositaire
     */
    public function setCoupons($coupons)
    {
        $this->coupons = $coupons;

        return $this;
    }

    /**
     * Get coupons
     *
     * @return string
     */
    public function getCoupons()
    {
        return $this->coupons;
    }

    /**
     * Set reglTitres
     *
     * @param integer $reglTitres
     *
     * @return ConfParametrageContrepartieDepositaire
     */
    public function setReglTitres($reglTitres)
    {
        $this->reglTitres = $reglTitres;

        return $this;
    }

    /**
     * Get reglTitres
     *
     * @return int
     */
    public function getReglTitres()
    {
        return $this->reglTitres;
    }

    /**
     * Set reglTitreCpr
     *
     * @param integer $reglTitreCpr
     *
     * @return ConfParametrageContrepartieDepositaire
     */
    public function setReglTitreCpr($reglTitreCpr)
    {
        $this->reglTitreCpr = $reglTitreCpr;

        return $this;
    }

    /**
     * Get reglTitreCpr
     *
     * @return int
     */
    public function getReglTitreCpr()
    {
        return $this->reglTitreCpr;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ConfParametrageContrepartieDepositaire
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
