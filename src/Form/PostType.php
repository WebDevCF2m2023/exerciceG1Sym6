<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\Section;
use App\Entity\Tag;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormEvents;

class PostType extends AbstractType
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('postTitle')
            ->add('postText') /*
            ->add('postDateCreated', null, [
                'widget' => 'single_text',
            ])
            ->add('postDatePublished', null, [
                'widget' => 'single_text',
            ]) */
        ->add('sections', EntityType::class, [
        'class' => Section::class,
        'choice_label' => 'section_title',
        'multiple' => true,
        'expanded' => true
    ])
        ->add('tags', EntityType::class, [
            'class' => Tag::class,
            'choice_label' => 'tag_name',
            'multiple' => true,
            'expanded' => true
        ])/*
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ]) */
        ->add('postImgLoc');
        if ($this->security->isGranted('ROLE_ADMIN') || $this->security->isGranted('ROLE_MANAGER')) {
            $builder->add('postIsPublished');
        }


    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}


// add post image location