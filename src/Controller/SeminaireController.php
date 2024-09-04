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
}
