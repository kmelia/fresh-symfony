<?php

namespace Kmelia\FreshBundle\Controller;

class HomepageController extends DefaultController
{
    public function homepageAction()
    {
        return $this->render('KmeliaFreshBundle:Homepage:homepage.html.twig');
    }
}