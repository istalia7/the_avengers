<?php

namespace App\Controller\Admin;

use App\Entity\EscapeGame;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Image;

class EscapeGameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EscapeGame::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextEditorField::new('description'),
            DateTimeField::new('date', 'Date et Heure'),
            IntegerField::new('nbrPlaces', 'Nombre de places'),
            NumberField::new('duree'),
            NumberField::new('prix')->setDecimalSeparator(','),
            ImageField::new('imageName', 'Image')
                ->setBasePath('images/escape_game')
                ->setUploadDir('public/images/escape_game')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false)
                ->setFileConstraints(new Image(maxSize: '1M'))
        ];
    }
}
