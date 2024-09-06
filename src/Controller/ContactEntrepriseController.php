<?php

namespace App\Controller;

use App\Entity\ContactEntreprise;
use App\Form\ContactEntrepriseFormType;
use App\Form\ContactFormType;
use App\Repository\InfosContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactEntrepriseController extends AbstractController
{
    #[Route('/contact-entreprise', name: 'app_contact_entreprise')]
    public function contactEntreprise(Request $request, EntityManagerInterface $entityManager, InfosContactRepository $infosContactRepository)
    {
        $contactEntreprise = new ContactEntreprise();
        $form = $this->createForm(ContactEntrepriseFormType::class, $contactEntreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // La date est mis à jour lors de l'envoi du formulaire
            $contactEntreprise->setDateEnvoi(new \DateTime());
            $entityManager->persist($contactEntreprise);
            $entityManager->flush();
            $this->addFlash('success', 'Votre message a bien été envoyé !');
            return $this->redirectToRoute('app_contact_entreprise');
        }

        $infosContacts = $infosContactRepository->findAll();
        return $this->render('contact_entreprise/index.html.twig', [
            'entrepriseForm' => $form->createView(),
            'infosContacts' => $infosContacts,
        ]);
    }
}
