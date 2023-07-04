<?php

use Slim\Factory\AppFactory;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . './vendor/autoload.php';

$app = AppFactory::create();

// Includes route definitions
require __DIR__ . '/src/Routes/Participations/routes.php';


$app->run();
