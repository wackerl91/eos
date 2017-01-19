<?php

namespace EosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use EosBundle\Document\LunaLogEntry;

class LunaLogEntryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('log_level',              TextType::class, ['required' => true])
            ->add('log_message',            TextType::class, ['required' => true])
            ->add('additional_information', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => LunaLogEntry::class,
            'csrf_protection' => false,
        ]);
    }
}
