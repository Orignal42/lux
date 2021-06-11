<?php

namespace App\Controller\Admin;


use App\Entity\JobOffer;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


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
            Field::new('salary'),
            Field::new('location'),
            AssociationField::new('clientId'),
            AssociationField::new('jobTypeId'),
            AssociationField::new('jobCategoryId'),
            DateTimeField::new('date_de_creation'),
            DateTimeField::new('closing_date'),

            
           
           

          
        ];
    }
 
}
