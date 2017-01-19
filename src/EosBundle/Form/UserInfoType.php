<?php

namespace EosBundle\Form;


use EosBundle\Document\InstallationInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstallationInfoCreateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('lunaVersion',      TextType::class, ['required' => true])
            ->add('systemIdentifier', TextType::class, ['required' => true])
            ->add('systemVersion',    TextType::class, ['required' => true])
            ->add('kodiVersion',      TextType::class, ['required' => true])
            ->add('moonlightVersion', TextType::class, ['required' => true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => InstallationInfo::class,
            'csrf_protection' => false,
        ]);
    }

    public function getName()
    {
        return 'installation_info_create_type';
    }
}