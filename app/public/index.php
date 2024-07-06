<?php

use Bank\Mace\Application\UseCase\UseCase;
use Bank\Mace\Infrastructure\Persistence\DatabaseConnection;
use Bank\Mace\Infrastructure\Persistence\RepositoryAdapter;
use Slim\Factory\AppFactory;
use DI\Container;
use DI\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';
$settings = require __DIR__ . '/../src/Infrastructure/config/settings.php';

$containerBuild = new ContainerBuilder();
$containerBuild->addDefinitions($settings);
$container = $containerBuild->build();

AppFactory::setContainer($container);

$app = AppFactory::create();
require __DIR__ . '/../src/Infrastructure/config/routes.php';

$app->run();

