<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require_once("NobetciEczane.class.php");

$app = new \Slim\App;

$app->get('/', function(Request $request, Response $response){
    $response->getBody()->write('api yapım aşamasında');
});



$app->get('/pharmacy/{city}', function (Request $request, Response $response) {
    
    $city = $request->getAttribute('city'); // getter method
    $pharmacy = new NobetciEczane($city);
    $pharmacy = $pharmacy->Getir("json"); // turn json
    $response->getBody()->write($pharmacy);

    return $response;
});
$app->run();