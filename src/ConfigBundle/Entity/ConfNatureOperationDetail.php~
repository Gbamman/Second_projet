<?php

namespace ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfNatureOperationDetail
 *
 * @ORM\Table(name="conf_nature_operation_detail")
 * @ORM\Entity(repositoryClass="ConfigBundle\Repository\ConfNatureOperationDetailRepository")
 */
class ConfNatureOperationDetail
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
     * @var bool
     *
     * @ORM\Column(name="applique_aib", type="boolean")
     */
    private $appliqueAib;

    /**
     * @var bool
     *
     * @ORM\Column(name="applique_tva", type="boolean")
     */
    private $appliqueTva;

    /**
     * @var bool
     *
     * @ORM\Column(name="touche_cpte_tiers", type="boolean")
     */
    private $toucheCpteTiers;

    /**
     * @var bool
     *
     * @ORM\Column(name="touche_cpte_banque", type="boolean")
     */
    private $toucheCpteBanque;

    /**
     * @var bool
     *
     * @ORM\Column(name="touche_cpte_caisse", type="boolean")
     */
    private $toucheCpteCaisse;

    /**
 * @ORM\ManyToOne(targetEntity="ConfNatureOperation")
 * @ORM\JoinColumn(nullable=false)
 */
    private $natureOperation;

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
     * Set appliqueAib
     *
     * @param boolean $appliqueAib
     *
     * @return ConfNatureOperationDetail
     */
    public function setAppliqueAib($appliqueAib)
    {
        $this->appliqueAib = $appliqueAib;

        return $this;
    }

    /**
     * Get appliqueAib
     *
     * @return bool
     */
    public function getAppliqueAib()
    {
        return $this->appliqueAib;
    }

    /**
     * Set appliqueTva
     *
     * @param boolean $appliqueTva
     *
     * @return ConfNatureOperationDetail
     */
    public function setAppliqueTva($appliqueTva)
    {
        $this->appliqueTva = $appliqueTva;

        return $this;
    }

    /**
     * Get appliqueTva
     *
     * @return bool
     */
    public function getAppliqueTva()
    {
        return $this->appliqueTva;
    }

    /**
     * Set toucheCpteTiers
     *
     * @param boolean $toucheCpteTiers
     *
     * @return ConfNatureOperationDetail
     */
    public function setToucheCpteTiers($toucheCpteTiers)
    {
        $this->toucheCpteTiers = $toucheCpteTiers;

        return $this;
    }

    /**
     * Get toucheCpteTiers
     *
     * @return bool
     */
    public function getToucheCpteTiers()
    {
        return $this->toucheCpteTiers;
    }

    /**
     * @return boolean
     */
    public function isToucheCpteBanque()
    {
        return $this->toucheCpteBanque;
    }

    /**
     * @param boolean $toucheCpteBanque
     */
    public function setToucheCpteBanque($toucheCpteBanque)
    {
        $this->toucheCpteBanque = $toucheCpteBanque;
    }



    /**
     * Set toucheCpteCaisse
     *
     * @param boolean $toucheCpteCaisse
     *
     * @return ConfNatureOperationDetail
     */
    public function setToucheCpteCaisse($toucheCpteCaisse)
    {
        $this->toucheCpteCaisse = $toucheCpteCaisse;

        return $this;
    }

    /**
     * Get toucheCpteCaisse
     *
     * @return bool
     */
    public function getToucheCpteCaisse()
    {
        return $this->toucheCpteCaisse;
    }

    /**
     * Get toucheCpteBanque
     *
     * @return boolean
     */
    public function getToucheCpteBanque()
    {
        return $this->toucheCpteBanque;
    }

    /**
     * Set natureOperation
     *
     * @param \ConfigBundle\Entity\ConfNatureOperation $natureOperation
     *
     * @return ConfNatureOperationDetail
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
}
