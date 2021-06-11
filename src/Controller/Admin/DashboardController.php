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
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $clients = $this->getDoctrine()->getRepository(Client::class)->findAll();
        $jobOffers = $this->getDoctrine()->getRepository(JobOffer::class)->findAll();
        $candidates = $this->getDoctrine()->getRepository(Candidate::class)->findAll();
        return $this->render(
            'admin/admin.html.twig',
            [
                'clients' => $clients,
                'job_offers' => $jobOffers,
                'candidates'=>$candidates
                
            ]
        );
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Luxury');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoCrud('JobOffer', 'fa fa-List', JobOffer::class);
        yield MenuItem::linktoCrud('JobType', 'fa fa-List', JobType::class);
        yield MenuItem::linktoCrud('JobCategory', 'fa fa-List', JobCategory::class);
        yield MenuItem::linktoCrud('InfoAdminClient', 'fa fa-List', InfoAdminClient::class);
        yield MenuItem::linktoCrud('InfoAdminCandidat', 'fa fa-List', InfoAdminCandidat::class);
        yield MenuItem::linktoCrud('Experience', 'fa fa-List', Experience::class);
        yield MenuItem::linktoCrud('Client', 'fa fa-List', Client::class);
        yield MenuItem::linktoCrud('Candidature', 'fa fa-List', Candidature::class);
        yield MenuItem::linktoCrud('Candidate', 'fa fa-List', Candidate::class);
        yield MenuItem::linktoCrud('User', 'fa fa-List', Candidate::class);
        
    }

    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    // public function configureFields(string $client): iterable
    // {
    //     return [
    //         IdField::new('id')->onlyOnIndex(),
    //         TextField::new('society_name'),
    //         TextEditorField::new('type_activite')->onlyOnForms(),
    //     ];
    // }
}
