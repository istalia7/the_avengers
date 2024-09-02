<?php

namespace App\Controller\Admin;

use App\Entity\Entreprise;
use App\Entity\EscapeGame;
use App\Entity\Evenements;
use App\Entity\Seminaire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Menu\DashboardMenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/admin.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('The Avengers');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Home', 'fa fa-home', '/');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-list');
        yield MenuItem::linkToCrud('Evenements', 'fa-solid fa-award', Evenements::class);
        yield MenuItem::linkToCrud('Escape Game', 'fa-solid fa-door-open', EscapeGame::class);
        yield MenuItem::linkToCrud('Seminaire', 'fa-solid fa-users', Seminaire::class);
        yield MenuItem::linkToCrud('Entreprise', 'fa-solid fa-users', Entreprise::class);
    }
}
