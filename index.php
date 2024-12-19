<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$loader = new Twig\Loader\FilesystemLoader('templates');
$view = new Twig\Environment($loader);

$app = AppFactory::create();

$app->get('/OOP_BLOG/', function (Request $request, Response $response, $args) use ($view) {
    $body = $view->render('index.twig');
    $response->getBody()->write($body);
    return $response;
});

$app->get('/OOP_BLOG/about', function (Request $request, Response $response, $args) use ($view) {
    $body = $view->render('about.twig',[
        'name'=>'Dmitri'
    ]);
    $response->getBody()->write($body);
    return $response;
});




$app->run();
