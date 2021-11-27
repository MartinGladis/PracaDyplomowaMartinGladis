<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Produkt')
            ->setEntityLabelInPlural('Produkty')
            ->setSearchFields(['name']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('category'));
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Nazwa');
        yield NumberField::new('price', 'Cena');
        yield AssociationField::new('category', 'Kategoria');
        yield TextEditorField::new('description', 'Opis');
        yield DateTimeField::new('createAt', 'Utworzone')->hideOnForm();
        yield ImageField::new('image', 'Zdjęcie')
            ->setBasePath('/images/uploads/products')
            ->setUploadDir('public/images/uploads/products')
            ->setUploadedFileNamePattern('[contenthash].[extension]');
    }
}
