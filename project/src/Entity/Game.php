<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
 */
class Game
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
     * @ORM\Column(type="string")
     */
    private $info;

    /**
     * @ORM\OneToOne(targetEntity="Test")
     */
     private $test;

     /**
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="game", cascade={"remove"})
     */
     private $image;



     public function __construct()
     {
       $this->image = new ArrayCollection();
     }



     public function getId()
     {
         return $this->id;
     }

     public function getTitle()
     {
       return $this->title;
     }

     public function setTitle($title)
     {
       $this->title = $title;
     }

     public function getInfo()
     {
       return $this->info;
     }

     public function setInfo($info)
     {
       $this->info = $info;
     }

     public function getTest()
     {
       return $this->test;
     }

     public function setTest(Test $test = null)
     {
       $this->test = $test;
     }

     public function getImage()
     {
         return $this->image;
     }


     public function addImage(Image $image)
     {
         $this->image[] = $image;
     }




}
