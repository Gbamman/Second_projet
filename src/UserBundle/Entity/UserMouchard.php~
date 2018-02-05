<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserMouchard
 *
 * @ORM\Table(name="user_mouchard")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserMouchardRepository")
 */
class UserMouchard
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
     * @ORM\Column(name="table_name", type="string", length=255)
     */
    private $tableName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="action_date", type="datetime")
     */
    private $actionDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="client_action_date", type="datetime", nullable = true)
     */
    private $clientActionDate;

    /**
     * @var int
     *
     * @ORM\Column(name="table_element_id", type="integer")
     */
    private $tableElementId;

    /**
     * @ORM\ManyToOne(targetEntity="UserUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="UserAction")
     * @ORM\JoinColumn(nullable=false)
     */
    private $action;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actionDate = New \DateTime();
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
     * Set tableName
     *
     * @param string $tableName
     *
     * @return UserMouchard
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * Get tableName
     *
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Set actionDate
     *
     * @param \DateTime $actionDate
     *
     * @return UserMouchard
     */
    public function setActionDate($actionDate)
    {
        $this->actionDate = $actionDate;

        return $this;
    }

    /**
     * Get actionDate
     *
     * @return \DateTime
     */
    public function getActionDate()
    {
        return $this->actionDate;
    }

    /**
     * Set clientActionDate
     *
     * @param \DateTime $clientActionDate
     *
     * @return UserMouchard
     */
    public function setClientActionDate($clientActionDate)
    {
        $this->clientActionDate = $clientActionDate;

        return $this;
    }

    /**
     * Get clientActionDate
     *
     * @return \DateTime
     */
    public function getClientActionDate()
    {
        return $this->clientActionDate;
    }

    /**
     * Set tableElementId
     *
     * @param integer $tableElementId
     *
     * @return UserMouchard
     */
    public function setTableElementId($tableElementId)
    {
        $this->tableElementId = $tableElementId;

        return $this;
    }

    /**
     * Get tableElementId
     *
     * @return int
     */
    public function getTableElementId()
    {
        return $this->tableElementId;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\UserUser $user
     *
     * @return UserMouchard
     */
    public function setUser(\UserBundle\Entity\UserUser $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\UserUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set action
     *
     * @param \UserBundle\Entity\UserAction $action
     *
     * @return UserMouchard
     */
    public function setAction(\UserBundle\Entity\UserAction $action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return \UserBundle\Entity\UserAction
     */
    public function getAction()
    {
        return $this->action;
    }
}
