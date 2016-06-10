<?php

namespace Kmelia\FreshBundle\Controller;

use AppBundle\Controller\Handler\HttpCacheResponseHandler;

class HomepageController extends AbstractController
{
    public function homepageAction()
    {
        return $this->render('KmeliaFreshBundle:Homepage:homepage.html.twig');
    }
    
    public function oneSecondHttpCacheHomepageAction()
    {
        $this->getHttpCacheResponseHandler()->setDuration(1);
        
        return $this->render('KmeliaFreshBundle:Homepage:homepage.html.twig');
    }
    
    public function noHttpCacheHomepageAction()
    {
        // remove http cache handler
        $this->removeResponseHandlers(new HttpCacheResponseHandler());
        
        return $this->render('KmeliaFreshBundle:Homepage:homepage.html.twig');
    }
}
