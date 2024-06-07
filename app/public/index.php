<?php

use Bank\Mace\Application\UseCase\UseCase;
use Bank\Mace\Infrastructure\Persistence\RepositoryAdapter;
use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Infrastructure/config/settings.php';

$container = new Container($settings);
$container->set('settings', $settings);

AppFactory::setContainer($container);
$app = AppFactory::create();

require __DIR__ . '/../src/Infrastructure/config/database.php';

$container->set('useCase', function(Container $c):UseCase{

    $entityManager = $c->get('entityManager');
    $adapter = new RepositoryAdapter($entityManager);

    return new UseCase($adapter);
});

require __DIR__ . '/../src/Infrastructure/config/routes.php';





$app->run();