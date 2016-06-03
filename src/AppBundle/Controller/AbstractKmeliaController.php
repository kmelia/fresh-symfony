<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Controller\Handler\SecurityResponseHandler;

abstract class AbstractKmeliaController extends Controller
{
    private $responseHandlers = array();
    
    public function __construct()
    {
        $this->loadDefaultResponseHandlers();
    }
    
    protected function loadDefaultResponseHandlers()
    {
        // security
        $this->addResponseHandler(new SecurityResponseHandler());
    }
    
    protected function addResponseHandler(Handler\ResponseHandler $responseHandler)
    {
        $this->responseHandlers[] = $responseHandler;
    }
    
    /**
     * Remove each handler which is same as the handler passed
     */
    protected function removeResponseHandlers(Handler\ResponseHandler $responseHandlerToRemove)
    {
        foreach ($this->responseHandlers as $index => $responseHandler) {
            if ($responseHandler instanceof $responseHandlerToRemove) {
                unset($this->responseHandlers[$index]);
            }
        }
    }
    
    /**
     * Renders a view with an handled Reponse
     * @see \Symfony\Bundle\FrameworkBundle\Controller\Controller::render()
     */
    public function render($view, array $parameters = array(), Response $response = null)
    {
        $response = parent::render($view, $parameters, $response);
        
        foreach ($this->responseHandlers as $responseHandler) {
            $response = $responseHandler->handleResponse($response);
        }
        
        return $response;
    }
}
