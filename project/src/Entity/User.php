<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
     private $username;

     /**
      * @ORM\Column(type="string")
      */
     private $email;

     /**
      * @ORM\Column(type="string")
      */
    private $password;

    /**
     * @ORM\Column(type="string")
     */
    private $role;

    /**
     * @ORM\Column(type="string")
     */
    private $picture;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="author", cascade={"persist", "remove"})
     * @ORM\Column(nullable=true)
     */
    private $comment;

    /**
     * @ORM\OneToMany(targetEntity="Test", mappedBy="author", cascade={"persist", "remove"})
     * @ORM\Column(nullable=true)
     */
    private $test;

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="author", cascade={"persist", "remove"})
     * @ORM\Column(nullable=true)
     */
    private $article;

    /**
     * @ORM\OneToMany(targetEntity="Topic", mappedBy="author", cascade={"persist", "remove"})
     * @ORM\Column(nullable=true)
     */
    private $topic;

    public function __construct()
    {
      $this->comment = new ArrayCollection();
      $this->test = new ArrayCollection();
      $this->article = new ArrayCollection();
      $this->topic = new ArrayCollection();
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



    // add your own fields
}
