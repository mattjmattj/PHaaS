# PHaaS

Dead simple FaaS server for PHP

## Main features

- PSR-7 compatible
- Convention over configuration
- Actually you can't configure anything
- Pretty insecure
- Low-performance
- Poorly scalable
- For trolling hipsters only

## Getting started

PHaaS is a Slim framework application that auto-binds provided functions without
any configuration needed.

### Installation

Just clone this repository and run `composer update`

### A first function

To get started, simply create a new folder under `/functions`. The new folder name will be used
as the route to reach your function. E.g. `/functions/hello` will be mapped to
the `/hello` route.

Each function folder must provide a `function.php` file **returning** the desired function.
Each function will take a PSR-7 `\Psr\Http\Message\ServerRequestInterface` as unique parameter
and must return the content of the resulting response body.

A complete "hello world" example: 

```php
<?php
use \Psr\Http\Message\ServerRequestInterface as Request;

return function (Request $request) {
    $params = $request->getQueryParams();
    $name = $params['name'];
    return "Hello, $name";
};
```

If you need to make use of specific dependencies in your function, you can provide, in your
function folder, a simplified `composer.json` which will be interpretated each time run `composer update`

### Running the server

You need to point your web server document root to `/public`.

To use the built-in PHP web server, simply do

```
cd public
php -S 0.0.0.0:80 index.php
```

## License

MIT