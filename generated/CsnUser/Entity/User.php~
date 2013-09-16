<?php

namespace CsnUser\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="CsnUser\Entity\Repository\UserRepository")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="display_name", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $displayName;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, precision=0, scale=0, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $answer;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="password_salt", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $passwordSalt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registration_date", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $registrationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="registration_token", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $registrationToken;

    /**
     * @var boolean
     *
     * @ORM\Column(name="email_confirmed", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $emailConfirmed;

    /**
     * @var \CsnUser\Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="CsnUser\Entity\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $role;

    /**
     * @var \CsnUser\Entity\Language
     *
     * @ORM\ManyToOne(targetEntity="CsnUser\Entity\Language")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $language;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CsnUser\Entity\User", mappedBy="myFriends")
     */
    private $friendsWithMe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CsnUser\Entity\User", inversedBy="friendsWithMe")
     * @ORM\JoinTable(name="friends",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="friend_id", referencedColumnName="id", nullable=true)
     *   }
     * )
     */
    private $myFriends;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     * @return User
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    
        return $this;
    }

    /**
     * Get displayName
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
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
     * Set state
     *
     * @param integer $state
     * @return User
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return User
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return User
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    
        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return User
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set passwordSalt
     *
     * @param string $passwordSalt
     * @return User
     */
    public function setPasswordSalt($passwordSalt)
    {
        $this->passwordSalt = $passwordSalt;
    
        return $this;
    }

    /**
     * Get passwordSalt
     *
     * @return string 
     */
    public function getPasswordSalt()
    {
        return $this->passwordSalt;
    }

    /**
     * Set registrationDate
     *
     * @param \DateTime $registrationDate
     * @return User
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
    
        return $this;
    }

    /**
     * Get registrationDate
     *
     * @return \DateTime 
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * Set registrationToken
     *
     * @param string $registrationToken
     * @return User
     */
    public function setRegistrationToken($registrationToken)
    {
        $this->registrationToken = $registrationToken;
    
        return $this;
    }

    /**
     * Get registrationToken
     *
     * @return string 
     */
    public function getRegistrationToken()
    {
        return $this->registrationToken;
    }

    /**
     * Set emailConfirmed
     *
     * @param boolean $emailConfirmed
     * @return User
     */
    public function setEmailConfirmed($emailConfirmed)
    {
        $this->emailConfirmed = $emailConfirmed;
    
        return $this;
    }

    /**
     * Get emailConfirmed
     *
     * @return boolean 
     */
    public function getEmailConfirmed()
    {
        return $this->emailConfirmed;
    }

    /**
     * Set role
     *
     * @param \CsnUser\Entity\Role $role
     * @return User
     */
    public function setRole(\CsnUser\Entity\Role $role = null)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return \CsnUser\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set language
     *
     * @param \CsnUser\Entity\Language $language
     * @return User
     */
    public function setLanguage(\CsnUser\Entity\Language $language = null)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return \CsnUser\Entity\Language 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Add friendsWithMe
     *
     * @param \CsnUser\Entity\User $friendsWithMe
     * @return User
     */
    public function addFriendsWithMe(\CsnUser\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe[] = $friendsWithMe;
    
        return $this;
    }

    /**
     * Remove friendsWithMe
     *
     * @param \CsnUser\Entity\User $friendsWithMe
     */
    public function removeFriendsWithMe(\CsnUser\Entity\User $friendsWithMe)
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
     * Add myFriends
     *
     * @param \CsnUser\Entity\User $myFriends
     * @return User
     */
    public function addMyFriend(\CsnUser\Entity\User $myFriends)
    {
        $this->myFriends[] = $myFriends;
    
        return $this;
    }

    /**
     * Remove myFriends
     *
     * @param \CsnUser\Entity\User $myFriends
     */
    public function removeMyFriend(\CsnUser\Entity\User $myFriends)
    {
        $this->myFriends->removeElement($myFriends);
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