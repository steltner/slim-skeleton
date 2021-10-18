<?php declare(strict_types=1);

use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

(function () {
    $settings = require __DIR__ . '/../src/settings.php';
    $dependencies = require __DIR__ . '/../src/dependencies.php';
    $handler = require __DIR__ . '/../src/handler.php';
    $routes = require __DIR__ . '/../src/routes.php';

    $container = new Container();
    $settings($container);
    $dependencies($container);
    $handler($container);

    $application = AppFactory::createFromContainer($container);

    $routes($application);

    $application->run();
})();
