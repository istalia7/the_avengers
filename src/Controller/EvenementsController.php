<?php

namespace App\Controller;

use App\Repository\EvenementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EvenementsController extends AbstractController
{
    #[Route('/evenements', name: 'app_evenements')]
    public function index(EvenementsRepository $evenementsRepository): Response
    {
        $evenements = $evenementsRepository->findAll();
        return $this->render('evenements/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }
}
