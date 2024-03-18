<?php

namespace App\Controller\Admin;

use App\Entity\Director;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Entity\Review;
use App\Entity\User;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Moviz');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Genres', 'fas fa-list', Genre::class);
        yield MenuItem::linkToCrud('Réalisateurs', 'fas fa-clapperboard', Director::class);
        yield MenuItem::linkToCrud('Films', 'fas fa-film', Movie::class);
        yield MenuItem::linkToCrud('Critiques', 'fas fa-star', Review::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);

    }
}