<?php

namespace AppBundle\Controller;


use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{

    public function newNoticiaAction()   {
        return $this->redirectToRoute('noticias_new');
    }
    public function newAgendaAction()   {
        return $this->redirectToRoute('agenda_new');
    }
}
