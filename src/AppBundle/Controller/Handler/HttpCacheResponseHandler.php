<?php

namespace AppBundle\Controller\Handler;

use Symfony\Component\HttpFoundation\Response;

class HttpCacheResponseHandler implements ResponseHandler
{
    const
        DEFAULT_DURATION = 300;
    
    private
        $duration;
    
    public function __construct()
    {
        $this->setDuration(self::DEFAULT_DURATION);
    }
    
    /**
     * Update a valid non cacheable Response with http cache headers
     *
     * @see http://symfony.com/fr/doc/current/book/http_cache.html
     */
    public function handleResponse(Response $response)
    {
        // do not handle invalid response
        if (!$response->isOk()) {
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
    
    /**
     * @param int $duration duration in seconds (0 is not allowed)
     * @throws \LogicException
     */
    public function setDuration($duration)
    {
        if (!is_int($duration)) {
            throw new \LogicException('duration have to be an integer');
        }
        
        if ($duration === 0) {
            throw new \LogicException('duration have to be greater than zero');
        }
        
        $this->duration = $duration;
    }
}
