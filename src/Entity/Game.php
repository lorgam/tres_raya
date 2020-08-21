<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Game
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="datetime")
   */
  private $fechaInicio;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  private $winner;

  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $turn;

  /**
   * @ORM\OneToMany(targetEntity="Square", mappedBy="game")
   * @ORM\OrderBy({"position" = "ASC"})
   */
  private $squares;

  public function __construct()
  {
    $this->squares = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getFechaInicio(): ?\DateTimeInterface
  {
    return $this->fechaInicio;
  }

  public function setFechaInicio(\DateTimeInterface $fechaInicio): self
  {
    $this->fechaInicio = $fechaInicio;

    return $this;
  }

  public function getWinner(): ?int
  {
    return $this->winner;
  }

  public function setWinner(?int $winner): self
  {
    $this->winner = $winner;

    return $this;
  }

  public function getTurn(): int
  {
    return $this->turn;
  }

  public function setTurn(int $turn): self
  {
    $this->turn = $turn;

    return $this;
  }

  public function addSquare(Square $square)
  {
    $this->squares->add($square);
  }

  public function getSquareByPosition(int $position): ?Square
  {
    foreach($this->squares as $i => $square)
    {
      if ($square->getPosition() == $position) return $square;
    }
    return null;
  }

  public function getSquareByRowColumn(int $row, int $column): ?Square
  {
    return $this->getSquareByPosition($row * 3 + $column);
  }
}
