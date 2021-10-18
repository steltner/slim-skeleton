<?php declare(strict_types=1);

namespace Application\Handler;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

interface HandlerInterface
{
    public function __invoke(Request $request, Response $response, array $args): Response;
}
