<?php

namespace AppBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class AgendasRestController extends FOSRestController {

	public function getAgendasAction(  ) {
		$em = $this->getDoctrine()->getManager();
		$agendas = $em->getRepository( 'AppBundle:Agenda' )->findAll();

		$vista = $this->view( $agendas,
			200 )
//			->setTemplate( "MyBundle:Users:getUsers.html.twig" )
//			->setTemplateVar( 'noticias' )
		;

		return $this->handleView( $vista );
	}

}
