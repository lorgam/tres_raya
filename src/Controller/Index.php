<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Game;

class Index extends AbstractController
{
  /**
   * @Route("/", name="index")
   */
  public function index(Request $request)
  {
    $form = $this->createFormBuilder()
                 ->add('id', NumberType::class, ['html5' => true])
                 ->add('continue', SubmitType::class, ['label' => 'Continuar'])
                 ->getForm();

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
    {
      $formData = $form->getData();
      $id = $formData['id'];
      $game = $this->getDoctrine()->getRepository(Game::class)->find($id);

      if (!$game) {
        throw $this->createNotFoundException('Partida no encontrada: '.$id);
      }

      return $this->redirectToRoute('continue', ['id' => $id]);
    }

    return $this->render('index.html.twig', [
      'form' => $form->createView()
    ]);
  }
}
