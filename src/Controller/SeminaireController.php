<?php

namespace App\Controller;

use App\Repository\SeminaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SeminaireController extends AbstractController
{
    #[Route('/seminaire', name: 'app_seminaire')]
    public function index(SeminaireRepository $seminaireRepository): Response
    {
        $seminaires = $seminaireRepository->findAll();
        return $this->render('seminaire/index.html.twig', [
            'seminaires' => $seminaires,
        ]);
    }

    #[Route('/seminaire/{id}', name: 'app_seminaire_details')]
    public function details(int $id, SeminaireRepository $seminaireRepository): Response
    {
        $seminaire = $seminaireRepository->find($id);
        return $this->render('seminaire/seminaire.html.twig', [
            'seminaire' => $seminaire,
        ]);
    }
}
