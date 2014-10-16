<?php

namespace Kmelia\FreshBundle\Controller\Handler;

use Symfony\Component\HttpFoundation\Response;

class HttpCacheResponseHandler implements ResponseHandler
{
    private $duration;
    
    public function __construct()
    {
        $this->setDuration(300);
    }
    
    /**
     * Update a valid non cacheable Response with http cache headers
     *
     * @see http://symfony.com/fr/doc/current/book/http_cache.html
     */
    public function handleResponse(Response $response)
    {
        // do not handle invalid response
        if (! $response->isOk()) {
            return $response;
        }
        
        // do not handle response with http cache headers
        if ($response->isCacheable()) {
            return $response;
        }
        
        // mark the response as private
        $response->setPrivate();
        
        // set the private or shared max age
        $response->setMaxAge($this->duration);
        $response->setSharedMaxAge($this->duration);
        
        // set expires
        $date = new \DateTime();
        $date->modify(sprintf('+%d seconds', $this->duration));
        $response->setExpires($date);
        
        // set a custom Cache-Control directive
        $response->headers->addCacheControlDirective('must-revalidate', true);
        
        return $response;
    }
    
    public function setDuration($duration)
    {
        if (! is_int($duration)) {
            throw new \LogicException('duration have to be an integer');
        }
        
        $this->duration = $duration;
    }
}