<?php

namespace App\Controller\Admin;

use App\Entity\Technique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TechniqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Technique::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')->setLabel('Umjetničko razdoblje'),
        ];
    }
}
