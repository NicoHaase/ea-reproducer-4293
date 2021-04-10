<?php

namespace App\Controller;

use App\Entity\Survey;
use App\Form\QuestionType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SurveyController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Survey::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('description'),
            CollectionField::new('questions')
                ->setEntryType(QuestionType::class)
                ->setFormTypeOption('by_reference', true)
                ->onlyOnForms()
                ->allowDelete()
        ];
    }
}