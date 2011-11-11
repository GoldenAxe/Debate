<?php
	/**
*
*/
namespace AlfaDev\Debate\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="Posts")
 */
class Post
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;
	
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="posts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * 
     * @var User $user
     */
   protected $user;
	
	/**
     * @ORM\Column(type="text")
     */
	protected $text;
	
	/**
     * @ORM\Column(type="integer")
     */
	protected $positiveVotes;
	
	/**
     * @ORM\Column(type="integer")
     */
	protected $negativeVotes;
	
   /**
     * @ORM\ManyToOne(targetEntity="PostType")
     * @ORM\JoinColumn(name="posttype_id", referencedColumnName="id")
     *
     * @var User $posttype
     */
	protected $posttype;
	
   /**
     * @ORM\ManyToOne(targetEntity="PostState")
     * @ORM\JoinColumn(name="poststate_id", referencedColumnName="id")
     *
     * @var User $poststate
     */
	protected $poststate;


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
     * Set text
     *
     * @param text $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return text 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set positiveVotes
     *
     * @param integer $positiveVotes
     */
    public function setPositiveVotes($positiveVotes)
    {
        $this->positiveVotes = $positiveVotes;
    }

    /**
     * Get positiveVotes
     *
     * @return integer 
     */
    public function getPositiveVotes()
    {
        return $this->positiveVotes;
    }

    /**
     * Set negativeVotes
     *
     * @param integer $negativeVotes
     */
    public function setNegativeVotes($negativeVotes)
    {
        $this->negativeVotes = $negativeVotes;
    }

    /**
     * Get negativeVotes
     *
     * @return integer 
     */
    public function getNegativeVotes()
    {
        return $this->negativeVotes;
    }

    /**
     * Set user
     *
     * @param AlfaDev\Debate\NewsBundle\Entity\User $user
     */
    public function setUser(\AlfaDev\Debate\NewsBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return AlfaDev\Debate\NewsBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set posttype
     *
     * @param AlfaDev\Debate\NewsBundle\Entity\PostType $posttype
     */
    public function setPosttype(\AlfaDev\Debate\NewsBundle\Entity\PostType $posttype)
    {
        $this->posttype = $posttype;
    }

    /**
     * Get posttype
     *
     * @return AlfaDev\Debate\NewsBundle\Entity\PostType 
     */
    public function getPosttype()
    {
        return $this->posttype;
    }

    /**
     * Set poststate
     *
     * @param AlfaDev\Debate\NewsBundle\Entity\PostState $poststate
     */
    public function setPoststate(\AlfaDev\Debate\NewsBundle\Entity\PostState $poststate)
    {
        $this->poststate = $poststate;
    }

    /**
     * Get poststate
     *
     * @return AlfaDev\Debate\NewsBundle\Entity\PostState 
     */
    public function getPoststate()
    {
        return $this->poststate;
    }
}