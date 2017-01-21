<?php

namespace EosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use EosBundle\Document\LunaException;

class LunaExceptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('exception_string', TextType::class, ['required' => true])
            ->add('exception_value',  TextType::class, ['required' => true])
            ->add('traceback',        TextType::class, ['required' => true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'       => LunaException::class,
            'csrf_protection' => false,
        ]);
    }

    public function getName()
    {
        return 'luna_exception_type';
    }
}
