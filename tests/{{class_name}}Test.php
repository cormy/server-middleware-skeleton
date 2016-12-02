<?php

namespace {{namespace}};

use Exception;
use Cormy\Server\MiddlewareDispatcher;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\TextResponse;

class {{class_name}}Test extends \PHPUnit_Framework_TestCase
{
    use \VladaHejda\AssertException;

    private function buildResponse(string $text, $status = 200, array $headers = [])
    {
        $response = new TextResponse('', $status, $headers);
        $response->getBody()->write($text);

        return $response;
    }

    private function buildFinalHandler(string $text, $status = 200, array $headers = [])
    {
        $response = $this->buildResponse($text, $status, $headers);

        return function () use ($response):ResponseInterface {
            return $response;
        };
    }

    public function test{{class_name}}ResponseShouldBeValid()
    {
        $middleware = new {{class_name}}();

        $sut = new MiddlewareDispatcher($middleware, $this->buildFinalHandler('Final!'));
        $response = $sut(new ServerRequest());

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame('Final!', (string) $response->getBody());
        $this->assertSame('{{class_name}}s', $response->getHeader('X-PoweredBy')[0]);
    }

    public function testMiddlewareCallerHaveToHandleFinalHandlerExceptions()
    {
        $middleware = new {{class_name}}();

        $sut = new MiddlewareDispatcher(
            $middleware,
            function ():ResponseInterface {
                throw new Exception('Oops, something went wrong!', 500);
            }
        );

        $this->assertException(function () use ($sut) {
            $sut(new ServerRequest());
        }, Exception::class, 500, 'Oops, something went wrong!');
    }
}
