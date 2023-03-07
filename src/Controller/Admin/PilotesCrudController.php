<?php

//namespace crudPilotes;
namespace App\Controller\Admin;

use App\Entity\Pilotes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PilotesCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Pilotes::class;
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
