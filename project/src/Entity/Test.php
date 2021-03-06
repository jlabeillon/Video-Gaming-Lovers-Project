<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 */
class Test
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
     private $title;

     /**
      * @ORM\Column(type="text")
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
         * @ORM\OneToMany(targetEntity="Comment", mappedBy="test", cascade={"remove"})
         */
         private $comment;

         /**
          * @ORM\ManyToOne(targetEntity="User", inversedBy="test")
          */
          private $author;

          public function __construct()
          {
            $this->comment = new ArrayCollection();
          }

          public function getId()
          {
            return $this->id;
          }

          public function getTitle()
          {
              return $this->title;
          }

          public function setTitle($title): void
          {
              $this->title = $title;
          }

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
              if ($author != null) {
                $author->addTest($this);
              }

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
