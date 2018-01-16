<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
     private $username;

     /**
      * @ORM\Column(type="string")
      * @Assert\NotBlank()
     * @Assert\Email()
      */
     private $email;

     /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

     /**
      * @ORM\Column(type="string", length=64)
      */
    private $password;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="author", cascade={"remove"})
     */
    private $comment;

    /**
     * @ORM\OneToMany(targetEntity="Test", mappedBy="author", cascade={"remove"})
     */
    private $test;

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="author", cascade={"remove"})
     */
    private $article;

    /**
     * @ORM\OneToMany(targetEntity="Topic", mappedBy="author", cascade={"remove"})
     */
    private $topic;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;


    public function __construct()
    {
      $this->comment = new ArrayCollection();
      $this->test = new ArrayCollection();
      $this->article = new ArrayCollection();
      $this->topic = new ArrayCollection();
      $this->isActive = true;
      $this->salt = md5(uniqid('', true));
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;

    }
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @return mixed
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getComment()
    {
      return $this->comment;
    }

    public function addComment(Comment $comment)
    {
      $this->comment[] = $comment;
    }

    public function getTest()
    {
      return $this->test;
    }

    public function addTest(Test $test)
    {
      $this->test[] = $test;
    }

    public function getArticle()
    {
      return $this->article;
    }

    public function addArticle(Article $article)
    {
      $this->article[] = $article;
    }

    public function getTopic()
    {
      return $this->topic;
    }

    public function addTopic(Topic $topic)
    {
      return $this->topic[] = $topic;
    }

    public function getSalt()
    {

        return null;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,

        ) = unserialize($serialized);
    }


}
