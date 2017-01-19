<?php

namespace EosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use EosBundle\Document\LunaHost;

class LunaHostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gfeVersion',    TextType::class,    ['required' => true])
            ->add('numberOfGames', IntegerType::class, ['required' => true])
            ->add('hostUuid',      TextType::class,    ['required' => true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => LunaHost::class,
            'csrf_protection' => false,
        ]);
    }
}
