<?php

namespace AppBundle\Form;


use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoticiaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('resumen')
            ->add('cuerpo', CKEditorType::class)
            ->add('orden')
            ->add('visible')
            ->add('activo')
            ->add('categoriaNoticia')
            ->add( 'fotoNoticias',
                'collection',
                array(
                    'type'           => new FotoNoticiaType(),
                    'allow_add'      => true,
                    'allow_delete'   => true,
                ) )

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Noticia'
        ));
    }
}
