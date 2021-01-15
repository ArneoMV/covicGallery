<?php

namespace App\Controller\Admin;

use App\Entity\Painting;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use Vich\UploaderBundle\Form\Type\VichImageType;

class PaintingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Painting::class;
    }

    public function configureFields(string $pageName): iterable
    {
        
        $imageFile = ImageField::new('imageFile', 'image')->setBasePath('\images\paintings')->setUploadDir('\public\images\paintings');
        $image = ImageField::new('image')->setBasePath('/images/paintings');

        $fields = [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')->setLabel('Naziv slike'),
            TextEditorField::new('description')->setLabel('Opis slike'),
            MoneyField::new('price')->setCurrency('EUR')->setLabel('Cijena'),
            NumberField::new('width')->setLabel('Širina (cm)'),
            NumberField::new('height')->setLabel('Visina (cm)'),
            NumberField::new('depth')->setLabel('Dubina (cm)'),
            BooleanField::new('isAvailable')->setLabel('Dostupno'),
            AssociationField::new('style')->setLabel('Stil'),
            AssociationField::new('technique')->setLabel('Umjetničko razdoblje'),
            DateTimeField::new('createdAt')->hideOnForm()->setLabel('Objavljeno'),
            DateTimeField::new('updatedAt')->hideOnForm()->setLabel('Zadnja promjena'),
        ];

        if($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL){
            $fields[] = $image;
        } else{
            $fields[] = $imageFile;
        }

        return $fields;
    }
}
