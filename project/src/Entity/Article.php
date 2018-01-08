<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $content;

    /**
     * @ORM\Column(type="string")
     */
    private $thumbnail;


    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
    * @ORM\Column(type="string")
    */
    private $image;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="article")
     * @ORM\Column(nullable=true)
     */
    private $author;


    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="article", cascade={"persist", "remove"})
     * @ORM\Column(nullable=true)
     */
    private $comment;



    public function __construct()
    {
        $this->comment = new ArrayCollection();
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getImage()
    {
      return $this->image;
    }

    public function setImage($image)
    {
      $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        $author->addArticle($this);
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }


    public function addComment(Comment $comment)
    {
        $this->comment[] = $comment;
    }



}
