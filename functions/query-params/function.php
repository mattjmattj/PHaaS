<?php
use \Psr\Http\Message\ServerRequestInterface as Request;

use Functional as F;

return function (Request $request) {
    $text = implode(", ", F\map($request->getQueryParams(), function($v, $k) {
        return sprintf("(%s = %s)", $k, $v);  
    }));
    
    return $text;
};