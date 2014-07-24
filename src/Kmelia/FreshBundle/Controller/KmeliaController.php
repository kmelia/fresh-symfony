<?php

namespace Kmelia\FreshBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

abstract class KmeliaController extends AbstractController
{
    public function __construct()
    {
        // add http cache handler
        $this->addHandler(new Handler\HttpCacheResponseHandler());
    }
}