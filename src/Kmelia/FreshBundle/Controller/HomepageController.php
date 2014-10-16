<?php

namespace Kmelia\FreshBundle\Controller;

class HomepageController extends AbstractKmeliaController
{
    public function homepageAction()
    {
        return $this->render('KmeliaFreshBundle:Homepage:homepage.html.twig');
    }
    
    public function noHttpCacheHomepageAction()
    {
        // remove http cache handler
        $this->removeResponseHandlers(new Handler\HttpCacheResponseHandler());
        
        return $this->render('KmeliaFreshBundle:Homepage:homepage.html.twig');
    }
}
