<?php

namespace Kmelia\FreshBundle\Controller;

class HomepageController extends KmeliaController
{
    public function homepageAction()
    {
        return $this->render('KmeliaFreshBundle:Homepage:homepage.html.twig');
    }
}