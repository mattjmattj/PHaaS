<?php
use \Psr\Http\Message\ServerRequestInterface as Request;

return function (Request $request) {
    $params = $request->getQueryParams();
    $name = $params['name'];
    return "Hello, $name";
};