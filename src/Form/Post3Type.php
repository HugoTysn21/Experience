<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class Post3Type extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createdBy')
            ->add('title')
            ->add('avatarFileName')
            ->add('avatar', FileType::class, array('label' => 'File'))
            ->add('content')
            ->add('introduction')
            ->add('createdAt')
            ->add('introductionPost')
            ->add('contentTwo')
            ->add('contentThree')
            ->add('contentFour')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
