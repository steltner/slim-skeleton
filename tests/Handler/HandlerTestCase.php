<?php declare(strict_types=1);

namespace Application\Handler;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use Slim\Psr7\Response;

abstract class HandlerTestCase extends TestCase
{
    protected Request|MockObject $request;
    protected Response $response;
    protected LoggerInterface|MockObject $logger;

    protected HandlerInterface $handler;

    protected function setUp(): void
    {
        $this->request = $this->createMock(Request::class);
        $this->response = new Response();
        $this->logger = $this->createMock(LoggerInterface::class);
    }
}
