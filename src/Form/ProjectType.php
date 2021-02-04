<?php

namespace App\Form;

use App\Entity\ContentManagementSystem;
use App\Entity\Customer;
use App\Entity\DesignPattern;
use App\Entity\Framework;
use App\Entity\Language;
use App\Entity\Librairie;
use App\Entity\Method;
use App\Entity\Picture;
use App\Entity\Project;
use App\Entity\Software;
use App\Entity\TypeProject;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('webLink')
            ->add('typeOfProject', EntityType::class, [
                'class' => TypeProject::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'label' => 'Choisir un type de projet',
            ])
            ->add('language', EntityType::class, [
                'class' => Language::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Choisir un langage',
            ])
            ->add('librairies', EntityType::class, [
                'class' => Librairie::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Choisir une librairie',
            ])
            ->add('frameworks', EntityType::class, [
                'class' => Framework::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Choisir un framework',
            ])
            ->add('designPattern', EntityType::class, [
                'class' => DesignPattern::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Choisir un Design Pattern',
            ])
            ->add('softwares', EntityType::class, [
                'class' => Software::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Choisir un logiciel',
            ])
            ->add('method', EntityType::class, [
                'class' => Method::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Choisir une méthode',
            ])
            ->add('contentManagementSystems', EntityType::class, [
                'class' => ContentManagementSystem::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Choisir un CMS',
            ])
            ->add('customers', EntityType::class, [
                'class' => Customer::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'label' => 'Choisir un client',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
