<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routerBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routerBuilder->setController(ProductCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sklep Internetowy');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Powrót do Strony Głównej', 'fas fa-home', 'homepage');
        yield MenuItem::section('Encje');
        yield MenuItem::linkToCrud('Kategorie', 'fa fa-list', Category::class);
        yield MenuItem::linkToCrud('Produkty', 'fab fa-product-hunt', Product::class);
    }
}
