#!/usr/bin/env php
<?php

namespace Cormy;

require __DIR__.'/../vendor/autoload.php';

use {{namespace}}\{{class_name}};
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

// {{create_description}}
$middleware = new {{class_name}}();

// create a dispatcher
$finalHandler = function (ServerRequestInterface $request):ResponseInterface {
    return new \Zend\Diactoros\Response();
};
$dispatcher = new \Cormy\Server\MiddlewareDispatcher($middleware, $finalHandler);

// dispatch a request
$response = $dispatcher(new \Zend\Diactoros\ServerRequest());

exit($response->getHeader('X-PoweredBy')[0] === '{{class_name}}s' ? 0 : 1);
