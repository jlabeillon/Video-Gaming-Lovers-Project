<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 */
class Picture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="Game", inversedBy="image")
    */
    private $game;

    public function getId()
    {
      return $this->id;
    }


  public function getGame()
  {
    return $this->game;
  }

  public function setGame($game)
  {
      $this->game = $game;
      $game->addImage($this);
  }

    // add your own fields
}
