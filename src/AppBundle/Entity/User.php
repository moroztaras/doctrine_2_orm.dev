<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity()
 */
class User {
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
     * @ORM\Column(name="fullname", type="string", length=255)
     */
    private $fullname;

    /**
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="friendChildren")
     * @ORM\JoinColumn(name="friend_id", referencedColumnName="id")
     */
    private $friends;

    /*
     * @ORM\OneToMany(targetEntity="User", mappedBy="friends")
     */
    private $friendChildren;

    public function __construct()
    {
        $this->friendChildren = new ArrayCollection();
    }


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
     * Set fullname
     *
     * @param string $fullname
     *
     * @return User
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return User
     */
    public function setAddress(\AppBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set friends
     *
     * @param \AppBundle\Entity\User $friends
     *
     * @return User
     */
    public function setFriends(\AppBundle\Entity\User $friends = null)
    {
        $this->friends = $friends;

        return $this;
    }

    /**
     * Get friends
     *
     * @return \AppBundle\Entity\User
     */
    public function getFriends()
    {
        return $this->friends;
    }

    /**
     * Add friendChildrenId
     *
     * @param \AppBundle\Entity\User $friendChildrenId
     *
     * @return User
     */
    public function addFriendChildren(\AppBundle\Entity\User $friendChildrenId)
    {
        $this->friendChildren[] = $friendChildrenId;

        return $this;
    }

    /**
     * Remove friendChildrenId
     *
     * @param \AppBundle\Entity\User $friendChildrenId
     */
    public function removeFriendChildren(\AppBundle\Entity\User $friendChildrenId)
    {
        $this->friendChildren->removeElement($friendChildrenId);
    }

    /**
     * Get friendChildren
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFriendChildren()
    {
        return $this->friendChildren;
    }
}
