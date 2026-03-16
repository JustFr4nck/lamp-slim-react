<?php
use Slim\Factory\AppFactory;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/AlunniController.php';
require __DIR__ . '/controllers/CertController.php';


$app = AppFactory::create();

$app->get('/test', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Test page");
    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->get('/alunni', "AlunniController:index");
$app->get('/alunni/{id}', "AlunniController:show");
$app->post('/alunni', 'AlunniController:create');
$app->put('/alunni/{id}', 'AlunniController:update');
$app->delete('/alunni/{id}', 'AlunniController:destroy');

// certificazioni

$app->get('/alunni/{idAlunni}/certificazioni', 'CertController:index');
$app->get('/alunni/{idAlunni}/certificazioni/{id}', 'CertController:show');
$app->post('/alunni/{idAlunni}/certificazioni', 'CertController:create');
$app->put('/alunni/{idAlunni}/certificazioni/{id}', 'CertController:update');
$app->delete('/alunni/{idAlunni}/certificazioni/{id}', 'CertController:destroy');

$app->run();
