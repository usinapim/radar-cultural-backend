<?php

namespace AppBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgendaType extends AbstractType {
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'titulo' )
			->add( 'resumen' )
			->add( 'cuerpo', CKEditorType::class )
			->add( 'visibleDesde',
				'datetime',
				array(
					'widget' => 'single_text',
					'format' => 'dd/MM/yyyy',
					'attr'   => array(
						'class'           => 'datepicker',
						'data-dateformat' => 'dd/mm/yy',
						'placeholder'     => 'Selecciona una fecha'
					)
				)

			)
			->add( 'visibleHasta',
				'datetime',
				array(
					'widget' => 'single_text',
					'format' => 'dd/MM/yyyy',
					'attr'   => array(
						'class'           => 'datepicker',
						'data-dateformat' => 'dd/mm/yy',
						'placeholder'     => 'Selecciona una fecha'
					)
				)

			)
			->add( 'fechaEventoDesde',
				'datetime',
				array(
					'widget' => 'single_text',
					'format' => 'dd/MM/yyyy',
					'attr'   => array(
						'class'           => 'datepicker',
						'data-dateformat' => 'dd/mm/yy',
						'placeholder'     => 'Selecciona una fecha'
					)
				)

			)
			->add( 'fechaEventoHasta',
				'datetime',
				array(
					'widget' => 'single_text',
					'format' => 'dd/MM/yyyy',
					'attr'   => array(
						'class'           => 'datepicker',
						'data-dateformat' => 'dd/mm/yy',
						'placeholder'     => 'Selecciona una fecha'
					)
				)

			)
			->add( 'orden' )
			->add( 'creacion' )
			->add( 'activo' )
			->add( 'categoriaAgenda', 'entity',
				array(
					'class' => 'AppBundle\Entity\CategoriaAgenda',
//					'multiple' => true,
					'attr'  => array( 'multiple' => true, 'data-widget' => 'select2' ),


		) )
			->add( 'fotoAgenda',
				'collection',
				array(
					'type'         => new FotoAgendaType(),
					'allow_add'    => true,
					'allow_delete' => true,
				) );
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( array(
			'data_class' => 'AppBundle\Entity\Agenda'
		) );
	}
}
