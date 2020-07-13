<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('gender')
            ->add('identification_number')
            ->add('phone_number')
            ->add('address')
            ->add('date_of_birth')
            ->add('type_of_contract')
            ->add('boss',EntityType::class, [
                'class' => Employee::class,
                'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('e')
                ->orderBy('e.name', 'ASC');
        },
        'choice_label' => 'name',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
