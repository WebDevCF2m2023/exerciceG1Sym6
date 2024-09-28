<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\category;
use App\Entity\tag;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('article_title')
            ->add('article_text')/*
            ->add('article_date_created', null, [
                'widget' => 'single_text',
                'required' => false,
                'data' => new \DateTime(),

            ])
            ->add('article_date_published', null, [
                'widget' => 'single_text',
            ])
            ->add('article_date_updated', null, [
                'widget' => 'single_text',
            ])
            ->add('article_created_by', null, [
                'empty_data' => "1",
            ])*/

            ->add('article_visible', null, [
                'empty_data' => false,
            ])
            ->add('article_img_loc')
            ->add('categories', EntityType::class, [
                'class' => category::class,
                'choice_label' => 'category_title',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('tags', EntityType::class, [
                'class' => tag::class,
                'choice_label' => 'tag_name',
                'multiple' => true,
                'expanded' => true,
            ])/*
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
