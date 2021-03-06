<?php

namespace AppBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class NoticiasRestController extends FOSRestController {

	public function getNoticiasAction(Request $request) {
		$em = $this->getDoctrine()->getManager();
		$noticias = $em->getRepository( 'AppBundle:Noticia' )->getNoticiasByPage($request->get('page', 1));

		$vista = $this->view( $noticias,
			200 )
//			->setTemplate( "MyBundle:Users:getUsers.html.twig" )
//			->setTemplateVar( 'noticias' )
		;

		return $this->handleView( $vista );
	}
	
//    public function getNoticiasAction() {
//        $em      = $this->getDoctrine()->getManager();
//        $noticias = $em->getRepository( 'AppBundle:Noticia' )->getUltimasNoticias();
//
//        header('Access-Control-Allow-Origin: *');
//        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
//        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
//        return array( 'noticias' => $noticias );
//    }
}
