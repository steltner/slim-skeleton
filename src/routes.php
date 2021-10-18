<?php declare(strict_types=1);

namespace Application;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app): void {
    // CORS Pre-Flight OPTIONS Request Handler
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        return $response;
    });

    $app->get('/', Handler\HelloWorldHandler::class);
};
