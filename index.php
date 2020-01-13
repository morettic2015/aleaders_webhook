<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Medoo\Medoo;

require __DIR__ . '/vendor/autoload.php';


/**
 * @Create a Cache to improve perfomance on resquest response handler 24 hours cache
 * Register service provider with the container
 * Add middleware to the application
 * */
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

//$app->config('debug', true);
/**
 * @Search //Define Routes //Busca Eventos de Hoje
 */
$app->get('/unsubscribe', function (Request $request, Response $response) use ($app) {
    //Content Type JSON Cross Domain JSON
    //Cache 24 hours
    //Return Eventos for today
    //   $data = GuiaController::getEventosDeHoje();
    // logActions("BUSCA");
    $data = [];
    //Response Busca Hoje
    return $newResponse->withJson($data, 201);
});
$app->run();
?>