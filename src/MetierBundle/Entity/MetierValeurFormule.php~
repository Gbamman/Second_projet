<?php

namespace MetierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetierValeurFormule
 *
 * @ORM\Table(name="metier_valeur_formule")
 * @ORM\Entity(repositoryClass="MetierBundle\Repository\MetierValeurFormuleRepository")
 */
class MetierValeurFormule
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
     * @ORM\Column(name="id_operation_front", type="integer")
     */
    private $idOperationFront;

    /**
     * @var string
     *
     * @ORM\Column(name="code_societe", type="string", length=255)
     */
    private $codeSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="code_nature_operation", type="string", length=255)
     */
    private $codeNatureOperation;

    /**
     * @var int
     *
     * @ORM\Column(name="code_formule", type="integer")
     */
    private $codeFormule;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="decimal", precision=10, scale=2)
     */
    private $valeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


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
     * Set idOperationFront
     *
     * @param integer $idOperationFront
     *
     * @return ValeurFormule
     */
    public function setIdOperationFront($idOperationFront)
    {
        $this->idOperationFront = $idOperationFront;

        return $this;
    }

    /**
     * Get idOperationFront
     *
     * @return int
     */
    public function getIdOperationFront()
    {
        return $this->idOperationFront;
    }

    /**
     * Set codeSociete
     *
     * @param string $codeSociete
     *
     * @return ValeurFormule
     */
    public function setCodeSociete($codeSociete)
    {
        $this->codeSociete = $codeSociete;

        return $this;
    }

    /**
     * Get codeSociete
     *
     * @return string
     */
    public function getCodeSociete()
    {
        return $this->codeSociete;
    }

    /**
     * Set codeNatureOperation
     *
     * @param string $codeNatureOperation
     *
     * @return ValeurFormule
     */
    public function setCodeNatureOperation($codeNatureOperation)
    {
        $this->codeNatureOperation = $codeNatureOperation;

        return $this;
    }

    /**
     * Get codeNatureOperation
     *
     * @return string
     */
    public function getCodeNatureOperation()
    {
        return $this->codeNatureOperation;
    }

    /**
     * Set codeFormule
     *
     * @param integer $codeFormule
     *
     * @return ValeurFormule
     */
    public function setCodeFormule($codeFormule)
    {
        $this->codeFormule = $codeFormule;

        return $this;
    }

    /**
     * Get codeFormule
     *
     * @return int
     */
    public function getCodeFormule()
    {
        return $this->codeFormule;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     *
     * @return ValeurFormule
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ValeurFormule
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
