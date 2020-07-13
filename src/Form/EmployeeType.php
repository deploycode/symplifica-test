<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, ['label' => 'Nombre'])
            ->add('gender' , ChoiceType::class,

                array(
                    'choices' => array(
                        'Mujer'       => 'FEMALE',
                        'Hombre'      => 'MALE',
                    ),
                    'label' => 'Género'
                )
            )
            ->add('identification_number',TextType::class, ['label' => 'Cedula'])
            ->add('phone_number',TextType::class, ['label' => 'Teléfono'])
            ->add('address',TextType::class, ['label' => 'Dirección'])
            ->add('date_of_birth',DateType::class, ['label' => 'Fecha de nacimiento'])
            ->add('type_of_contract', ChoiceType::class,
                array(
                    'choices' => array(
                        'Término indefinido'       => 'TERMINO INDEFINIDO',
                        'Termino definido'      => 'TERMINO DEFINIDO',
                        'Tiempo parcial'        => 'TIEMPO PARCIAL',
                    ),
                    'label' => 'Tipo de contrato'
                ))
            ->add('boss',EntityType::class, [
                'class' => Employee::class,
                'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('e')
                ->orderBy('e.name', 'ASC');
        },
        'choice_label' => 'name',
                'label' => 'Empleador'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
