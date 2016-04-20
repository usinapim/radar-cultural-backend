<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class AgendasRestController extends FOSRestController {

	public function getAgendasAction() {
		$em      = $this->getDoctrine()->getManager();
		$agendas = $em->getRepository( 'AppBundle:Agenda' )->findAll();

		$aAgendas = array();

		foreach ( $agendas as $agenda ) {

			$texto = $agenda->getFechaEventoDesde()->format( 'd-m-Y' );
			$index = $this->findGrupoIndex( $aAgendas, $texto );
			if ( $index !== false ) {
				//es un grupo
				$aAgendas[ $index ]['eventos'][] = $agenda;
			} else {
				//creo otro grupo
				$index = count( $aAgendas );

				$aAgendas[ $index ]['texto']     = $texto;
				$aAgendas[ $index ]['eventos'][] = $agenda;
			}


		}

		$vista = $this->view( $aAgendas,
			200 )
		              ->setTemplate( "AppBundle:Rest:getAgendas.html.twig" )
		              ->setTemplateVar( 'agendas' );

		return $this->handleView( $vista );
	}

	private function findGrupoIndex( $array, $texto ) {
		foreach ( $array as $index => $item ) {
			if ( $item['texto'] == $texto ) {
				return $index;
			}
		}

		return false;
	}

}
