<?php

namespace AppBundle\Controller\Handler;

use Symfony\Component\HttpFoundation\Response;

interface ResponseHandler
{
    public function handleResponse(Response $response);
}
