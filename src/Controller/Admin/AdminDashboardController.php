<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Products;
use App\Entity\Orders;
use App\Entity\Users;


class AdminDashboardController extends AbstractDashboardController
{

    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ){
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(UsersCrudController::class)
        ->generateUrl();


        return $this->render('bundles/EasyAdminBundle/dashboard.html.twig');
    
    }

    #[Route('/admin/chart-data', name: 'admin_chart_data')]
    public function chartData(): Response
    {
    // Ici, générez les données de votre graphique. Cela pourrait impliquer
    // d'interroger votre base de données pour obtenir des statistiques, etc.
    // Pour cet exemple, je vais simplement retourner des données statiques.

        $data = [
            'labels' => ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun'],
            'datasets' => [
                [
                    'label' => 'Ventes',
                    'data' => [10, 15, 7, 18, 5, 14],
                ],
            ],
        ];

    return $this->json($data);
    }



    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PlayWith Corp.');
            
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::section('Blog', 'fas fa-blog'),
            MenuItem::subMenu('Articles', 'fas fa-folder')
            ->setSubItems([
                MenuItem::linkToCrud('Add post', 'fa fa-file-plus', Article::class)
                ->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Edit post', 'fas fa-file-edit', Article::class)
                ->setAction(Crud::PAGE_EDIT),
                MenuItem::linkToCrud('List post', 'fa fa-file-minus', Article::class)
                ->setAction(Crud::PAGE_INDEX),
            ]),
            MenuItem::section('Commandes'),
            MenuItem::subMenu('Commandes', 'fas fa-file')
            ->setSubItems([
                MenuItem::linkToCrud('Add orders', 'fad fa-file-plus', Orders::class)
                    ->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Edit orders', 'fas fa-file-edit', Orders::class)
                    ->setAction(Crud::PAGE_EDIT),
                MenuItem::linkToCrud('List orders', 'fas fa-file-minus', Orders::class)
                    ->setAction(Crud::PAGE_INDEX),
            ]),
            MenuItem::section('Produits'),
            MenuItem::subMenu('Produits','fas fa-shopping-cart')
            ->setSubItems([
                MenuItem::linkToCrud('Add product', 'fa fa-cart-plus', Products::class)
                    ->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Edit product', 'fas fa-edit', Products::class)
                    ->setAction(Crud::PAGE_EDIT),
                MenuItem::linkToCrud('List product', 'fas fa-cart-arrow-down', Products::class)
                    ->setAction(Crud::PAGE_INDEX),
            ]),
            MenuItem::section('Utilisateurs'),
            MenuItem::subMenu('Utilisateurs','fas fa-users')
            ->setSubItems([
                MenuItem::linkToCrud('Add user', 'fas fa-user-plus', Users::class)
                    ->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Edit user', 'fas fa-edit', Users::class)
                    ->setAction(Crud::PAGE_EDIT),
                MenuItem::linkToCrud('List user', 'fas fa-user-minus', Users::class)
                    ->setAction(Crud::PAGE_INDEX),
            ]),
            MenuItem::section('Integrations'),
            // add here other integrations,
            MenuItem::linkToRoute('Retour sur le site', 'fas fa-home', 'homepage'), 
            MenuItem::section(),
            MenuItem::linkToLogout('Logout', 'fas fa-sign-out-alt'),
        ];
    }
}
