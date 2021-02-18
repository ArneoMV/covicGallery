<?php

namespace App\Controller\Admin;

use App\Entity\Painting;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

use Vich\UploaderBundle\Form\Type\VichImageType;

class PaintingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Painting::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Slika')
            ->setEntityLabelInPlural('Slike')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            TextField::new('name', 'Naziv slike')->setLabel('Naziv slike'),
            ImageField::new('image', 'Slika')
                ->setBasePath('images/paintings')
                ->setUploadDir('public/images/paintings'),
            TextEditorField::new('description', 'Opis slike'),
            MoneyField::new('price', 'Cijena')->setCurrency('EUR'),
            NumberField::new('width', 'Širina (cm)'),
            NumberField::new('height', 'Visina (cm)'),
            NumberField::new('depth', 'Dubina (cm)'),
            BooleanField::new('isAvailable', 'Dostupno'),
            AssociationField::new('style', 'Stil'),
            AssociationField::new('technique', 'Umjetničko razdoblje'),
            DateTimeField::new('createdAt', 'Objavljeno')->hideOnForm(),
            DateTimeField::new('updatedAt', 'Zadnja promjena')->hideOnForm(),
        ];

        return $fields;
    }

    public function configureActions(Actions $actions): Actions
    {
        $actions->add(Crud::PAGE_INDEX, 'detail')
            ->update(Crud::PAGE_DETAIL, Action::EDIT, function (Action $action) {
                return $action->setLabel("Uredi");
            })
            ->update(Crud::PAGE_DETAIL, Action::DELETE, function (Action $action) {
                return $action->setLabel("Izbriši");
            })            
            ->update(Crud::PAGE_DETAIL, Action::INDEX, function (Action $action) {
                return $action->setLabel("Lista slika");
            })

            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel("Spremi");
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel("Spremi i dodaj novu");
            })

            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel("Spremi");
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
                return $action->setLabel("Spremi i nastavi");
            })

            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel("Nova slika");
            })
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setLabel("Detaljnije");
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel("Uredi");
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel("Izbriši");
            });

        return $actions;
    }
}
