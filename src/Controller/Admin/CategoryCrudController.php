<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Kategoria')
            ->setEntityLabelInPlural('Kategorie')
            ->setSearchFields(['name']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Nazwa');
        yield ImageField::new('image', 'Zdjęcie')
            ->setBasePath('/images/uploads/categories')
            ->setUploadDir('public/images/uploads/categories')
            ->setUploadedFileNamePattern('[contenthash].[extension]');
    }
}
