<?php

namespace App\Controller\Admin;

use App\Entity\Technique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TechniqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Technique::class;
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
