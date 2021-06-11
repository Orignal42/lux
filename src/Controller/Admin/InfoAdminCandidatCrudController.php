<?php

namespace App\Controller\Admin;

use App\Entity\InfoAdminCandidat;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;




class InfoAdminCandidatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InfoAdminCandidat::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('notes'),
            DateTimeField::new('date_created'),
            Field::new('date_deleted'),
         

        ];
    }
    
}
