<?php declare(strict_types=1);

namespace Application;

use DI\Container;
use PHPUnit\Framework\TestCase;
use Slim\App;

class ConfigTest extends TestCase
{
    public function testRoutesExistsAndIsCallable(): void
    {
        $app = $this->createMock(App::class);

        $handler = require __DIR__ . '/../src/routes.php';

        $this->assertIsCallable($handler);

        $handler($app);
    }

    /**
     * @dataProvider configFileDataProvider
     */
    public function testConfigExistsAndIsCallable(string $file): void
    {
        $container = new Container();

        $config = require __DIR__ . '/../src/' . $file;

        $this->assertIsCallable($config);

        $config($container);
    }

    public function configFileDataProvider(): array
    {
        return [
            ['settings.php'],
            ['dependencies.php'],
            ['handler.php'],
        ];
    }
}
