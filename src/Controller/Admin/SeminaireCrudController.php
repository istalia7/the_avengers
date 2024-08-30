<?php

namespace App\Controller\Admin;

use App\Entity\Seminaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Image;

class SeminaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Seminaire::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextEditorField::new('description'),
            DateTimeField::new('date', 'Date et Heure'),
            ImageField::new('imageName', 'Image')
                ->setBasePath('build/images/seminaires')
                ->setUploadDir('public/build/images/seminaires')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(true)
                ->setFileConstraints(new Image(maxSize: '1M'))
        ];
    }
}
