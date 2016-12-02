# Cormy\Server\Middleware\{{class_name}} {{travis}} {{coveralls}} {{scrutinizer}}

{{sensio_labs_insight}}

> {{description}}.


## Install

```
composer require {{package}}
```


## Usage

```php
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
```


## API

### `Cormy\Server\Middleware\{{class_name}} implements Cormy\Server\MiddlewareInterface`

#### `{{class_name}}::__construct`

```php
/**
 * {{create_description}}.
 */
public function __construct()
{
}
```

#### Inherited from [`Cormy\Server\MiddlewareInterface::__invoke`](https://github.com/cormy/server-middleware)

```php
/**
 * Process an incoming server request and return the response, optionally delegating
 * to the next request handler.
 *
 * @param ServerRequestInterface $request
 *
 * @return Generator yields PSR `ServerRequestInterface` instances and returns a PSR `ResponseInterface` instance
 */
public function __invoke(ServerRequestInterface $request):Generator;
```


## Related

* [Cormy\Server\Onion](https://github.com/cormy/onion) – Onion style PSR-7 **middleware stack** using generators
* [Cormy\Server\Bamboo](https://github.com/cormy/bamboo) – Bamboo style PSR-7 **middleware pipe** using generators
* [Cormy\Server\RequestHandlerInterface](https://github.com/cormy/server-request-handler) – Common interfaces for PSR-7 server request handlers
* [Cormy\Server\MiddlewareInterface](https://github.com/cormy/server-middleware) – Common interfaces for Cormy PSR-7 server middlewares
* [PSR-7: HTTP message interfaces](http://www.php-fig.org/psr/psr-7/)


## License

MIT © {{user_link}}
