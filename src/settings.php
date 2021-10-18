<?php declare(strict_types=1);

namespace Application;

use DI\Container;
use Monolog\Logger;

return function (Container $container): void {
    $container->set(
        'settings',
        [
            'displayErrorDetails' => true, // Should be set to false in production
            'logError' => false,
            'logErrorDetails' => false,
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
            'database' => [
                'host' => 'localhost',
                'name' => '',
                'user' => 'root',
                'password' => 'root',
            ],
        ]
    );
};
