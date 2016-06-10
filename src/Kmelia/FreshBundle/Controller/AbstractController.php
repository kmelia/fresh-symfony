<?php

namespace Kmelia\FreshBundle\Controller;

use AppBundle\Controller\AbstractKmeliaController;
use AppBundle\Controller\Handler\HttpCacheResponseHandler;

abstract class AbstractController extends AbstractKmeliaController
{
    protected
        $httpCacheResponseHandler;
    
    public function __construct()
    {
        parent::__construct();
        
        // add http cache handler
        $this->addResponseHandler($this->getHttpCacheResponseHandler());
    }
    
    protected function getHttpCacheResponseHandler()
    {
        if (!$this->httpCacheResponseHandler instanceof HttpCacheResponseHandler) {
            $this->httpCacheResponseHandler = new HttpCacheResponseHandler();
        }
        
        return $this->httpCacheResponseHandler;
    }
}
