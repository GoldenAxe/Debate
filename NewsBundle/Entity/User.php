<?php

namespace AlfaDev\Debate\NewsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity
 * @ORM\Table(name="Users")
 */

class User implements UserInterface
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;
	
   /**
     * @ORM\Column(type="string", length="255")
     */
    protected $username;
    
/**
     * @ORM\Column(type="string", length="255")
     *
     * @var string password
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length="255")
     *
     * @var string salt
     */
    protected $salt;

   /**
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     *
     * @var ArrayCollection $userRoles
     */
    protected $userRoles;
	
	/**
     * @ORM\Column(type="string", length="64")
     */
	protected $firstName;
	
	/**
     * @ORM\Column(type="string", length="64")
     */
	protected $lastName;
	
	/**
     * @ORM\Column(type="string", length="64")
     */
	protected $zipCode;
	
	/**
     * @ORM\Column(type="string", length="32")
     */
	protected $idCard;
	
	/**
     * @ORM\Column(type="string", length="32")
     */
	protected $address;
	
	/**
     * @ORM\Column(type="string", length="64")
     */
	protected $phone1;
	
	/**
     * @ORM\Column(type="string", length="32")
     */
	protected $phone2;
	
	/**
     * @ORM\Column(type="string", length="32")
     */
	protected $phone3;
	
	/**
     * @ORM\Column(type="string", length="64")
     */
	protected $email;

	/**
     * @ORM\OneToOne(targetEntity="UserImage")
     */
	protected $userImage;
	
	/**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="user")
     * 
     * @var ArrayCollection $posts
     */
    protected $posts;
    
/**
     * Gets the username.
     *
     * @return string The username.
     */
    public function getUsername()
    {
        return $this->username;
    }
 
    /**
     * Sets the username.
     *
     * @param string $value The username.
     */
    public function setUsername($value)
    {
        $this->username = $value;
    }
 
    /**
     * Gets the user password.
     *
     * @return string The password.
     */
    public function getPassword()
    {
        return $this->password;
    }
 
    /**
     * Sets the user password.
     *
     * @param string $value The password.
     */
    public function setPassword($value)
    {
        $this->password = $value;
    }
 
    /**
     * Gets the user salt.
     *
     * @return string The salt.
     */
    public function getSalt()
    {
        return $this->salt;
    }
 
    /**
     * Sets the user salt.
     *
     * @param string $value The salt.
     */
    public function setSalt($value)
    {
        $this->salt = $value;
    }
 
    /**
     * Gets the user roles.
     *
     * @return ArrayCollection A Doctrine ArrayCollection
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }

 
    /**
     * Constructs a new instance of User
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->userRoles = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }
 
    /**
     * Erases the user credentials.
     */
    public function eraseCredentials()
    {
 
    }
 
    /**
     * Gets an array of roles.
     * 
     * @return array An array of Role objects
     */
    public function getRoles()
    {
        return $this->getUserRoles()->toArray();
    }
 
    /**
     * Compares this user to another to determine if they are the same.
     * 
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user)
    {
        return md5($this->getUsername()) == md5($user->getUsername());
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
     * Add userRoles
     *
     * @param AlfaDev\Debate\NewsBundle\Entity\Role $userRoles
     */
    public function addRole(\AlfaDev\Debate\NewsBundle\Entity\Role $userRoles)
    {
        $this->userRoles[] = $userRoles;
    }

   /**
     * Add posts
     *
     * @param AlfaDev\Debate\NewsBundle\Entity\Post $posts
     */
    public function addPost(\AlfaDev\Debate\NewsBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;
    }

    /**
     * Get posts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }


    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set idCard
     *
     * @param string $idCard
     */
    public function setIdCard($idCard)
    {
        $this->idCard = $idCard;
    }

    /**
     * Get idCard
     *
     * @return string 
     */
    public function getIdCard()
    {
        return $this->idCard;
    }

    /**
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone1
     *
     * @param string $phone1
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;
    }

    /**
     * Get phone1
     *
     * @return string 
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * Set phone2
     *
     * @param string $phone2
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;
    }

    /**
     * Get phone2
     *
     * @return string 
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set phone3
     *
     * @param string $phone3
     */
    public function setPhone3($phone3)
    {
        $this->phone3 = $phone3;
    }

    /**
     * Get phone3
     *
     * @return string 
     */
    public function getPhone3()
    {
        return $this->phone3;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set userImage
     *
     * @param AlfaDev\Debate\NewsBundle\Entity\UserImage $userImage
     */
    public function setUserImage(\AlfaDev\Debate\NewsBundle\Entity\UserImage $userImage)
    {
        $this->userImage = $userImage;
    }

    /**
     * Get userImage
     *
     * @return AlfaDev\Debate\NewsBundle\Entity\UserImage 
     */
    public function getUserImage()
    {
        return $this->userImage;
    }
}