<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Post2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createdBy')
            ->add('title')
            ->add('avatarFileName')
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
