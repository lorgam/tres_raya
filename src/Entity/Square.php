<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Square
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="squares")
     */
    private $game;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $position;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $player;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGame(): Game
    {
      return $this->game;
    }

    public function setGame($game): self
    {
      $this->game = $game;
      return $this;
    }

    public function getPosition(): ?int
    {
      return $this->position;
    }

    public function setPosition(int $position): self
    {
      $this->position = $position;
      return $this;
    }

    public function getPlayer(): ?int
    {
      return $this->player;
    }

    public function setPlayer(int $player): self
    {
      $this->player = $player;
      return $this;
    }
}

