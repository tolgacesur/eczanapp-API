<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require 'vendor/autoload.php';
require_once("NobetciEczane.class.php");

/* 404 ERROR*/
$c = new \Slim\Container();
$c['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('Endpoint not found');
    };
};

$app = new \Slim\App($c);
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./");

$app->get('/', function(Request $request, Response $response){
    return $this->renderer->render($response, "/index.html");
});

$app->get('/pharmacy/{city}', function (Request $request, Response $response) {
    
    $city = $request->getAttribute('city'); // get url parameter
    $pharmacy = new NobetciEczane($city);
    $pharmacy = $pharmacy->Getir("json"); // turn json
    $response->getBody()->write($pharmacy);

    return $response;
});

$app->run();