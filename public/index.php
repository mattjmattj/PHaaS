<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ .'/../vendor/autoload.php';

$app = new \Slim\App();

foreach(glob(__DIR__ . '/../functions/*/function.php') as $file) {
    $function = include($file);
    $route = sprintf('/%s',basename(dirname($file)));
    
    $app->any($route, function (Request $request, Response $response) use ($function) {
        
        $responseBody = $function($request);
        
        $response->getBody()->write($responseBody);
    });
}

$app->run();