<?php

namespace App\Controller\Admin;

use App\Entity\Candidate;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class CandidateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidate::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('gender'),
            Field::new('FirstName'),
            Field::new('LastName'),
            Field::new('Adress'),
            Field::new('Country'),
            Field::new('Nationality'),
            Field::new('CurrentLocation'),
            DateTimeField::new('Date_of_Birth'),
            Field::new('Place_of_Birth'),
            Field::new('Description'),
             AssociationField::new('experienceId'),
             AssociationField::new('jobCategoryId'),
             AssociationField::new('user'),
        ];
    }
  
}
