<?php

namespace App\Controller\Admin;

use App\Entity\Site;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class SiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Site::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            UrlField::new('lien'),
            TextEditorField::new('description'),
            AssociationField::new('client'),
            ChoiceField::new('phpversion')->setChoices([
                '7.0' => '7.0',
                '7.1' => '7.1',
                '7.2' => '7.2',
                '7.3' => '7.3',
                '7.3' => '7.3'
                ]
            ),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['nom', 'client.nom'])
            ->setDefaultSort(['id' => 'DESC'])
            ->setPaginatorPageSize(15)
        ;
    }
}
