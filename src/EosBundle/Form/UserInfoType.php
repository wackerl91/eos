<?php

namespace EosBundle\Form;


use EosBundle\Document\UserInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserInfoType extends AbstractType
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
            'data_class'      => UserInfo::class,
            'csrf_protection' => false,
        ]);
    }

    public function getName()
    {
        return 'user_info_type';
    }
}