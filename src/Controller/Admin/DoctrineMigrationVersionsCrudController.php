<?php

namespace App\Controller\Admin;

use App\Entity\DoctrineMigrationVersions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DoctrineMigrationVersionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DoctrineMigrationVersions::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
