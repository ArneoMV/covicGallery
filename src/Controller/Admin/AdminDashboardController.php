<?php

namespace App\Controller\Admin;


use App\Entity\Style;
use App\Entity\Technique;
use App\Entity\Painting;
use App\Entity\User;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('CovicGallery');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Paintings', 'fas fa-image', Painting::class);
        yield MenuItem::linkToCrud('Styles', 'fas fa-calendar-week', Style::class);
        yield MenuItem::linkToCrud('Techniques', 'fas fa-paint-brush', Technique::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
    }
}
