<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Game;
use App\Entity\Square;
use App\Logic\GameLogic;

/**
 * @Route("/game")
 */
class GameController extends AbstractController
{
  /**
   * @Route("/new", name="new_game")
   */
  public function newGame()
  {
    $game = new Game();
    $game->setFechaInicio(new \DateTime());
    $game->setTurn(0);

    $em = $this->getDoctrine()->getManager();
    $em->persist($game);
    $em->flush();

    return $this->render('game.html.twig', ['game' => $game]);
  }

  /**
   * @Route("/continue/{id}", name="continue")
   */
  public function continueGame(Game $game)
  {
    return $this->render('game.html.twig', ['game' => $game]);
  }

  /**
   * @Route("/movement/{id}/{position}", name="movement")
   */
  public function movement(Game $game, int $position, GameLogic $logic)
  {
    if ($game->getWinner() === null)
    {
      $square = $game->getSquareByPosition($position);
      if ($square == null)
      {
        $turn = $game->getTurn();
        $player = $turn % 2;

        $square = new Square();
        $square->setGame($game);
        $square->setPosition($position);
        $square->setPlayer($player);

        $game->addSquare($square);
        if ($logic->checkWinner($game, $position, $player)) $game->setWinner($player);
        else $game->setTurn($turn + 1);

        $em = $this->getDoctrine()->getManager();
        $em->persist($game);
        $em->persist($square);
        $em->flush();
      }
    }
    return $this->render('game.html.twig', ['game' => $game]);
  }
}

