<?php

namespace Kmelia\FreshBundle\Controller;

use AppBundle\Controller\Handler\HttpCacheResponseHandler;

class HomepageController extends AbstractController
{
    public function defaultHttpCacheAction()
    {
        return $this->renderHandledReponse('KmeliaFreshBundle:Homepage:home.html.twig');
    }
    
    public function specifiedHttpCacheAction()
    {
        $this->getHttpCacheResponseHandler()->setDuration(2);
        
        return $this->renderHandledReponse('KmeliaFreshBundle:Homepage:home.html.twig');
    }
    
    public function noHttpCacheHomepageAction()
    {
        // remove http cache handler
        $this->removeResponseHandlers(new HttpCacheResponseHandler());
        
        return $this->renderHandledReponse('KmeliaFreshBundle:Homepage:home.html.twig');
    }

    public function noHttpCacheWithDefaultRenderHomepageAction()
    {
        return $this->render('KmeliaFreshBundle:Homepage:home.html.twig');
    }
}
