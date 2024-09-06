<?php

namespace App\Controller;

use App\Entity\EscapeGame;
use App\Repository\EscapeGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EscapeGameController extends AbstractController
{
    #[Route('/escape-game', name: 'app_escape_game')]
    public function index(EscapeGameRepository $escapeGameRepository): Response
    {
        $escapeGames = $escapeGameRepository->findAll();
        foreach ($escapeGames as $escapeGame) {
            $hours = floor($escapeGame->getDuree());
            $minutes = ($escapeGame->getDuree() - $hours) * 60;
            $formattedDuration = sprintf('%dh%02dm', $hours, $minutes);

            $escapeGame->formattedDuration = $formattedDuration;
        }
        return $this->render('escape_game/index.html.twig', [
            "escapeGames" => $escapeGames,
        ]);
    }
}
