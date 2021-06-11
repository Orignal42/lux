<?php

namespace App\Controller\Admin;

use App\Entity\JobOffer;
use App\Entity\Experience;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
class JobOfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return JobOffer::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('title'),
            Field::new('active'),
            Field::new('reference'),
            Field::new('notes'),
            Field::new('location'),
            DateTimeField::new('date_de_creation'),
            DateTimeField::new('closing_date'),
           

          
        ];
    }
 
}
