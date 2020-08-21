<?php

namespace App\Logic;

use App\Entity\Game;

class GameLogic
{
  public function checkWinner(Game $game, int $position, int $player)
  {
    $row = intdiv($position, 3);
    $column = $position % 3;

    $rows = 0;
    $columns = 0;
    $diag1 = 0;
    $diag2 = 0;

    for ($i = 0; $i < 3; $i++)
    {
      $squaRow = $game->getSquareByRowColumn($row, $i);
      $squaCol = $game->getSquareByRowColumn($i, $column);
      $squaDiag1 = $game->getSquareByRowColumn($i, $i);
      $squaDiag2 = $game->getSquareByRowColumn($i, 2 - $i);

      if ($squaRow !== null && $squaRow->getPlayer() == $player) $rows++;
      if ($squaCol !== null && $squaCol->getPlayer() == $player) $columns++;
      if ($squaDiag1 !== null && $squaDiag1->getPlayer() == $player) $diag1++;
      if ($squaDiag2 !== null && $squaDiag2->getPlayer() == $player) $diag2++;
    }

    return $rows == 3 || $columns == 3  || $diag1 == 3|| $diag2 == 3;
  }
}

