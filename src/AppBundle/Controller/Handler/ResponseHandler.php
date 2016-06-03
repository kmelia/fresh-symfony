<?php

namespace AppBundle\Controller\Handler;

use Symfony\Component\HttpFoundation\Response;

interface ResponseHandler
{
    /**
     * @param Response $response
     * @return Response
     */
    public function handleResponse(Response $response);
}
