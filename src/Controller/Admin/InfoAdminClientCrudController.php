<?php

namespace App\Controller\Admin;

use App\Entity\InfoAdminClient;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InfoAdminClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InfoAdminClient::class;
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
