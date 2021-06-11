<?php

namespace App\Controller\Admin;

use App\Entity\InfoAdminClient;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
class InfoAdminClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InfoAdminClient::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name'),
            Field::new('poste'),
            Field::new('numero'),
            Field::new('notes'),
            Field::new('email'),
            AssociationField::new('clientId'),
        ];
    }
    
}
