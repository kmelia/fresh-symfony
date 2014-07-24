<?php

namespace Kmelia\FreshBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController extends Controller
{
    const DEFAULT_DURATION = 300;
    
    /**
     * Renders a view with a default Reponse
     * @see \Symfony\Bundle\FrameworkBundle\Controller\Controller::render()
     */
    public function render($view, array $parameters = array(), Response $response = null)
    {
        if( ! $response instanceof Response )
        {
            $response = $this->buildDefaultResponse();
        }
        
        return parent::render($view, $parameters, $response);
    }
    
    /**
     * Build a Response with HTTP cache headers
     * @see http://symfony.com/fr/doc/current/book/http_cache.html
     */
    protected function buildDefaultResponse()
    {
        $duration = $this->getCacheDuration();
        
        $response = new Response();
        
        // mark the response as private
        $response->setPrivate();
        
        // set the private or shared max age
        $response->setMaxAge($duration);
        $response->setSharedMaxAge($duration);
        
        // set expires
        $date = new \DateTime();
        $date->modify(sprintf('+%d seconds', $duration));
        $response->setExpires($date);
        
        // set a custom Cache-Control directive
        $response->headers->addCacheControlDirective('must-revalidate', true);
        
        return $response;
    }
    
    protected function getCacheDuration()
    {
        return self::DEFAULT_DURATION;
    }
}