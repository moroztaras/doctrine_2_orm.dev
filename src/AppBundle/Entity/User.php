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

    /**
     * @ORM\ManyToMany(targetEntity="Roles", inversedBy="users", cascade={"persist"})
     * @ORM\JoinColumn(name="user_roles")
     */
    private $roles;

    /**
     * Many Users have Many Users.
     * @ORM\ManyToMany(targetEntity="User", mappedBy="myFriends")
     */
    private $friendsWithMe;

    /**
     * Many Users have many Users.
     * @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
     * @ORM\JoinTable(name="friends",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")}
     *      )
     */
    private $myFriends;

    public function __construct()
    {
        $this->friendChildren = new ArrayCollection();
        $this->roles = new ArrayCollection();
        $this->friendsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myFriends = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Add role
     *
     * @param \AppBundle\Entity\Roles $role
     *
     * @return User
     */
    public function addRole(\AppBundle\Entity\Roles $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \AppBundle\Entity\Roles $role
     */
    public function removeRole(\AppBundle\Entity\Roles $role)
    {
        $this->roles->removeElement($role);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Add friendsWithMe
     *
     * @param \AppBundle\Entity\User $friendsWithMe
     *
     * @return User
     */
    public function addFriendsWithMe(\AppBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe[] = $friendsWithMe;

        return $this;
    }

    /**
     * Remove friendsWithMe
     *
     * @param \AppBundle\Entity\User $friendsWithMe
     */
    public function removeFriendsWithMe(\AppBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe->removeElement($friendsWithMe);
    }

    /**
     * Get friendsWithMe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFriendsWithMe()
    {
        return $this->friendsWithMe;
    }

    /**
     * Add myFriend
     *
     * @param \AppBundle\Entity\User $myFriend
     *
     * @return User
     */
    public function addMyFriend(\AppBundle\Entity\User $myFriend)
    {
        $this->myFriends[] = $myFriend;

        return $this;
    }

    /**
     * Remove myFriend
     *
     * @param \AppBundle\Entity\User $myFriend
     */
    public function removeMyFriend(\AppBundle\Entity\User $myFriend)
    {
        $this->myFriends->removeElement($myFriend);
    }

    /**
     * Get myFriends
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMyFriends()
    {
        return $this->myFriends;
    }
}
