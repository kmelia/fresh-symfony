<?php

namespace Kmelia\FreshBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class AbstractKmeliaController extends AbstractController
{
    public function __construct()
    {
        // add http cache handler
        $this->addResponseHandler(new Handler\HttpCacheResponseHandler());
    }
}