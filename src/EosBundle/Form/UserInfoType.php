<?php

namespace EosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use EosBundle\Document\UserInfo;

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
            ->add('luna_version',      TextType::class, ['required' => true])
            ->add('system_identifier', TextType::class, ['required' => true])
            ->add('system_version',    TextType::class, ['required' => true])
            ->add('kodi_version',      TextType::class, ['required' => true])
            ->add('moonlight_version', TextType::class, ['required' => true])
            ->add('local_ip',          TextType::class, ['required' => true])
            ->add('hosts',             CollectionType::class, [
                'entry_type'   => LunaHostType::class,
                'allow_add'    => true,
                'allow_delete' => true
            ])
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
