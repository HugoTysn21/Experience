<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Post1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createdBy')
            ->add('title')
            ->add('introduction')
            ->add('createdAt')
            ->add('introductionPost')
            ->add('contentTwo')
            ->add('contentThree')
            ->add('contentFour')
            ->add('avatar', FileType::class, [
                'label'     =>  "Image de l'article",
                'required'  => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
