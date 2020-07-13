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
                ->add('name',TextType::class, array('label' => 'Nombre','attr' => array('class' =>'form-control')))
                ->add('gender' , ChoiceType::class,
                    array(
                        'choices' => array(
                            'Mujer'       => 'FEMALE',
                            'Hombre'      => 'MALE',
                        ),
                        'label' => '* Género',
                        'attr' =>array('class' =>'form-control')
                    )
                )
                ->add('identification_number',TextType::class, array(
                    'label' => 'Cedula',
                    'attr'    =>array(
                        'class'         =>'form-control')
                ))
                ->add('phone_number',TextType::class, array(
                    'label' => 'Teléfono',
                    'attr'    =>array(
                        'class'         =>'form-control')
                ))
                ;
        if($options['is_employee']){
            $builder
                ->add('type_of_contract', ChoiceType::class,
                    array(
                        'choices' => array(
                            'Término indefinido'       => 'TERMINO INDEFINIDO',
                            'Termino definido'      => 'TERMINO DEFINIDO',
                            'Tiempo parcial'        => 'TIEMPO PARCIAL',
                        ),
                        'label' => 'Tipo de contrato',
                        'attr' =>array('class' =>'form-control')
                    ))
                ->add('boss',EntityType::class, [
                    'class' => Employee::class,
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('e')
                            ->orderBy('e.name', 'ASC');
                    },
                    'choice_label' => 'name',
                    'label' => 'Empleador',
                    'attr' =>array('class' =>'form-control')])
            ;
        }else{
            $builder

                ->add('address',TextType::class, array(
                    'label' => 'Dirección',
                     'attr'    =>array(
                            'class'         =>'form-control')
                ))
                ->add('date_of_birth',DateType::class, array(
                    'label' => 'Fecha de nacimiento',
                    'attr'    =>array(
                        'class'         =>'form-control')
                ))
            ;
        }

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
            'is_employee' => 0,
        ]);
    }
}
