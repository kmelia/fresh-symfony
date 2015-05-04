<?php

namespace Kmelia\FreshBundle\Controller;

use AppBundle\Controller\AbstractKmeliaController;
use AppBundle\Controller\Handler\HttpCacheResponseHandler;

abstract class AbstractController extends AbstractKmeliaController
{
    public function __construct()
    {
        // add http cache handler
        $this->addResponseHandler(new HttpCacheResponseHandler());
    }
}
