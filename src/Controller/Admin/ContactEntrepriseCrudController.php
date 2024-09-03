<?php

namespace App\Controller\Admin;

use App\Entity\ContactEntreprise;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactEntrepriseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactEntreprise::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->disable(Action::NEW, Action::EDIT);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('prenom'),
            EmailField::new('email'),
            TextField::new('raison'),
            TextField::new('nomEntreprise'),
            TelephoneField::new('numTel'),
            TextEditorField::new('message'),
            DateField::new('dateEnvoi')->setFormat('dd.MM.yyyy'),
        ];
    }
}
