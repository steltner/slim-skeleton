<?php declare(strict_types=1);

namespace Application\Handler;

use Psr\Http\Message\ResponseInterface as Response;

class HelloWorldHandlerTest extends HandlerTestCase
{
    public function testResponse(): void
    {
        $handler = new HelloWorldHandler();

        $response = $handler($this->request, $this->response, []);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame('Hello world!', (string)$response->getBody());
        $this->assertSame(200, $response->getStatusCode());
    }
}
