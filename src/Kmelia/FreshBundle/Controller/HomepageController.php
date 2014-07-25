<?php

namespace Kmelia\FreshBundle\Controller;

class HomepageController extends AbstractKmeliaController
{
    public function homepageAction()
    {
        return $this->render('KmeliaFreshBundle:Homepage:homepage.html.twig');
    }
}