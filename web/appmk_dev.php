<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#checking-symfony-application-configuration-and-setup
// for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (!isset($_SERVER['REMOTE_ADDR']) || !preg_match('~^((127|10)\.0\.0\.[0-9]+|(fe80)?::1)$~', $_SERVER['REMOTE_ADDR'])) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check ' . basename(__FILE__) . ' for more information.');
}

// require Composer's autoloader
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../app/MicroKernel/AppMicroKernel.php';
Debug::enable();

$kernel = new AppMicroKernel('dev', true);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
