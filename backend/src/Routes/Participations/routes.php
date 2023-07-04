<?php

use Slim\Factory\AppFactory;
use Slim\Controllers\ParticipationController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// Middleware authentication
$tokenAuthMiddleware = function ($request, $handler) {

    $token = $request->getHeaderLine('token');

    if ($token !== '0101hirevitindev0101') {
        $response = new \Slim\Psr7\Response();
        $response->getBody()->write('Token inválido');
        return $response->withStatus(401);
    }

    $response = $handler->handle($request);
    return $response;
};

$app->get('/', ParticipationController::class . ':show')->add($tokenAuthMiddleware);
$app->post('/create', ParticipationController::class . ':create')->add($tokenAuthMiddleware);
$app->delete('/{id}', ParticipationController::class . ':destroy')->add($tokenAuthMiddleware);
