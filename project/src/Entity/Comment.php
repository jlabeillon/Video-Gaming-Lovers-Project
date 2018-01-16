<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 * @ORM\Table(name="comment")
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="date")
     */
    private $date;


    /**
     * @ORM\Column(type="text")
     */
    private $content;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comment")
     */
    private $author;


    /**
     * @ORM\ManyToOne(targetEntity="Topic", inversedBy="comment")
     */
    private $topic;


    /**
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="comment")
     */
    private $article;


    /**
     * @ORM\ManyToOne(targetEntity="Test", inversedBy="comment")
     */
    private $test;

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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @return mixed
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
        if ($author != null) {
          $author->addComment($this);
        }

    }

    /**
     * @param mixed $topic
     */
    public function setTopic($topic): void
    {
        $this->topic = $topic;
        if ($topic != null) {
          $topic->addComment($this);
        }
    }

    /**
     * @param mixed $article
     */
    public function setArticle($article): void
    {
        $this->article = $article;
        if ($article != null) {
          $article->addComment($this);
        }

    }

    /**
     * @param mixed $test
     */
    public function setTest($test): void
    {
        $this->test = $test;
        if ($test != null) {
          $test->addComment($this);
        }

    }
    // add your own fields


}
