<?php

namespace App\Controller\Admin;
use App\Entity\JobOffer;
use App\Entity\JobType;
use App\Entity\JobCategory;
use App\Entity\InfoAdminCandidat;
use App\Entity\InfoAdminClient;
use App\Entity\Experience;
use App\Entity\Client;
use App\Entity\Candidature;
use App\Entity\Candidate;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class DashboardController extends AbstractDashboardController
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
            ->setTitle('Luxury');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

        yield MenuItem::linktoCrud('JobOffer', 'fa fa-List',JobOffer::class);
       
        yield MenuItem::linktoCrud('JobType', 'fa fa-List',JobType::class);   
        yield MenuItem::linktoCrud('JobCategory', 'fa fa-List',JobCategory::class);
        yield MenuItem::linktoCrud('InfoAdminClient', 'fa fa-List',InfoAdminClient::class); 
        yield MenuItem::linktoCrud('InfoAdminCandidat', 'fa fa-List',InfoAdminCandidat::class);
        yield MenuItem::linktoCrud('Experience', 'fa fa-List',Experience::class);
        yield MenuItem::linktoCrud('Client', 'fa fa-List',Client::class);
        yield MenuItem::linktoCrud('Candidature', 'fa fa-List',Candidature::class);
        yield MenuItem::linktoCrud('Candidate', 'fa fa-List',Candidate::class);          
        yield MenuItem::linktoCrud('User', 'fa fa-List',Candidate::class);       
    }
}
