<?php

namespace {{namespace}};

use Cormy\Server\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Cormy {{class_name}}.
 */
class {{class_name}} implements MiddlewareInterface
{
    /**
     * {{create_description}}.
     */
    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(ServerRequestInterface $request):\Generator
    {
        /* @var $response ResponseInterface */
        $response = (yield $request);

        return $response->withHeader('X-PoweredBy', '{{class_name}}s');
    }
}
