<?php declare(strict_types=1);

namespace Application;

use DI\Container;
use Envms\FluentPDO\Query;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use PDO;
use Psr\Log\LoggerInterface;

return function (Container $container): void {
    $container->set(LoggerInterface::class, function (Container $container) {
        $settings = $container->get('settings');

        $loggerSettings = $settings->get('logger');
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    });

    $container->set(PDO::class, function (Container $container) {
        $config = $container->get('settings')['database'];

        $connection = new PDO(
            sprintf('mysql:host=%s;dbname=%s', $config['host'], $config['name']),
            $config['user'],
            $config['password'],
        );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    });

    $container->set(Query::class, function (Container $container) {
        return new Query($container->get(PDO::class));
    });
};
