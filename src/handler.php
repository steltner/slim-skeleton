<?php declare(strict_types=1);

namespace Application;

use Application\Handler\HelloWorldHandler;
use DI\Container;

return function (Container $container): void {
    $container->set(HelloWorldHandler::class, function (Container $container) {
        return new HelloWorldHandler();
    });
};
