<?php

namespace App\Form;

use App\Entity\Blog;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use phpDocumentor\Reflection\Types\Nullable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use function Sodium\add;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('body', CKEditorType::class, [
                'config' => ['toolbar' => 'full'],
            ])
            ->add('imageFile', VichImageType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Blog::class,
        ]);
    }
}
